<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
 
    @include('front.includes.styles')

</head>

<body>
    @include('front.includes.header')
    @include('front.includes.navbar')
    @include('front.includes.mobile-navbar')

    @yield('content')

    @include('front.includes.footer')


    @include('front.includes.scripts')
</body>

</html>
