<!doctype html>
<html lang="en">
<head>
    @include('modules.front.parts.head')
    @include('modules.front.parts.styles')
    <title>Smart Jastar!</title>
    @yield('styles')
</head>
<body>

@if(request()->route()->getName() === 'welcome')
    <x-front.front-header/>
@else
    <x-front.small-header/>
@endif

@yield('content')
<x-front.front-footer/>
@include('modules.front.parts.scripts')
@yield('scripts')
</body>
</html>
