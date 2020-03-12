@extends ('layout.main')
@section('title','Daftar Mahasiswa')

@section('container')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="mt-3">Daftar Mahasiswa</h1>
                <a href="/students/create" class="btn btn-primary">Tambah Data Mahasiswa</a>
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
                            <th scope="col">Nama</th>
                            <th scope="col">NRP</th>
                            <th scope="col">Email</th>
                            <th scope="col">Jurusan</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($students as $mhs)
                        <tr>
                            <th scope="row"> {{ $loop->iteration }} </th>
                            <td>{{ $mhs->nama }}</td>
                            <td>{{ $mhs->nrp }}</td>
                            <td>{{ $mhs->email }}</td>
                            <td>{{ $mhs->jurusan }}</td>
                            <td>
                                <a href="" class="badge badge-success">edit</a>
                                <form action=" /students/{{ $mhs->id }} " method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger">hapus</button>
                                </form>
                                <a href="/students/{{ $mhs->id }}" class="badge badge-primary">detail</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>

            </div>
        </div>
    </div>
@endsection