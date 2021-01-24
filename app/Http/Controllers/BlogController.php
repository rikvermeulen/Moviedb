<?php

namespace App\Http\Controllers;

use App\Models\Category;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class BlogController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function date()
    {

    }

    public function index()
    {
        $blogs = Blog::all();
        $pagination = 9;
        $categories = Category::all();

        if (request()->category) {
            $blogs = Blog::with('categories')->whereHas('categories', function ($query) {
                $query->where('slug', request()->category);
            })->get();
            $categoryName = optional($categories->where('slug', request()->category)->first())->name;
        } else {
            /*$blogs = Blog::where('featured', true);*/
            $categoryName = 'Everything';
        }

        $user2 = User::where('id', Auth::user()->id)->first();
        $userCreatedAt = $user2->created_at;
        $datediv = now()->diffInDays($userCreatedAt);

        if($datediv>=5)
        {
            $loginDays = true;
        }
        else
        {
            $loginDays= false;
        }


        return view('layouts.blog.index', [
            'blogs' => $blogs,
            'categories' => $categories,
            'categoryName' => $categoryName,
            'loginDays' => $loginDays,
            ]);
    }



    public function search(Request $request)
    {
        $request->validate([
            'query' => 'required|min:3',
        ]);

        $query = $request->input('query');

        $blogs = Blog::search($query)->paginate(10);

        return view('search-results')->with('blogs', $blogs);
    }

    public function blogChangeStatus(Request $request)
    {
        Log::info($request->all());
        $blogs = Blog::find($request->blog_id);
        $blogs->status = $request->status;
        $blogs->save();

        return response()->json(['success'=>'Status change successfully.']);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $id)
    {
        $user2 = User::where('id', Auth::user()->id)->first();
        $userCreatedAt = $user2->created_at;
        $datediv = now()->diffInDays($userCreatedAt);

        if($datediv>=5)
        {
            $loginDays = true;
        }
        else
        {
            $loginDays= false;
        }

        return view('layouts.blog.show', [
            'blog' => $id,
            'loginDays' => $loginDays,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
