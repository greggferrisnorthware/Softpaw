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

    <title>Add Affiliate | Softpaw</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

@include('includes/header')

<div class="small-break"></div>

<div class="container users">
    
    <div class="row">
    <div class="col-md-6 affiliating">
            <ul>
                <li class="adding-things"><a href="{{ route('add-affiliates') }}">add product</a></li>
            </ul>
    <div class="row justify-content-center">
        <div class="col-md-10 p-0 relative">
            <div class="searches">
                <input type="text" id="clicked_search_view_everything_users" class="form-control" placeholder="Search Products" name="clicked_search_view_everything_users" value="" />
                {{-- <div id="clicked_search_view_everything_users" class="form-control">Clear</div> --}}
            </div>
        </div>
    </div>
    
    <h3>Products</h3>
    <div id="feedback"></div> 
        <div id="visibility">
        @foreach($affiliates as $affiliate)
        <div class="using">
        <div class="row">
            <div class="col-md-3">
                <img src="{{ $affiliate->image }}" />
            </div>
            <div class="col-md-9">
                <ul>
                    <li><a rel="sponsored" href="{{ $affiliate->link }}" target="_blank">live product</a></li>
                    <li><a href="{{ url('view-single-affiliate/' . $affiliate->id) }}">view card</a></li>
                    <li><a href="{{ url('update-affiliate/' . $affiliate->id) }}">update product</a></li>
                    <li><a href="{{ url('delete-affiliate/' . $affiliate->id) }}">delete product</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-7">
                <small>Name:</small>
                {{ $affiliate->name }}
            </div>
            <div class="col-md-1">
                <small>Rank:</small>
                {{ $affiliate->rank }}
            </div>
            <div class="col-md-2">
                <small>Category:</small>
                {{ $affiliate->category->category }}
            </div>
            <div class="col-md-2">
                <small>Pet:</small>
                {{ $affiliate->pet->pet }}
            </div>
        </div>
        </div>
    <div class="tiny-break"></div>
        @endforeach
           
        <div class="pagination-area">
            {{ $affiliates->links() }}
        </div>

    </div> 
    </div>
                 
    <div class="col-md-6 postings">
            <ul>
                <li class="adding-things"><a href="{{ route('add-posts') }}">add post</a></li>
            </ul>
    <div class="row justify-content-center">
        <div class="col-md-10 p-0 relative">
            <div class="searches">
                <input type="text" id="clicked_search_posts_everything_users" class="form-control" placeholder="Search Posts" name="clicked_search_posts_everything_users" value="" />
                {{-- <div id="clicked_search_view_everything_users" class="form-control">Clear</div> --}}
            </div>
        </div>
    </div>
    
            <h3>Posts</h3>
    <div id="feedback2"></div> 
        
        <div id="visibility2">
        @foreach($posts as $post)
        <div class="using">
        <div class="row">
            <div class="col-md-3">
                <img src="/blog-uploads/{{ $post->image }}" />
            </div>
            <div class="col-md-9">
                <ul>
                    <li><a href="{{ url('blog/' . $post->pet->pet . '/' . $post->category->category . '/' . $post->slug) }}">view post</a></li>
                    <li><a href="{{ url('view-single-post/' . $post->id) }}">view card</a></li>
                    <li><a href="{{ url('update-post/' . $post->id) }}">update post</a></li>
                    <li><a href="{{ url('delete-post/' . $post->id) }}">delete post</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <small>Name:</small>
                {{ $post->name }}
            </div>
            <div class="col-md-2">
                <small>Author:</small>
                {{ $post->author }}
            </div>
            <div class="col-md-2">
                <small>Category:</small>
                {{ $post->category->category }}
            </div>
            <div class="col-md-2">
                <small>Pet:</small>
                {{ $post->pet->pet }}
            </div>
        </div>
    </div>
    <div class="tiny-break"></div>
        @endforeach
                  
    <div class="pagination-area">
        {{ $posts->links() }}

    </div>
    </div>
    </div>
    </div>
    </div>
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>

<script>

   $(document).ready(function() {

    $("#clicked_search_view_everything_users").keyup(function (e) {
            e.preventDefault();

            let everything = $("#clicked_search_view_everything_users").val();

            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });

            $.ajax({
                type: "POST",
                url: "{{ route('search-everything-users') }}",
                data: { everything:everything },
                success: function (data) {
                    $("#feedback").html(data);
                },
                complete: function () {
                    if (everything.length < 1) {
                        $("#visibility").fadeIn(25);
                    } else {
                        $("#visibility").fadeOut(25);
                    }
                },
            });
        });

         $("#clicked_search_posts_everything_users").keyup(function (e) {
            e.preventDefault();

            let everything2 = $("#clicked_search_posts_everything_users").val();

            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });

            $.ajax({
                type: "POST",
                url: "{{ route('search-posts-everything-users') }}",
                data: { everything2:everything2 },
                success: function (data) {
                    $("#feedback2").html(data);
                },
                complete: function () {
                    if (everything.length < 1) {
                        $("#visibility2").fadeIn(25);
                    } else {
                        $("#visibility2").fadeOut(25);
                    }
                },
            });
        });
    });

</script>

@include('includes/footer')