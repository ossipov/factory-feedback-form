<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    @stack('meta')
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    @stack('styles')
</head>
<body class="bg-gray-200 py-10">
    @yield('content')

    <footer class="text-gray-600 text-center text-xs mt-20">
        <a class="hover:underline" href="https://ossipov.me">ossipov.me</a>
    </footer>
    <script src="{{ mix('/js/app.js') }}"></script>
    @stack('js')
</body>
</html>
