@extends ('layout.main')
@section('title','Input Blog')

@section('container')
    <div class="container box">
    <div class="panel panel-default border bg-light">
    <div class="panel-heading">

    <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><i class="fa fa-list"></i> Daftar Blog</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"> <i class="fa fa-edit"></i> Input Blog</a>
    </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <div class="row">
                    <div class="col-8 pl-5">
                        <hr>
                        <h3 class="mt-3">Input Blog</h3><hr>
                        <form method="post" action="/blog" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group">
                                <label for="Judul">Judul</label>
                                <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" placeholder="Masukan judul" name="judul" value="{{ old('judul') }}" >
                                    @error('judul')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="form-group">
                                <label for="Kategori">Kategori</label>
                                <select name="kategori_id" class="form-control @error('kategori_id') is-invalid @enderror">
                                    <option value="" class="disabled selected">Pilih Kategori</option>
                                    @foreach($kategori as $kat)
                                    <option value=" {{$kat->id}} "> {{ $kat->nama }} </option>
                                    @endforeach
                                </select>
                                @error('kategori_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="form-group">
                                <label for="Tag">Pilih Tag : </label>
                                <br> 
                                    @foreach($tags as $tag)
                                    <input type="checkbox" class="" id="tags" placeholder="Cari Gambar" name="tags[]" value="{{ $tag->id }}">
                                    <label class="form-check-label" for="defaultCheck2">
                                        {{ $tag->tag }}
                                    </label>
                                    @endforeach
                            </div>
                            
                            <div class="form-group">
                                <label for="Gambar">Gambar</label>
                                <input type="file" class="" id="gambar" placeholder="Cari Gambar" name="gambar">
                            </div>
                                <textarea class="form-control" id="summary-ckeditor" name="isi"></textarea>
                            <button type="submit" class="btn btn-primary mt-2">Tambah data</button>
                        </form>
                    </div>
                </div>
        </div>

    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <h1 class="mt-3">Daftar Artike</h1>
                        <!-- <a href="/blog/create" class="btn btn-primary">Tambah Data Artikel</a> -->
                        @if (session('status'))
                        <div class="alert alert-success alert-dismissible mt-2">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Success!</strong>   {{ session('status') }}
                        </div>
                        @endif
                        <table class="table mt-2">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Count Tag</th>
                                    <th scope="col">Judul</th>
                                    <th scope="col">Isi</th>
                                    <th scope="col">Gambar</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($blogs as $blog)
                                <tr>
                                    <th scope="row"> {{ $loop->iteration }} </th>
                                    <td>{{ $blog->get_kategori->nama }}</td>
                                    <td>{{ $blog->get_tag->count() }} </td>
                                    <td>{{ $blog->judul }}</td>
                                    <td>{!! Str::limit($blog->isi,100) !!}</td>
                                    <td>{{ $blog->gambar }}</td>
                                    <td>
                                        <a href="/blog/{{ $blog->id }}/edit" class="badge badge-success">edit</a>
                                        <form action=" /blog/{{ $blog->id }} " method="post" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger">hapus</button>
                                        </form>
                                        <a href="/blog/{{ $blog->slug_judul }}" class="badge badge-primary">readmore</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            </table>
                            <div class="pagintion">
                                {{ $blogs->links() }}
                            </div>
                    </div>
            </div>
    </div>

    </div>
    </div>
    </div>

    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace( 'summary-ckeditor', {
        filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
    </script>

@endsection