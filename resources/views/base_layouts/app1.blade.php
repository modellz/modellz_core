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
<!--base container-->
<div class="container-fluid">
    @yield('content')
</div>
<!--./base container-->
<!--includes jquery, bootstrap, datatables...etc-->
<script src="/js/app.js"></script>
<!--includes Page scripts-->
@yield('page_scripts')
</body>
</html>
