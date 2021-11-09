@section('page_title', 'Error 404')
@section('page_description', 'Example ERROR 404 description...')
@section('page_keywords', 'task manager, to do app, error 404')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts.head')
</head>

<body>
    <div class="container mt-5 pt-5">
        <div class="alert alert-danger text-center">
            <h2 class="display-3">404</h2>
            <p class="display-5">Oops! Something is wrong.</p>
        </div>
    </div>
</body>

</html>