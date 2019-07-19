<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="csrf-token" id="IdCsfrFetch" content="{{ csrf_token() }}">
    <title>{{config('app.name').' | '.\Illuminate\Support\Facades\Route::currentRouteName()}}</title>
    <link rel="icon" href="{{asset('storage/favicon.png')}}" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="/css/app.css">
    @yield('links')
</head>
<body>
@include('base_includes.loading')
<!--base container-->
    <div class="container-fluid">
        <nav  class="navbar navbar-expand-lg navbar-expand-md navbar-light fixed-top bg-white p-0 shadow">
            <strong   class="ml-2 mx-auto" id="IdNumOfRows" style="font-size:20px;color: #e83a93;">Welcome to <img src="{{asset('storage/logo.png')}}" width="150px"></strong>
            <!-- Toggler/collapsibe Button -->
        </nav>
    </div>
    <div class="container-fluid mx-4" style="margin-top: 50px;">
    @yield('content')
    </div>
<footer class="footer bg-dark fixed-bottom shadow-lg p-2">
    <div class="container">
        <span class="text-muted"> © 2019 -<a href="http://www.modellz.com">Modellz</a> All Rights Reserved</span>
    </div>
</footer>
<!--./base container-->
<!--includes jquery, bootstrap, datatables...etc-->
<script src="/js/app.js"></script>
<!--includes Page scripts-->
<script>
    let  navopen=0;
    function openNav( ) {
        if (navopen === 0) {
            document.getElementById("mySidenav").style.width = "250px";
            navopen=1;
        }
        else {
            document.getElementById("mySidenav").style.width = "0";
            navopen=0;
        }
    }
</script>
@yield('page_scripts')
</body>
</html>
