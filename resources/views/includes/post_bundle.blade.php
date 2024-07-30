<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
        @php
            $baseUrl = url()->full();
            $url = url()->current();
            $url = explode('/', str_replace('%20', ' ', $url));
            // $test = $url[0] . '//' . $url[1] . '' . $url[2] .  '/blog';
            // print_r($baseUrl);
            // echo $test;
        @endphp
        @foreach($posts as $post)
            @if($post->pet->pet == $url[4] && $post->category->category == $url[5] && $post->slug == $url[6])
            
             @if(stripos($baseUrl, '?page=') === false)
                <meta name="robots" content="<?php if(!empty($post->meta_robot)) { echo $post->meta_robot; } else { echo 'noindex, nofollow'; } ?>" />      
            @else
                <meta name="robots" content="noindex, nofollow" />  
            @endif
                <meta name="description" content="<?php if(!empty($post->meta_description)) { echo $post->meta_description; } else { echo 'n/a'; } ?>" />
                <meta name="keywords" content="<?php if(!empty($post->meta_keywords)) { echo $post->meta_keywords; } else { echo 'n/a'; } ?>" />
                <meta name="author" content="<?php if(!empty($post->author)) { echo $post->author; } else { echo 'n/a'; } ?>" />
                
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

<script type="application/ld+json">
    @foreach($featured_affiliates as $featured_affiliate)
        @if($featured_affiliate->pet->pet == $url[4] && $featured_affiliate->category->category == $url[5])

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

        @endif
    @endforeach

    {
        "@context": "https://schema.org",
        "@type": "BreadcrumbList",
        "itemListElement": [
            {
                "@type": "ListItem",
                "position": 1,
                "name": "blog",
                "item": "https://soft-paw.com/blog"
            },{
                "@type": "ListItem",
                "position": 2,
                "name": "<?php echo !empty($post->pet->pet) ? $url[4] : ''; ?>",
                "item": "https://soft-paw.com/blog<?php echo !empty($post->pet->pet) ? '/' . $url[4] : ''; ?>"
            },{
                "@type": "ListItem",
                "position": 3,
                "name": "<?php echo !empty($post->category->category) ? $url[5] : ''; ?>",
                "item": "https://soft-paw.com/blog<?php echo !empty($post->pet->pet && $post->category->category) ? '/' . $url[4] . '/' . $url[5] : ''; ?>"
            },{
                "@type": "ListItem",
                "position": 4,
                "name": "<?php echo !empty($post->slug) ? $url[6] : ''; ?>"
            }
        ]
    }

    @foreach($posts as $post)
        @if($post->pet->pet == str_replace('-', ' ', strtolower($url[4])) && $post->category->category == str_replace('-', ' ', strtolower($url[5])) && strtolower($post->slug) == strtolower($url[6]))

            {
                "@context": "https://schema.org",
                "@type": "BlogPosting",
                "headline": "<?php echo !empty($post->name) ? $post->name : 'n/a'; ?>",
                "description": "<?php echo !empty($post->meta_description) ? $post->meta_description : 'n/a'; ?>",
                "image": "/blog-uploads/<?php echo !empty($post->image) ? $post->image : 'n/a'; ?>",
                "url": "https://soft-paw.com/blog<?php echo !empty($post->pet->pet && $post->category->category && $post->slug) ? '/' . $url[4] . '/' . $url[5] . '/' . $url[6] : ''; ?>",
                "datePublished": "<?php echo !empty($post->created_at) ? $post->created_at : 'n/a'; ?>",
                "dateModified": "<?php echo !empty($post->updated_at) ? $post->updated_at : 'n/a'; ?>",
                "keywords": "<?php echo !empty($post->meta_keywords) ? $post->meta_keywords : 'n/a'; ?>",
                "author": {
                    "@type": "Person",
                    "name": "<?php echo !empty($post->author) ? $post->author : 'n/a'; ?>",
                    "url": "https://soft-paw.com/journalist/<?php echo strtolower(str_replace(" ", "-", !empty($post->author))) ? $post->author : 'n/a'; ?>"
                },
                "about": {
                    "@type": "Thing",
                    "@id": "https://soft-paw.com/blog<?php echo !empty($post->pet->pet && $post->category->category && $post->slug) ? '/' . $url[4] . '/' . $url[5] . '/' . $url[6] : ''; ?>",
                    "name": "<?php echo !empty($post->name) ? $post->name : 'n/a'; ?>"
                }      
        }
        
        @endif
    @endforeach
</script>

</head>
<body>