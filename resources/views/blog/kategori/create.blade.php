@extends ('layout.main')
@section('title','Tambah Kategori')

@section('container')
    <div class="container">

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
                    <h1 class="mt-3">Input Kategori</h1>
                    <form method="post" action="/kategori" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group">
                            <label for="Kategori">Kategori</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Masukan Nama Kategori" name="nama" value="{{ old('nama') }}" >
                                @error('nama')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <button type="submit" class="btn btn-primary mt-2">Tambah data</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="row">
                <div class="col pl-5">
                    <h1 class="mt-3">Daftar Artike</h1>
                    
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
                                <th scope="col">Nama Kategori</th>
                                
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1; @endphp
                            @foreach($kategori as $kat)
                            <tr>
                                <th scope="row"> {{ $no++ }} </th>
                                <td> {{ $kat->nama }}  </td>
                                <td>
                                <a href="/kategori/{{$kat->id}}/edit"><i class="fa fa-edit"></i></a>
                                |
                                    <form action="{{ $kat->id }} " method="post" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data?')"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        
                        </tbody>
                        </table>

                </div>
            </div>
            <div class="pagination">
                {{ $kategori->links() }}
            </div>
        </div>

    </div>
    </div>
    </div>

    </div>

   
@endsection