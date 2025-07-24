<!-- resources/views/components/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Book Review System</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
   
    
    <main>
        {{ $slot }}
    </main>
</body>
</html>
