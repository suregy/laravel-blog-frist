@extends ('layout.main')
@section('title','Daftar Artikel')

@section('container')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="mt-3">Daftar Artike</h1>
                <a href="/kategori/create" class="btn btn-primary">Tambah Data Kategori</a>
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
    
@endsection