<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaduan Masyarakat</title>
    <link rel="stylesheet" href="{{asset('assets/css/landing.css')}}">
</head>
<body>
    <nav>
        <div class="logo">
            <img src="#" alt="" srcset="">
        </div>

        <ul class="nav-links">
            <li><a href="#">Home</a></li>
            <li><a href="#">Contact</a></li>
            <a class="login" href="{{route('login')}}">Login</a>
        </ul>
    </nav>

    <main class="contents">
        <div class="row">
            <div class="content-wrapper">
                <h1>Selamat Datang di Pengaduan Masyarakat Desa Cigombong</h1>
                <p>Dengan adanya website pengaduan masyarakat ini, semua warga desa cigombong bisa mengadu keluhan yang kalian punya di sekitar desa kalian</p>
                
                {{-- <a href="{{route('register')}}">Register</a> --}}
            </div>

            <div class="content-wrapper">
                <img src="{{asset('assets/img/landing/hero.jpg')}}" alt="" srcset="">
            </div>

        </div>
    </main>
</body>
</html>