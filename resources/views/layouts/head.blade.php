<meta charset="utf-8">

<title>@yield('page_title') | Todo</title>

<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="noindex" />
<meta name="description" content="@yield('page_description')" />
<link rel="canonical" href="{{ url()->current() }}" />
<meta name="keywords" content="todo, tasks list, @yield('page_keywords')">

<meta property="og:locale" content="{{ str_replace('_', '-', app()->getLocale()) }}" />
<meta property="og:type" content="article" />
<meta property="og:title" content="@yield('page_title') | Todo" />
<meta property="og:description" content="@yield('page_description')" />
<meta property="og:url" content="{{ url()->current() }}" />
{{-- <meta property="og:image" content="@yield('og_image')" /> --}}

<link rel="apple-touch-icon" sizes="180x180" href="/media/img/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/media/img/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/media/img/favicon-16x16.png">
<link rel="manifest" href="/media/img/site.webmanifest">
<link rel="mask-icon" href="/media/img/safari-pinned-tab.svg" color="#5bbad5">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="theme-color" content="#ffffff">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
    integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

<script src="https://cdn.jsdelivr.net/npm/handlebars@latest/dist/handlebars.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

<link rel="stylesheet" href="{{ asset('css/app.css') }}">
