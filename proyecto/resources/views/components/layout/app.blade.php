<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DevGala - {{$title ?? ''}}</title>
</head>
<body>
    {{-- @include('partials.navigation') --}}
    <x-layout.navigation />
    {{-- @yield('content') --}}
    {{ $slot }}
</body>
</html>