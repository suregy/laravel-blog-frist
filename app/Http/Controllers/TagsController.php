<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Blog;
use App\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TagsController extends Controller
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
        $Tag = DB::table('tags')->paginate(5);
        return view('blog.tag.index', compact('Tag'));
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
            'tag' => 'required'
        ]);

        Tag::create($request->all());
        return redirect('/tag/create')->with('status', 'Data berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tags = Tag::paginate(4);
        $kategoris = Kategori::paginate(4);
        $tags2 = Tag::find($id);
        $tags3 = $tags2->get_blog()->paginate(2);
        $blogs = Blog::paginate(3);
        return view('blog.tag.show',compact(['tags','blogs','kategoris','tags2','tags3']));
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
    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'tag' => 'required'
        ]);

        Tag::where('id', $tag->id)
                ->update([
                    'tag' => $request->tag
                ]);
                return redirect('/tag')->with('status', 'Data berhasil diupate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        Tag::destroy($tag->id);
        return redirect('/tag')->with('status', 'Data berhasil dihapus!');
    }
}
