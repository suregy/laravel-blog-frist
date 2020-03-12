@extends ('layout.main')
@section('title','Edit Blog')

@section('container')
    <div class="container">
        <div class="row border bg-light">
            <div class="col-8 pl-5">
                <h1 class="mt-3">Edit Blog</h1>

                <form method="POST" action="/blog/{{ $blog->id }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                    <div class="form-group">
                        <label for="Judul">Judul</label>
                        <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" placeholder="Masukan judul" name="judul" value="{{ $blog->judul }}" >
                            @error('judul')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="form-group">
                        <label for="Kategori">Kategori</label>
                        <select name="kategori_id" class="form-control @error('kategori_id') is-invalid @enderror">
                            <option value="" class="disabled selected">Pilih Kategori</option>
                            @foreach($kategori as $kat)
                            <option value=" {{$kat->id}}" <?php if($blog->kategori_id == $kat->id) {echo "selected";} ?> > {{ $kat->nama }} </option>
                            @endforeach
                        </select>
                        @error('kategori_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                   
                    <div class="form-group">
                        <label for="Tag">Pilih Tag : </label>
                        <br> 
                                

                                @foreach($tags as $tag)

                                    <input type="checkbox" class="" id="tags" name="tags[]" value="{{ $tag->id }}" <?php if(in_array($tag->id,$tagid)) {echo "checked";} ?> >
                                    <label class="form-check-label" for="defaultCheck2">
                                        {{ $tag->tag }}
                                    </label>

                                @endforeach

                                

                            


                    </div>
                    
                    <div class="form-group">
                        <label for="Gambar">Gambar</label>
                        <input type="file" class="" id="gambar" placeholder="Cari Gambar" name="gambar">
                    </div>
                    <div class="form-group">
                        <img src=" {{ url('storage/uploads/'.$blog->gambar)}} " alt="img" class="img-thumbnail w-50 h-25">
                    </div>
                        <textarea class="form-control" id="summary-ckeditor" name="isi">{{$blog->isi}}</textarea>
                    <button type="submit" class="btn btn-primary mt-2">Tambah data</button>
                </form>
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