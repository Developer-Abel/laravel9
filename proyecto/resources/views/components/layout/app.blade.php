<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DevGala - {{$title ?? ''}}</title>
    @vite('resources/css/app.scss')
    @vite('resources/js/app.js')
</head>
<body>
    <x-layout.navigation />

    @if(session('status'))
        <p>{{session('status')}}</p>
    @endif
    
    {{ $slot }}
</body>
</html>