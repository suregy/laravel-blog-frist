<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['tag'];


    public function get_blog()
    {
        return $this->belongsToMany('App\Blog','blog_tag');
    }


}
