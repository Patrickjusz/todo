<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts.head')
</head>

<body>
    <div class="container page-todo">
        @yield('content')
    </div>

    <script>
        @yield('js')
    </script>
    @include('layouts.js')
</body>

</html>
