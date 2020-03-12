<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'artikel';
    //protected $fillable = ['judul','slug_judul','isi','gambar'];

    public function get_kategori()
    {
        return $this->belongsTo('App\Kategori','kategori_id','id');
    }

    public function get_tag()
    {
        return $this->belongsToMany('App\Tag','blog_tag');
    }

}
