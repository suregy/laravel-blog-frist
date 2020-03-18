<?php

namespace App\Http\Controllers;

use App\Kategori;
use App\Tag;
use App\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = DB::table('kategori')->paginate(2);
        return view('blog.kategori.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required'
        ]);

        Kategori::create($request->all());

        return redirect('/kategori/create')->with('status', 'Data berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tags = Tag::paginate(4);
        $kategoris = Kategori::paginate(4);
        $kategoris2 = Kategori::find($id);
        $kategoris3 = $kategoris2->get_blog()->paginate(2);
        return view('blog.kategori.show',compact(['tags','kategoris','kategoris2','kategoris3']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit(Kategori $kategori)
    {
        
        return view('blog.kategori.edit',compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kategori $kategori)
    {
        $request->validate([
            'nama' => 'required'
        ]);

        Kategori::where('id', $kategori->id)
                        ->update([
                            'nama' => $request->nama
                        ]);

        return redirect('/kategori/create')->with('status','Data berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kategori $kategori)
    {
        Kategori::destroy($kategori->id);
        return redirect('/kategori/create')->with('status','Data berhasil di hapus');
    }
}
