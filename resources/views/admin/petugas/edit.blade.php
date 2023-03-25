{{-- @extends('_adminlayout.app')
@section('content')
@section('title', 'Edit data Petugas')
<h3>Edit Pegawai</h3>

<a href="{{route('admin.petugas.index')}}"> Kembali</a>

<br/>
<br/>

@foreach($petugass as $petugas)
<form action="{{route('admin.petugas.update')}}" method="post">
    {{ csrf_field() }}
    <input type="hidden" name="id" value="{{ $petugas->id_petugas }}"> <br/>
    <label for="username">Username</label>
    <input type="text" required="required" name="username" value="{{ $petugas->username }}"> <br/>
    <label for="telp">Telepon</label>
    <input type="text" required="required" name="telp" value="{{ $petugas->telp }}"> <br/>
    <label for="level">Level</label>
    <input type="number" required="required" name="level" value="{{ $petugas->level }}"> <br/>
    <input type="submit" value="Simpan Data">
</form>
@endforeach
@endsection --}}