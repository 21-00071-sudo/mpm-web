<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MPM | DTC</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    @vite('resources/css/app.css')
</head>
<body>
    <div class="flex flex-col md:flex-row h-screen">

        <div class="md:w-1/2 flex flex-col items-center justify-center p-8 bg-gray-50 text-gray-800">
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-center">
                <span class="text-red-600">DIGITAL TRANSFORMATION</span> CENTER
            </h1>
            <h2 class="mt-2 text-xl sm:text-2xl font-semibold text-center leading-tight">
                Monitoring & Project Management Web System
            </h2>
        </div>

        <div class="md:w-1/2 flex flex-col items-center justify-center p-8">
            @yield('content')
        </div>

    </div>
</body>
</html>