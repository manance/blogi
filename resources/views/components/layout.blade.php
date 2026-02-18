<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <title>{{ $title ?? "Sākums" }}</title>
</head>
<body>
    <x-navigation></x-navigation>
    {{ $slot }}
</body>
</html>