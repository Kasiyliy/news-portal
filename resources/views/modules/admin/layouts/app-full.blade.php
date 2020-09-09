<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    @include('modules.admin.parts.head')
    @include('modules.admin.parts.styles')
    @yield('styles')
</head>
<body>
<x-header.admin :user="auth()->user()"/>
<main class="u-main">
    <x-sidebar.admin :user="auth()->user()"/>
    <div class="u-content">
        <div class="u-body">
            @yield('content')
        </div>
        <x-footer.admin/>
    </div>
</main>
@include('modules.admin.parts.scripts')
@yield('scripts')
</body>
</html>
