<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex, nofollow" />
    <meta name="description" content="n/a" />
    <meta name="keywords" content="n/a, n/a, n/a" />
    <meta name="author" content="n/a" />
    <meta name="mobile-web-app-capable" content="yes" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    @php
        $baseUrl = url()->full();
        $url = url()->current();
        $url = explode('/', str_replace('%20', ' ', $url));
        // print_r($url);
    @endphp

    <link rel="canonical" href="@php echo $baseUrl; @endphp" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Puppy Care | Softpaw</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "BreadcrumbList",
            "itemListElement": [{
                "@type": "ListItem",
                "position": 1,
                "name": "<?php echo $url[3]; ?>",
                "item": "https://soft-paw.com/<?php echo $url[3]; ?>"
            },{
                "@type": "ListItem",
                "position": 2,
                "name": "<?php echo $url[4]; ?>"
            }]
        }
    </script>

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

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Puppy Care</h1>
            <ul>
                <li>Puppy Articles</li>
                <li>Dog Articles</li>
                <li>Senior Dog Articles</li>
                <li>Kitten Articles</li>
                <li>Cat Articles</li>
                <li>Senior Cat Articles</li>
            </ul>
        </div>
    </div>
</div>

@include('includes/featured_affiliate_for_pages')

@include('includes/search_affiliates_for_pages')

@include('includes/footer_others')
