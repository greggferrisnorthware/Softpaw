@php
    $baseUrl = url()->full();
    $url = url()->current();
    $url = explode('/', str_replace('%20', ' ', $url));
    // $test = $url[0] . '//' . $url[1] . '' . $url[2] .  '/blog';
    // print_r($baseUrl);
    // echo $test;
@endphp
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
        @foreach($posts as $post)
            @if($post->pet->pet == $url[4] && $post->category->category == $url[5] && $post->slug == $url[6])
                <meta name="robots" content="<?php echo $post->meta_robot; ?>" />
                <meta name="description" content="<?php echo $post->meta_description; ?>" />
                <meta name="keywords" content="<?php echo $post->meta_keywords; ?>" />
                <meta name="author" content="<?php echo $post->author; ?>" />

                <title>@php if(!empty($post->meta_title)) { echo $post->meta_title; }else{ echo 'Pet Supplies Plus'; } @endphp | Softpaw</title>
                
            @endif
        @endforeach 
    <meta name="mobile-web-app-capable" content="yes" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="canonical" href="@php echo $baseUrl; @endphp" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

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
<body>