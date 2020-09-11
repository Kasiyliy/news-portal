<!doctype html>
<html lang="en">
<head>
    @include('modules.front.parts.head')
    @include('modules.front.parts.styles')
    <title>Smart Jastar!</title>
    @yield('styles')
</head>
<body>
@yield('content')
<x-front.front-footer/>
@include('modules.front.parts.scripts')
@yield('scripts')
</body>
</html>
