@extends ('layout.main')
@section('title','Daftar Mahasiswa')

@section('container')
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h1 class="mt-3">Input Mahasiswa</h1>
                <form method="post" action="/students">
                @csrf
                    <div class="form-group">
                        <label for="Nama">Nama</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Masukan Nama" name="nama" value="{{ old('nama') }}" >
                            @error('nama')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group">
                        <label for="NRP">NRP</label>
                        <input type="text" class="form-control @error('nrp') is-invalid @enderror" id="nrp" placeholder="Masukan NRP" name="nrp" value="{{ old('nrp') }}">
                        @error('nrp')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group">
                        <label for="Email">Email</label>
                        <input type="text" class="form-control" id="email" placeholder="Masukan email" name="email" value="{{ old('email') }}">
                    </div>
                    <div class="form-group">
                        <label for="Jurusan">Jurusan</label>
                        <input type="text" class="form-control" id="jurusan" placeholder="Masukan jurusan" name="jurusan" value="{{ old('jurusan') }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah data</button>
                </form>
            </div>
        </div>
    </div>
@endsection