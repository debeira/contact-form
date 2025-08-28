<!DOCTYPE html>
<html>
<head>
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/js/app.js', 'resources/css/app.css'])
    @inertiaHead
    @routes
</head>
<body>
@inertia
</body>
</html>
