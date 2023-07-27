<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Admin')</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    @vite('resources/js/app.js')
</head>
<body class="admin-client">
    @include('admin.partials.header')

    <main class="admin-client">
        @yield('admin-content')
    </main>

    @yield('custom-script-tail')
</body>
</html>
