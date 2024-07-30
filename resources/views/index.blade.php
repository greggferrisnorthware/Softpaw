<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="robots" content="index, follow" />
    <meta name="description" content="We sell pet supplies for cats, kittens, dogs and puppies." />
    <meta name="keywords" content="cat, dog, kitten, puppy, pet supplies" />
    <meta name="author" content="Gregg Ferris" />
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

    <title>Pet Supplies Plus | Softpaw</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script type="application/ld+json">
        
        @foreach($featured_affiliates as $featured_affiliate)
            {
                "@context": "https://schema.org/",
                "@type": "Product",
                "name": "<?php echo !empty($featured_affiliate->name) ? $featured_affiliate->name : 'n/a'; ?>",
                "image": "<?php echo !empty($featured_affiliate->image) ? $featured_affiliate->image : 'n/a'; ?>",
                "description": "<?php echo !empty($featured_affiliate->description) ? $featured_affiliate->description : 'n/a'; ?>",
                "url": "<?php echo !empty($featured_affiliate->link) ? $featured_affiliate->link : 'n/a'; ?>",
                "keywords": "<?php echo !empty($featured_affiliate->keywords) ? $featured_affiliate->keywords : 'n/a'; ?>",
                "category": "<?php echo !empty($featured_affiliate->category->category) ? $featured_affiliate->pet->pet : 'n/a'; ?> <?php echo !empty($featured_affiliate->category->category) ? $featured_affiliate->category->category : 'n/a'; ?>",
                "offers": {
                    "@type": "AggregateOffer",
                    "price": "<?php echo !empty($featured_affiliate->price) ? $featured_affiliate->price : 'n/a'; ?>",
                    "lowPrice": "<?php echo !empty($featured_affiliate->discountPrice) ? $featured_affiliate->discountPrice : 'n/a'; ?>",
                    "priceCurrency": "USD",
                    "offers": [
                        {
                            "@type": "Offer",
                            "url": "<?php echo !empty($featured_affiliate->link) ? $featured_affiliate->link : 'n/a'; ?>"
                        }
                    ]
                },
                "reviewRating": {
                "@type": "Rating",
                "ratingValue": "<?php echo !empty($featured_affiliate->star) ? $featured_affiliate->star : 'n/a'; ?>"
                },
                "brand": {
                    "@type": "Brand",
                    "name": "<?php echo !empty($featured_affiliate->brand->brand) ? $featured_affiliate->brand->brand : 'n/a'; ?>"
                }
            }
        @endforeach

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

<div class="adjust-container-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Welcome</h1>
                <div class="tiny-break"></div>
                <p>Content coming soon ...</p>
            </div>
        </div>
    </div>
</div>

@include('includes/featured_affiliate_for_page')  

<div class="tiny-break"></div>

<div class="adjust-container-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @include('tables/home_toy_table')
            </div>
        </div>
    </div>
</div>

@include('includes/search_affiliates_for_page')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>

@include('includes/footer_others')
