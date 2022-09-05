<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <script src="//unpkg.com/alpinejs" defer></script>
        @livewireStyles
    </head>

    <body>
        <div class="container">
            @yield('content')            
        </div>
        @livewireScripts
    </body>
</html>