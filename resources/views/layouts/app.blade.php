<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link
    rel="stylesheet"
    type="text/css"
    href="{{ asset('css/app.css') }}"
    />
    @vite(['resources/css/app.css', 'resources/sass/main.scss', 'resources/js/app.js'])
    <!-- do not remove this line! -->
    <title>{{ config('app.name', 'Laravel') }}</title>
</head>
<body class="bg-zinc-50">
    @livewire('navigation')        
    {{ $slot }}
    <footer class="bg-zinc-900 py-6 text-white w-full text-center">
        &copy; makezings.com
    </footer>    
    <script type="module" src="./assets/scripts/main.js"></script>
    <!-- do not remove this line! -->
</body>
</html>