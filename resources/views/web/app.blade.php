<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>X-Rest || @yield('title')</title>
    @yield('headlink')
</head>
<body id="reportsPage">
    @yield('nave')
    @yield('container')
    @include('sweetalert::alert')
    @yield('script')
    @yield('footer')
    
</body>
</html>