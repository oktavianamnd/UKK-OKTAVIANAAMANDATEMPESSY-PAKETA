@extends('_adminlayout.app')
@section('content')
@section('title', 'Data Petugas')
<br>
<div class="col-lg-12 card grid-margin stretch-card" style="padding: 30px;">
    <h4>Data Petugas</h4><br>
    <div><a class="btn btn-primary" href="{{ route('admin.petugas.create') }}">Create</a></div>
    <div class="card-header d-flex justify-content-between"><br>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nomor</th>
                    <th scope="col">Username</th>
                    <th scope="col">Telepon</th>
                    <th scope="col">Level</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @forelse ($petugass as $petugas)
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $petugas->username }}</td>
                        <td>{{ $petugas->telp }}</td>
                        <td>{{ $petugas->level }}</td>
                        <td>
                            <form method="post" action="{{ route('admin.petugas.destroy', $petugas->id_petugas) }}">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Tidak ada data</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
