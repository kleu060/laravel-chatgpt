<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    @vite(['resources/js/app.js'])
</head>
<body>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>
@yield('after_script')