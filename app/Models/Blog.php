<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Blog extends Model
{
    use HasFactory;
    use SearchableTrait;

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    /**
     * Searchable rules.
     *
     * @var array
     */
    protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        'columns' => [
            'blogs.title' => 10,
            /*'products.details' => 5,
            'products.description' => 2,*/
        ],
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'body', 'status', 'author','status', 'user_id'
    ];


}
