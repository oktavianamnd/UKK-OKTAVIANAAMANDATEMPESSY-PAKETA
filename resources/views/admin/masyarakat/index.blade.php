@extends('_adminlayout.app')
@section('content')
@section('title', 'Data Masyarakat')
<br>
<div class="col-lg-12 card grid-margin stretch-card" style="padding: 30px;">
    <h4>Data Masyarakat</h4><br>
    <div><a class="btn btn-primary" href="{{ route('admin.masyarakat.create') }}">Create</a></div>
    <div class="card-header d-flex justify-content-between"><br>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nomor</th>
                    <th scope="col">NIK</th>
                    <th scope="col">Name</th>
                    <th scope="col">Username</th>
                    <th scope="col">Telepon</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($masyarakats as $masyarakat)
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $masyarakat->nik }}</td>
                    <td>{{ $masyarakat->nama }}</td>
                    <td>{{ $masyarakat->username }}</td>
                    <td>{{ $masyarakat->telp }}</td>
                    <td>
                        <a class="btn btn-success" href="#">Edit</a>
                        <a class="btn btn-danger"
                            href="{{ route('admin.masyarakat.destroy', $masyarakat->nik) }}">Hapus</a>
                    </td>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">Tidak ada data</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    @endsection
