@extends ('layout.main')
@section('title','Daftar Mahasiswa')

@section('container')
    <div class="container">
        <div class="content">
            <div class="row">
                <div class="col-lg-8 col-sm-12 col-xs-12">
                    <h1 class="mt-3"> {{ $show->judul }} </h1>
                    
                    <p> kategori : {{ $show->get_kategori->nama}} </p> <br>
                    <p>Tag :</p>
                    <p>
                        @foreach($show->get_tag as $tag)   
                            {{$tag->tag}}
                        @endforeach
                        
                     </p>
                    
                    <img src=" {{ url('storage/uploads/'.$show->gambar)}} " alt="" class="img-fluid">
                    <p> {!! $show->isi !!} </p>
                </div>
                <div class="col-lg-4 col-sm-12 col-xs-12">
                    @include('blog.sidebar')
                </div>
            </div>
        </div>
    </div>
@endsection