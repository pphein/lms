<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Library</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- sidebar CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    @vite(['resources/js/app.js', 'resources/js/sidebar.js', 'resources/css/custom.css', 'resources/css/app.css'])

    <style>
        article {
            width: 200px;
            padding: 15px;
            margin: 20px;
            position: relative;
            user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            -webkit-user-select: none;
            border: thin solid #cbcbcb;
            border-radius: 5px;
            display: inline-block;
        }
    </style>
</head>

<body id='body-pd' class="antialiased">
    <div id="app">
        <main class="container-fluid">
            @yield('content')
        </main>
    </div>
</body>

</html>
