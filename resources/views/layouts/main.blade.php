<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Syntactics, Inc </title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">

</head>
<body>
    @include('layouts.navbar')
    @yield('content')
</body>
</html>