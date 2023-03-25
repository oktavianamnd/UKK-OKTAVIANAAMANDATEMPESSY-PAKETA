<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Pengaduan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="col-lg-12" style="padding: 30px;">
        <form action="{{ route('masyarakat.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="isi_laporan" class="form-label">Isi Laporan</label>
                <input type="text" class="form-control" id="isi_laporan" name="isi_laporan">
            </div>
            <div class="mb-3">
                <label for="foto" class="form-label">Foto</label>
                <input type="file" class="form-control" id="foto" name="foto"></input>
            </div>
            <div class="mb-3">
                <input type="radio" name="radiobutton" id="radio">Public
                <input type="radio" name="radiobutton" id="radio">Private
            </div>
            <button class="btn btn-success" type="submit">kirim</button>    
        </form>
    </div>
</body>

</html>
