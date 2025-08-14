<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MPM | DTC</title>
</head>
<body>
    <h1>Dashboard | {{ $user->role }}</h1>
    <a href={{ route('logout') }}>Logout</a>
</body>
</html>