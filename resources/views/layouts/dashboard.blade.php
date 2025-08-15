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

        <main class="m-6">
            <h1 class="text-4xl font-bold">Hello, {{ $user->name }}!</h1>

            @yield('content')
        </main>
    </div>
</body>

</html>
