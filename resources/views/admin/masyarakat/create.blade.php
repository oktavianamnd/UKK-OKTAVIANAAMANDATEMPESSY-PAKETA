@extends('_adminlayout.app')
@section('content')
@section('title', 'Tambah Masyarakat')
<br>
<div class="col-lg-12 card grid-margin stretch-card" style="padding: 30px;">
<form action="{{ route('admin.masyarakat.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div>
        <label>NIK</label>
        <input type="number" name="nik" id="nik">
    </div>
    <br>
    <div>
        <label>Name</label>
        <input type="text" name="nama" id="nama">
    </div>
    <br>
    <div>
        <label>Username</label>
        <input type="text" name="username" id="username">
    </div>
    <br>
    <div>
        <label>Password</label>
        <input type="password" name="passoword" id="passoword">
    </div>
    <br>
    <div>
        <label>Telepon</label>
        <input type="number" name="telp" id="telp">
    </div>
    <br>
    <button type="submit">kirim</button>
</form>
@endsection