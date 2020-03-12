@extends ('layout.main')
@section('title','Daftar Tag')

@section('container')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="mt-3">Daftar Tag</h1>

                <div class="col-8 border p-3">
                    <form method="post" action="/tag" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group">
                            <label for="Nama Tag">Nama Tag</label>
                            <input type="text" class="form-control @error('tag') is-invalid @enderror" id="tag" placeholder="Masukan Nama Tag" name="tag" value="{{ old('tag') }}" >
                                @error('tag')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <button type="submit" class="btn btn-primary mt-2">Tambah data</button>
                    </form>
                </div>
                
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
                            <th scope="col">Nama Tag</th>
                            
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @foreach($Tag as $tag)
                        <tr>
                            <th scope="row"> {{ $no++ }} </th>
                            <td> {{ $tag->tag }} </td>
                            <td>
                            <a href="#modal{{$tag->id}}" data-toggle="modal" data-id="{{$tag->id}}"><i class="fa fa-edit"></i></a>
                            |
                                <form action="/tag/{{ $tag->id }} " method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data?')"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>

                        <!-- Modal -->
                        <div class="modal fade" id="modal{{$tag->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="/tag/{{ $tag->id }}" method="post">
                                    @method('put')
                                    @csrf
                                    <div class="form-group">

                                        <label for="Kategori">Tag</label>
                                        <input type="text" class="form-control @error('tag') is-invalid @enderror" id="tag" placeholder="Masukan Nama Kategori" name="tag" value="{{ $tag->tag }}" >
                                            @error('tag')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-2">Update data</button>
                                </form>
                            </div>
                            </div>
                        </div>
                        </div>

                       @endforeach
                      
                    </tbody>
                    </table>

            </div>
        </div>
        <div class="pagination">
            {{ $Tag->links() }}
        </div>
    </div>
    
@endsection