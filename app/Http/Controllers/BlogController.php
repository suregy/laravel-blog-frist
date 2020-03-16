<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Kategori;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str; 

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::paginate(3);
        $tags = Tag::orderBy('id', 'desc')->paginate(4);
        $kategoris = Kategori::orderBy('id', 'desc')->paginate(4);
        return view('blog.index', compact('blogs'),compact('tags'))->withKategoris($kategoris);
    }

    /**
     * Show the form for creating a new resource. 
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::all();
        $Tags = Tag::all();
        $blogs = Blog::paginate(3);
        return view('blog.create')->withKategori($kategori)->withTags($Tags)->withBlogs($blogs);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        //validasi
        $request->validate([
            'judul' => 'required',
            'kategori_id' => 'required'
        ]);

        $blog = new Blog;
        $blog->judul = $request->judul;
        $blog->slug_judul = Str::slug($request->judul);
        $blog->kategori_id = $request->kategori_id;
        $blog->isi = $request->isi;
        //handle gambar
        // $file = $request->file('gambar');
        // $ext = $file->getClientOriginalExtension();
        // $newName = rand(100000,1001238912).".".$ext;
        // $file->move('storage/uploads',$newName);
        // $blog->gambar = $newName;
        if($request->hasFile('gambar'))
        {
            $file = $request->file('gambar');
            $ext = $file->getClientOriginalExtension();
            $fileName = time().".".$ext;
            $folder = public_path('storage/uploads');
            $file->move($folder, $fileName);
            $blog->gambar = $fileName;
        }

        $blog->save();

        $blog->get_tag()->sync($request->tags);

        return redirect('/blog/create')->with('status', 'Data berhasil disimpan!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $tags = Tag::paginate(4);
        $kategoris = Kategori::paginate(4);
        $show = Blog::where('slug_judul', $slug)->with('get_kategori')->get()->first();
        //dd($show);
        return view('blog.show',compact('show'))->withTags($tags)->withKategoris($kategoris);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        $kategori = Kategori::all();
        $Tags = Tag::all();

        //untuk ontomatis checkbox tag terisi
        $tes = $blog->get_tag()->pluck('tag_id');
        $tagid = $tes->all();
        //dd($tagid);

        return view('blog.edit')->withBlog($blog)->withKategori($kategori)->withTags($Tags)->withTagid($tagid);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'judul' => 'required',
            'kategori_id' => 'required'
        ]);

        $blog = Blog::where('id',$blog->id)->first();;
        $blog->judul = $request->judul;
        $blog->slug_judul = Str::slug($request->judul);
        $blog->kategori_id = $request->kategori_id;
        $blog->isi = $request->isi;
        if($request->hasFile('gambar'))
        {
            $file = $request->file('gambar');
            $ext = $file->getClientOriginalExtension();
            $fileName = time().".".$ext;
            $folder = public_path('storage/uploads');
            $file->move($folder, $fileName);



            $blog->gambar = $fileName;
        }
        $blog->save();

        $blog->get_tag()->sync($request->tags);

        return redirect('/blog/create')->with('status', 'Data berhasil diupate!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        //
    }
}
