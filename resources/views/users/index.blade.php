@extends('users.master')
@section('content')

@if(Auth::check())
@if(Auth::user()->role == 'admin')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <a href="{{ route('blog.create') }}" class="d-none d-sm-inline-block btn btn-dark shadow-sm"><i
        class="text-white"></i> Tambah Data Baru [+]</a>
    </div>

        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif

    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Gambar</th>
                <th scope="col">Judul</th>
                <th scope="col">Content</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
    @forelse($blogs as $blog)
        <tbody>
            <tr>
                <td>{{ ++$i }}</td>
                <td>
                     <img src="{{ url('/img/'.$blog->gambar) }}" class="rounded" style="width: 150px">
                </td>
                <td>{{$blog['judul']}}</td>
                <td>{!! $blog['content'] !!}</td>
                <td>
                    <form action="{{ route('blog.destroy',$blog->id) }}" method="POST">
                        <a class="btn btn-success" href="{{ route('blog.edit',$blog->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
                <div class="alert alert-danger">
                    Data Blog Belum Tersedia
                </div>
        @endforelse
        </tbody>
    </table>
@endif
@if(Auth::user()->role == 'hubin')
<!-- <li class="nav-item">
    <a class="nav-link" href="{{url('hubin')}}">Halaman Hubin</a>
</li> -->
<h1>Ini Halaman Hubin</h1>
@endif

@if(Auth::user()->role == 'siswa')
<!-- <li class="nav-item">
    <a class="nav-link" href="{{url('siswa')}}">Halaman Siswa</a>
</li> -->
<h1>INI HALAMAN SISWA</h1>
@endif

@endif
@endsection
 