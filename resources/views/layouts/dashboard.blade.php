<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DTC | MPM</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex min-h-screen">

    <x-sidebar></x-sidebar>

    <div class="flex-1 flex flex-col">
        <x-header></x-header>

        <main class="my-6 mx-20">
            <h1 class="text-4xl font-bold mb-6">@yield('title')</h1>

            @yield('content')
        </main>
    </div>

    <x-logout></x-logout>

</body>

</html>
