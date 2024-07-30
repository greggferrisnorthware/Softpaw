<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex, nofollow" />
    <meta name="description" content="We sell pet supplies for cats, kittens, dogs and puppies." />
    <meta name="keywords" content="cat, dog, kitten, puppy, pet supplies" />
    <meta name="author" content="Gregg Ferris" />
    <meta name="mobile-web-app-capable" content="yes" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>500 | Softpaw</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-KZBS77QKLP"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-KZBS77QKLP');
    </script>
</head>

@include('includes/header')

<div class="adjust-container-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>This is embarrasing ...</h1>
                <div class="tiny-break"></div>
                <a href="/">Back to Home Page</a>
                <div class="large-break"></div>
                <div class="large-break"></div>
                <div class="large-break"></div>
                <div class="large-break"></div>
            </div>
        </div>
    </div>
</div>

@include('includes/footer_errors')
