@extends ('layout.main')
@section('title','Edit Kategori')

@section('container')
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h1 class="mt-3">Edit Kategori</h1>
                <form method="post" action="/kategori/{{ $kategori->id }}" enctype="multipart/form-data">
                @method('put')
                @csrf
                    <div class="form-group">
                        <label for="Kategori">Kategori</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Masukan Nama Kategori" name="nama" value="{{ $kategori->nama }}" >
                            @error('nama')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Tambah data</button>
                </form>
            </div>
        </div>
    </div>

   

@endsection