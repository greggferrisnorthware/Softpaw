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

    <title>Add Post | Softpaw</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

@include('includes/header')

<div class="medium-break"></div>

<div class="container users">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="using">
                <ul>
                    <li><button onclick="history.back();">Back</button></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12" style="padding:0px;">
            <h1>Add Category</h1>
            <form class="add-post" action="{{ route('add-category') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <label>Category</label>
                        <input type="text" name="category" />
                    </div>
                </div>
                <div class="tiny-break"></div>
                <div class="row">
                    <div class="col-md-6">
                        <input type="submit" name="submit" value="Add Category" />
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@include('includes/footer')

