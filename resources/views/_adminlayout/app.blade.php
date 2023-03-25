<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    @include('_adminlayout.head')
  @yield('css')
</head>
<body>
    @include('_adminlayout.navbar')
    <div class="content-wrapper">
        <div class="container mt-4">
            @yield('content')
        </div>
    </div>
    @include('_adminlayout.js')
    @yield('js')
</body>
</html>

