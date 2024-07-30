<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex, nofollow" />
    <meta name="description" content="Singe view ..." />
    <meta name="keywords" content=" ... " />
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

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

@include('includes/header')

<div class="large-break"></div>


<div class="container users">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="using">
                <ul>
                    <li><button onclick="history.back();">Back</button></li>
                    <li><a class="everything-button" href="/view-everything">Hub</a></li>
                    <li><a href="/update-post/{{ $url[4] }}">Update</a></li>
                    <li><a class="red-button" href="/delete-post/{{ $url[4] }}">delete</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="small-break"></div>

<div class="view-all-area blog">
    <div class="row featured justify-content-center">
        @foreach($posts as $post)
            @if($post->id == $url[4])
            <div class="col-md-3">
                <a class="product" href="/blog/{{ $post->pet->pet }}/{{ str_replace(' ', '-', strtolower($post->category->category)) }}/{{ str_replace(' ', '-', strtolower($post->slug)) }}">
                    <div class="image-contain">
                        <img src="/blog-uploads/{{ $post->image }}" title="{{ ucwords($post->pet->pet) }} {{ ucwords($post->category->category) }}" alt="{{ ucwords($post->pet->pet) }} {{ ucwords($post->category->category) }}">
                        <span class="avatar"></span>
                    </div>
                    <div class="product-body">
                        <span><small class="animal">{{ ucwords($post->pet->pet) }}</small> <small class="cat">{{ ucwords($post->category->category) }}</small></span>
                        
                        {{-- <small><span>Author: {{ $post->author }}</span></small> --}}
                        <span class="blog-heading">{{ $post->name }}</span>
                        <small class="post-pub-adjust"><em>{{ $post->author }} | Published: {{ date('m/d/Y', strtotime($post->created_at)) }}</em></small>
                        <span class="paraline">@php echo substr($post->description, 0, 160); @endphp ...</span>
                        <div class="break"></div>
                        <span class="click-here">Read More</span>
                    </div>
                </a>

            </div>
            @endif
        @endforeach
        
    </div>
</div>

<div class="large-break"></div>

@include('includes/footer')

