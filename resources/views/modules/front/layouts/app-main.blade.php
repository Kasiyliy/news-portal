<!doctype html>
<html lang="en">
<head>
    @include('modules.front.parts.head')
    @include('modules.front.parts.styles')
    <title>Hello, world!</title>
    @yield('styles')
</head>
<body>
@yield('content')
@include('modules.front.parts.scripts')
@yield('scripts')
</body>
</html>
