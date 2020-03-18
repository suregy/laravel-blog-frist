<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Tag;
use App\Kategori;

class cariController extends Controller
{
    public function cari(Request $request)
    {
        $q = $request->input('cari');
        $blogs = Blog::where('judul','LIKE','%' .$q. '%')->get();
        $tags = Tag::paginate(4);
        $kategoris = Kategori::paginate(4);
        return view('blog.cari.results',['blogs' => $blogs,'kategoris' => $kategoris, 'tags' => $tags]);
    }
}
