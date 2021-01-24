<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function blogs()
    {
        return $this->belongsToMany('App\Models\Blog');
    }
}
