@extends('_userlayout.app')
@section('content')
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h5>Form Laporan</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('masyarakat.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="isi_laporan" class="form-label">Isi Laporan</label>
                        <textarea type="text" class="form-control" id="isi_laporan" name="isi_laporan" cols="30" rows="5"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto</label>
                        <input type="file" class="form-control" id="foto" name="foto">
                    </div>
                    <div class="mb-3">
                        <label for="kategori" class="form-label">Kategori Pengaduan</label>
                        <select name="kategori" class="form-select" id="kategori">
                            <option value="" selected disabled>Pilih Kategori Pengaduan</option>
                            <option value="publik" {{ old('kategori' == 'publik' ? 'selected' : '') }}>Publik</option>
                            <option value="privasi" {{ old('kategori' == 'privasi' ? 'selected' : '') }}>Privasi</option>
                        </select>
                    </div>
                    <button class="btn btn-success" type="submit">Kirim</button>
                </form>
            </div>
        </div>

    </div>

    <div class="col-lg-6 ">
        <div class="card">
            <div class="card-header">
                <h5>Apa yang perlu diketahui sebelum melapor?</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    @foreach ($laporan as $item)
                    <div class="col-1"><span>{{$item['nomor']}}.</span></div>
                    <div class="col-11"><span>{!!$item['isi']!!}</span></div>
                    @endforeach

                </div>
            </div>
        </div>

    </div>
@endsection