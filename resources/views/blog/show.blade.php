@extends ('layout.main')
@section('title','Daftar Mahasiswa')

@section('container')
    <div class="container">
        <div class="content">
            <div class="row">
                <div class="col-md-8 col-sm-12">
                    <div class="blog-article border mt-4 mb-4 px-3 py-3">
                        <div class="blog-article_title">
                            <h4 class="mt-3"> {{ $show->judul }} </h4>
                            <hr class="linejudul">
                        </div>
                        <div class="blog-article_tag d-flex mb-2">
                            <div class="article-author">
                                <span> <i class="fa fa-folder-open"></i> {{ $show->get_kategori->nama}} </span>
                                @foreach($show->get_tag as $tag)   
                                    <span><i class="fa fa-tags ml-1 text-primary"></i>{{$tag->tag}}</span>
                                @endforeach
                            </div>
                            <div class="sosmed">
                                <span><a onclick="share()" href="" class="text-primary"><i class="fa fa-facebook-official"></a></i></span>
                                <span><a href="#" class="text-info"><i class="fa fa-twitter-square"></a></i></span>
                                <span><a href="#" class="text-success"><i class="fa fa-whatsapp"></a></i></span>
                                <span><a href="#" class="text-primary"><i class="fa fa-telegram"></a></i></span>
                            </div>
                        </div>

                        <hr class="line">

                        <div class="blog-article_img">
                            <img src=" {{ url('storage/uploads/'.$show->gambar)}} " alt="" class="img-fluid h-25">
                        </div>
                        <div class="blog-article_text">
                            <p> {!! $show->isi !!} </p>
                        </div>


                    </div>
                </div>


                <div class="col-md-4 col-sm-12">
                    @include('blog.sidebar')
                </div>
            </div>
        </div>
    </div>

    <div class="fb-root"></div>

    <script async defer src="https://connect.facebook.net/en_US/sdk.js"></script>
    <script type="text/javascript">

        FB.init({appId: '1083292302044260', status:true, cookie:true});

        function share(){
            FB.ui({
            display: 'Feed',
            method: 'share',
            href: 'http://localhost:8000/',
            }, function(response){});
        }
</script>

@endsection