<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DevGala - {{$title ?? ''}}</title>
</head>
<body>
    <x-layout.navigation />

    @if(session('status'))
        <p>{{session('status')}}</p>
    @endif
    
    {{ $slot }}
</body>
</html>