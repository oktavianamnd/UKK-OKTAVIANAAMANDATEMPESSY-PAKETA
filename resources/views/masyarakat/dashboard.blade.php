@extends('_userlayout.app')
@section('content')
<br>
<center><h1>Hallo {{$me->nama}}</h1></center>
<br>
<div class="col-lg-12 grid-margin stretch-card" style="padding: 30px;">
<div><a class="btn btn-success" href="{{route('masyarakat.create')}}">Create</a></div><br>
<table class="table">
    <thead>
      <tr>
        <th scope="col">Nomor</th>
        <th scope="col">Tanggal Pengaduan</th>
        <th scope="col">NIK</th>
        <th scope="col">Isi Laporan</th>
        <th scope="col">Foto</th>
        <th scope="col">Status</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($pengaduans as $pengaduan)
      <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$pengaduan->tgl_pengaduan}}</td>
        <td>{{$pengaduan->nik}}</td>
        <td>{{$pengaduan->isi_laporan}}</td>
        <td><img src="{{asset('img/pengaduan/' .$pengaduan->foto)}}" width="150px" height="100px" alt=""></td>
        <td>{{$pengaduan->status}}</td>
        <td>
            @if($pengaduan->status == '0')
            <form action="{{route('pengaduan.destroy', $pengaduan->id_pengaduan)}}" method="post" onsubmit="return confirm('apakah anda yakin?')">
                @csrf
                @method('delete')
                <button class="btn btn-danger">Hapus</button>
            </form>
            @endif
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
@section('js')
@endsection
