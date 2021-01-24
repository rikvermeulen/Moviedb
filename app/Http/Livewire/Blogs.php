<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Blog;

class Blogs extends Component
{
    public $blogs, $title, $body, $author, $status, $user_id, $blog_id;
    public $isOpen = 0;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function render()
    {
        $this->blogs = Blog::all();
        return view('livewire.blogs');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function openModal()
    {
        $this->isOpen = true;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function closeModal()
    {
        $this->isOpen = false;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    private function resetInputFields(){
        $this->title = '';
        $this->body = '';
        $this->author = '';
        $this->status = '';
        $this->user_id = Auth::user()->id;
        $this->blog_id = '';
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function store()
    {
        $this->validate([
            'title' => 'required',
            'body' => 'required',
            'author' => 'required',
            'status' => 'required',
            'user_id' => 'required',
        ]);

        Blog::updateOrCreate(['id' => $this->blog_id], [
            'title' => $this->title,
            'body' => $this->body,
            'author' => $this->author,
            'status' => $this->status,
            'user_id' => $this->user_id
        ]);

        session()->flash('message',
            $this->blog_id ? 'Blog Updated Successfully.' : 'Blog Created Successfully.');

        $this->closeModal();
        $this->resetInputFields();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        $this->blog_id = $id;
        $this->title = $blog->title;
        $this->body = $blog->body;
        $this->author = $blog->author;
        $this->status = $blog->status;
        $this->user_id = Auth::user()->id;

        $this->openModal();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function delete($id)
    {
        Blog::find($id)->delete();
        session()->flash('message', 'Blog Deleted Successfully.');
    }
}
