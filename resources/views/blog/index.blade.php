<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="robots" content="index, follow" />
    <meta name="description" content="Blog posts about cat and dog prodcuts and supplies." />
    <meta name="keywords" content="blog, posts, cat blog posts, dog blog posts" />
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

    <title>Blog | Softpaw</title>

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
    @foreach($posts as $post)
        {
            "@context": "https://schema.org",
            "@type": "BlogPosting",
            "headline": "<?php echo !empty($post->name) ? $post->name : 'n/a'; ?>",
            "description": "<?php echo !empty($post->meta_description) ? $post->meta_description : 'n/a'; ?>",
            "image": "/blog-uploads/<?php echo !empty($post->image) ? $post->image : 'n/a'; ?>",
            "url": "https://soft-paw.com/blog<?php echo !empty($post->pet->pet && $post->category->category && $post->brand->brand && $post->slug) ? '/' . $post->pet->pet . '/' . $post->category->category . '/' . $post->brand->brand . '/' . $post->slug : ''; ?>",
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
                "@id": "https://soft-paw.com/blog<?php echo !empty($post->pet->pet && $post->category->category && $post->brand->brand && $post->slug) ? '/' . $post->pet->pet . '/' . $post->category->category . '/' . $post->brand->brand . '/' . $post->slug : ''; ?>",
                "name": "<?php echo !empty($post->name) ? $post->name : 'n/a'; ?>"
            }
        }
    @endforeach
</script>

</head>

@include('includes/header')

@php
    $baseUrl = url()->full();
    $url = url()->current();
    $url = explode('/', str_replace('%20', ' ', $url));
    // print_r($url);
@endphp

<div class="adjust-container-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Blog</h1>
                <div class="tiny-break"></div>
                <p>Content coming soon ...</p>
            </div>
        </div>
    </div>
</div>

    <div class="medium-break"></div>

        <div class="sticky-search blog-page">
            <div class="container p-0">
                <div class="row justify-content-center">
                    <div class="col-md-9 p-0">
                        <ul class="selectables">
                            @foreach($search_categories as $search_category)
                                <li id="{{ $search_category->category }}" class="@php if($search_category->category == $url['2']) { echo 'option-selected'; } else{ } @endphp"><input type="checkbox" name="combined[]" id="id-{{ $search_category->id }}" value="{{ $search_category->id }}" />{{ ucwords(str_replace('-', ' ',$search_category->category)) }}</li>
                            @endforeach
                            {{-- @foreach($search_pets as $search_pet)
                                <li id="{{ $search_pet->pet }}" class="@php if($search_pet->pet == $url['2']) { echo 'option-selected'; } else{ } @endphp"><input type="checkbox" name="combined[]" id="id-{{ $search_pet->id }}" value="{{ $search_pet->id }}" />{{ ucwords(str_replace('-', ' ',$search_pet->pet)) }}</li>
                            @endforeach --}}
                            {{-- <li><input type="checkbox" name="all" value="all" id="all"/>All</li> --}}
                        </ul>
                    </div>

                    <div class="col-md-3 p-0 relative">
                        <div class="searches">
                            <input type="text" id="allCategory" class="form-control" placeholder="Search Posts" name="allCategory" value="" />
                        <div id="clicked_search_category" class="form-control">Clear</div>
                        </div>
                    </div>
                </div>
            </div>
        <div id="feedbackMobile"></div>
        </div>
 
        <div id="feedback"></div>

        <div id="visibility">
            <div class="view-all-area blog">
                {{-- <div class="container"> --}}
                    <div class="row justify-content-center">
                        @foreach($posts as $post)
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
                        @endforeach
                
                        <div class="pagination-area">
                            {{ $posts->links() }}
                        </div>

                    </div>
                {{-- </div> --}}
            </div>
        </div>

    <div class="adjust-container-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @include('tables/home_toy_table')
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>

    <script> 
    $(document).ready(function() {
        
        let height = $(window).height();
        let width = $(window).width();

        if(width < 768) {
            var searchable = "{{ route('blog-searchable-all-categories-mobile') }}";
            var feedbacks = "#feedbackMobile";
        }else{
            var searchable = "{{ route('blog-searchable-all-categories') }}";
            var feedbacks = "#feedback";
        }

        $('#clicked_search_category').click(function() {
        $("ul.selectables li").removeClass('option-selected');

            $.ajax({
                type: "POST",
                url: searchable,
                data: { allCategory: ''},
                success: function (data) {
                    $(feedbacks).html(data);
                    $(feedbacks).fadeIn(25);
                    $("#allCategory").val('');
                }
            });
        });
 
        // $("a.product").click(function (e) {
        //     // e.preventDefault();
        //     // console.log(e.target.currentSrc);
        //     localStorage.setItem("post_image", e.target.currentSrc);
        // });

        $("#allCategory").keyup(function (e) {
        e.preventDefault();
        $("ul.selectables li").removeClass('option-selected');

        let allCategory = $("#allCategory").val();

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        $.ajax({
            type: "POST",
            url: searchable,
            data: { allCategory:allCategory },
            success: function (data) {
                $(feedbacks).html(data);
            },
            complete: function () {
                if (allCategory.length < 1) {
                    $("#visibility").fadeIn(25);
                } else {
                    $("#visibility").fadeOut(25);
                }
            },
        });
    });

    let search_pet = $(<?php echo json_encode($search_pets); ?>);
    let search_category = $(<?php echo json_encode($search_categories); ?>);

        for(var i = 0; i < search_category.length; i++) {

            $("#" + search_category[i]['category']).click(function(e) {
                e.preventDefault();
                $("#allCategory").val('');

                if($("#id-" + e.target.id + " input").prop('checked')) {
                    $("#id-" + e.target.id + " input").attr('checked', false);
                }else{

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        type:'POST',
                        url: "{{ route('blog-searchable-categories') }}",
                        data:{search_category:e.target.id},
                        success:function(data) {
                            $("#feedback").html(data);
                            $("#visibility").fadeOut(25);
                        },
                        complete: function () {
                            if(search_category.length < 1) {
                                $("#visibility").fadeIn(25);
                            }else{
                                // console.log(previous);
                                $("ul.selectables li").removeClass('option-selected');
                                $("#visibility").fadeOut(25);
                                $("#" + e.target.id).addClass('option-selected');
                            }
                        }
                    });
   
                    $("#" + e.target.id + " input").attr('checked', true);
              
                }
            });
        }

        for(var i = 0; i < search_pet.length; i++) {

            $("#" + search_pet[i]['pet']).click(function(e) {
                e.preventDefault();
                $("#allCategory").val('');

                if($("#" + e.target.innerText + " input").prop('checked')) {
                    $("#" + e.target.innerText + " input").attr('checked');
                }else{

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        type:'POST',
                        url: "{{ route('blog-searchable-pets') }}",
                        data:{search_pet:e.target.id},
                        success:function(data) {
                            $("#feedback").html(data);
                            $("#visibility").fadeOut(25);
                        },
                        complete: function () {
                            if(search_pet.length < 1) {
                                $("#visibility").fadeIn(25);
                            }else{
                                // console.log(previous);
                                $("ul.selectables li").removeClass('option-selected');
                                $("#visibility").fadeOut(25);
                                $("#" + e.target.innerText).addClass('option-selected');
                            }
                        }
                    });
                }
            });
        }
    });
</script>

@include('includes/footer')
