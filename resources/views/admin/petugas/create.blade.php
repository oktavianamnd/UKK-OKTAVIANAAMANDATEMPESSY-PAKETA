@extends('_adminlayout.app')
@section('title', 'Tambah Petugas')
@section('content')
    <div class="col-lg-12 card grid-margin stretch-card" style="padding: 30px;">
        <form action="{{ route('admin.petugas.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="nama_petugas" class="form-label">Nama Petugas</label>
                <input class="form-control" type="text" name="nama_petugas" id="nama_petugas">
            </div>
            <br>
            <div>
                <label for="username" class="form-label">Username</label>
                <input  class="form-control" type="text" name="username" id="username">
            </div>
            <br>
            <div>
                <label for="password" class="form-label">Password</label>
                <input  class="form-control" type="password" name="password" id="password">
            </div>
            <br>
            <div>
                <label for="telp" class="form-label">Telepon</label>
                <input  class="form-control" type="number" name="telp" id="telp">
            </div>
            <br>

            <button class="btn btn-success" type="submit">kirim</button>
        </form>
    @endsection
