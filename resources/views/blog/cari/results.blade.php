@extends ('layout.main')
@section('title','Hasil Pencarian')

@section('container')

@if(count($blogs) > 0)

<div class="container">
    <div class="row">
        <div class="col-md-8 col-sm-12">
        @foreach($blogs->all() as $blog)
            <div class="blog-post mt-3 border">
                <div class="blog-post_title">
                    <p> {{ $blog->judul }} </p>
                    <hr class="linejudul">
                </div>
                <div class="blog-post_date d-flex">
                    <div class="author">
                        <span class="text-primary"><i class="fa fa-user text-primary"></i> Admin</span>
                        <span><i class="fa fa-calendar"></i> {{ date('j F Y'),strtotime($blog->update_at) }} </span>
                        <span><i class="fa fa-folder-open"></i><a href="#"> {{ $blog->get_kategori->nama}} </a></span>
                    </div>
                    <div class="sosmed">
                        <span><a href="#" class="text-primary"><i class="fa fa-facebook-official"></a></i></span>
                        <span><a href="#" class="text-info"><i class="fa fa-twitter-square"></a></i></span>
                        <span><a href="#" class="text-success"><i class="fa fa-whatsapp"></a></i></span>
                        <span><a href="#" class="text-primary"><i class="fa fa-telegram"></a></i></span>
                    </div>
                </div>
                <hr class="line">
                <div class="blog-post_info d-flex">
                    <div class="blog-post_img">
                        <img src="{{ url('storage/uploads/'.$blog->gambar)}}" alt="" srcset="">
                    </div>
                    <div class="blog-post_text">
                        <p>{!! Str::limit($blog->isi,200) !!}</p>
                        <a href="/blog/{{ $blog->slug_judul }}" class="blog-post_cta bg-primary">
                            read more <i class="fa fa-angle-double-right"></i>
                        </a>
                    </div>
                </div>
                <div class="blog-post_tags d-flex float-right">
                @foreach($blog->get_tag as $tag)   
                    <span><i class="fa fa-tags ml-1 text-primary"></i> 
                        {{$tag->tag}}        
                    </span>
                @endforeach
                </div>
            </div>
        @endforeach
        </div>

        <div class="col-md-4 col-sm-12">
            @include('blog.sidebar')
        </div>
        
    </div>
</div>

@else

<div class="container">
    <div class="row">
        <div class="col-md-8 col-sm-12">
            <p>Artikel Tidak Ditemukan</p>
        </div>
    </div>
</div>

@endif

@endsection