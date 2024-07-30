@include('includes/post_bundle')
@include('includes/header')

@php
    $url = url()->current();
    $url = explode('/', str_replace('%20', ' ', $url));
@endphp

{{-- <script> 
    window.onload = function() {
        var post_image = localStorage.getItem("post_image");
        console.log(post_image);
        document.querySelector("#postImage").src = post_image;
    };
</script> --}}

{{-- <div class="jumbotron">
    @foreach($posts as $post)
        @php $str_replace = str_replace(['/', '-', '_', '.jpeg', '.png', '.jpg', '.gif'], [' ', ' ', ' ', ' ', ' ', ' ', ' '], $post->image_large); @endphp
        @if($post->pet->pet == $url[4] && $post->category->category == $url[5] && $post->slug == $url[6])
            <img id="postImage" style="width:100%;" src="/blog-uploads/{{ $post->image_large }}" alt="{{ $str_replace }} logo" title="{{ $str_replace }}" />
            <div class="message">
                @php $count = 1; @endphp
                @foreach($affiliates as $affiliate)
                    @if($affiliate->id = rand(1, stripos($count_affiliates, $affiliate->id) !== false) && $affiliate->pet->pet == $url[4] && $affiliate->category->category == $url[5])
                        @if($count < 2)
                            <a class="product-tron" rel="sponsored" href="{{ $affiliate->link }}" target="_blank">
                                @if($affiliate->status->status != 'none') 
                                    <span class="status-{{ $affiliate->status->status }}">{{ $affiliate->status->status }}</span>
                                @endif                                
                                <div class="left">
                                    <span class="heading">@php echo substr($affiliate->name, 0, 140); @endphp ...</span>
                                    <div class="break"></div>
                                    <span><small class="animal">{{ ucwords($affiliate->pet->pet) }}</small> <small class="cat">{{ ucwords($affiliate->category->category) }}</small> <small class="brand">{{ ucwords($affiliate->brand->brand) }}</small></span> --}}
                                    {{-- <p>{{ substr($affiliate->description, 0, 200) }} ...</p> --}}
                                    {{-- <div class="tiny-break"></div>
                                    <span class="learn-more">Get {{ ucwords($affiliate->category->category) }}</span>
                                </div>
                                <div class="right">           
                                    <ul class="affiliated-specs">
                                        <li class="spec-adjust">{{ $affiliate->spec_1_name }}:</li>
                                        <li class="spec-adjust-span">{{ $affiliate->spec_1 }}</li>
                                        <li class="spec-adjust">{{ $affiliate->spec_2_name }}:</li>
                                        <li class="spec-adjust-span">{{ $affiliate->spec_2 }}</li>
                                        <li class="spec-adjust">{{ $affiliate->spec_3_name }}:</li>
                                        <li class="spec-adjust-span">{{ $affiliate->spec_3 }}</li>
                                        <li class="spec-adjust">{{ $affiliate->spec_4_name }}:</li>
                                        <li class="spec-adjust-span">{{ $affiliate->spec_4 }}</li>
                                    </ul>
                                    <div class="tiny-break"></div>
                                    <span class="delivery">{{ $affiliate->delivery->delivery }}</span>
                                </div>
                            </a>                      
                            @php $count++; @endphp
                        @endif
                    @endif
                @endforeach
            </div>
        @endif
    @endforeach
</div> --}}

<div class="adjust-container-padding">

    <div class="tiny-break"></div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <span class="awesome">Top <?php echo $url[4] . ' ' . $url[5]; ?> Picks</span>
            </div>
        </div>
    </div>
    
</div>

    <div class="tiny-break"></div>

   <div class="view-all-area post-page">
        <div class="row featured justify-content-center">
            @php $count = 1; @endphp
            @foreach($featured_affiliates as $featured_affiliate)
                @if($featured_affiliate->pet->pet == $url[4] && $featured_affiliate->category->category == $url[5] && $count < 6)
                    <div class="col-md-4 col-lg-4 col-xl-3 col-xxl-2">
                        <a class="product" rel="sponsored" href="{{ $featured_affiliate->link }}" target="_blank">
                            {{-- <span class="status-{{ $featured_affiliate->status->status }}">{{ $featured_affiliate->status->status }}</span> --}}
                            <span class="status-rank">{{ $featured_affiliate->rank }}</span>
                            <div class="image-contain">
                                <img src="{{ $featured_affiliate->image }}" title="{{ ucwords($featured_affiliate->pet->pet) }} {{ ucwords($featured_affiliate->category->category) }}" alt="{{ ucwords($featured_affiliate->pet->pet) }} {{ ucwords($featured_affiliate->category->category) }}" />
                                <span class="{{ $featured_affiliate->sold_by }}"></span>
                            </div>
                            <div class="product-body">     
                                <span><small class="animal">{{ ucwords($featured_affiliate->pet->pet) }}</small> <small class="cat">{{ ucwords($featured_affiliate->category->category) }}</small> <small class="brand">{{ ucwords($featured_affiliate->brand->brand) }}</small></span>
                                <span>@php echo substr($featured_affiliate->name, 0, 140); @endphp ...</span>
   
                                <ul class="affiliated-specs show-specs">
                                    <li class="spec-adjust">{{ $featured_affiliate->spec_1_name }}:</li>
                                    <li class="spec-adjust-span">{{ $featured_affiliate->spec_1 }}</li>
                                    <li class="spec-adjust">{{ $featured_affiliate->spec_2_name }}:</li>
                                    <li class="spec-adjust-span">{{ $featured_affiliate->spec_2 }}</li>
                                    <li class="spec-adjust">{{ $featured_affiliate->spec_3_name }}:</li>
                                    <li class="spec-adjust-span">{{ $featured_affiliate->spec_3 }}</li>
                                    <li class="spec-adjust">{{ $featured_affiliate->spec_4_name }}:</li>
                                    <li class="spec-adjust-span">{{ $featured_affiliate->spec_4 }}</li>
                                </ul>
                                {{-- <small>Material: {{ $featured_affiliate->material }}</small> --}}
                                <span class="delivery">{{ $featured_affiliate->delivery->delivery }}</span>
                                <div class="break"></div>
                                @if($featured_affiliate->star == 5)
                                    <img class="star-5" src="/images/star-{{ $featured_affiliate->star }}.png"
                                    alt="star {{ $featured_affiliate->star }}" />
                                @else
                                    <img class="star" src="/images/star-{{ $featured_affiliate->star }}.png"
                                    alt="star {{ $featured_affiliate->star }}" />
                                @endif
                                <div class="pricer">
                                    <small class="price">${{ $featured_affiliate->price }}</small>
                                </div>
                                <span class="click-here">Get {{ ucwords($featured_affiliate->category->category) }}</span>
                            </div>
                        </a>
                        @auth
                            <br />
                            <a class="update-button" href="/update-affiliate/{{ $featured_affiliate->id }}">update</a>
                        @endauth
                    </div>
                    @php $count++; @endphp
                @endif
            @endforeach
        </div>
    </div>

<div class="adjust-container-padding">
        
    <main>
        <div class="container">
            <div class="row product">
                <div class="col-md-8">
                    <article>
                        @foreach($posts as $post)
                            @if($post->pet->pet == $url[4] && $post->category->category == $url[5] && $post->slug == $url[6])
                                <h1>{{ $post->name }}</h1>
                                @auth
                                    <div class="tiny-break"></div>
                                    <a class="update-button" href="/update-post/{{ $post->id }}">update</a>
                                    <div class="tiny-break"></div>
                                @endauth
                                <small><em>{{ $post->author }} | Published: {{ date('m/d/Y', strtotime($post->created_at)) }}</em></small>
                                <div class="product-body">
                                    <span class="related"><small class="animal">{{ ucwords($post->pet->pet) }}</small> <small class="cat">{{ ucwords($post->category->category) }}</small></span>
                                </div>
                                @php echo $post->description; @endphp
                            @endif
                        @endforeach           

                        <div class="break"></div>
                        @foreach($posts as $post)
                            @if($post->pet->pet == $url[4] && $post->category->category == $url[5] && $post->slug == $url[6])
                                @php echo $post->description_bottom; @endphp
                            @endif
                        @endforeach           
                    </article>   
                </div>
                <div class="col-md-4">
                    <aside>
                        <div class="sliver">
                            <div class="relative">
                                <span class="related-posts-aside">Recent Posts</span>
                                <div class="searches-aside">
                                    <input type="text" id="allCategoryPostAside" class="form-control" placeholder="Search Posts" name="allCategoryPostAside" value="" />
                                    <div id="clicked_search_category_post_aside" class="form-control">Clear</div>
                                </div>
                            </div>
                            <div class="aside-posts">
                                <div id="feedbackPostAside"></div>
                                <div id="visibilityPostAside">
                                    <ul>
                                        @php $count = 1; @endphp
                                        @foreach($posts as $post)
                                            @if($count < 6)
                                                <li><a class="post-aside" href="{{ $post->link }}">{{ substr($post->name, 0, 75) }} ...<span class="aside-date">Published: {{ $post->created_at }}</span><small class="animal">{{ ucwords($post->pet->pet) }}</small> <small class="cat">{{ ucwords($post->category->category) }}</small></a></li>
                                            @endif
                                        @php $count++; @endphp
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                   
                        <div class="sliver">
                        <div class="relative">
                            <span class="related-products-aside">New Products</span>
                            <div class="searches-aside">
                                <input type="text" id="allCategoryAside" class="form-control" placeholder="Search Products" name="allCategoryAside" value="" />
                                <div id="clicked_search_category_aside" class="form-control">Clear</div>
                            </div>
                        </div>
                        <div class="aside-products">
                            <div id="feedbackAside"></div>
                                <div id="visibilityAside">
                                    <ul>
                                        @php $count = 1; @endphp
                                        @foreach($affiliates as $affiliate)
                                            @if($count < 6)
                                                <li class="relative">
                                                    <a class="product-aside" rel="sponsored" href="{{ $affiliate->link }}" target="_blank">
                                                        <div class="aside-image">
                                                            <img src="{{ $affiliate->image }}" alt="{{ ucwords($affiliate->pet->pet) }}, {{ ucwords($affiliate->category->category) }}, {{ ucwords($affiliate->brand->brand) }}" title="{{ ucwords($affiliate->pet->pet) }}, {{ ucwords($affiliate->category->category) }}, {{ ucwords($affiliate->brand->brand) }}" />
                                                        </div>

                                                        <div class="aside-content">
                                                            {{ substr($affiliate->name, 0, 75) }} ...

                                                            <div class="breaking"></div>

                                                            <small class="animal">{{ ucwords($affiliate->pet->pet) }}</small> <small class="cat">{{ ucwords($affiliate->category->category) }}</small> <small class="brand">{{ ucwords($affiliate->brand->brand) }}</small><div class="breaking"></div><small class="price">Price: ${{ $affiliate->price }}</small>
                                                        </div>
                                                    </a>
                                                </li>
                                            @endif
                                        @php $count++; @endphp
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </aside> 
                </div>
            </div>
        </div>
    </main>
</div>

@include('includes/search_products')
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>

<script> 

    $(document).ready(function() {
        
        let height = $(window).height();
        let width = $(window).width();

        if(width < 768) {
            var searchable = "{{ route('blog-searchable-all-affiliates-mobile') }}";
            var feedbacks = "#feedbackMobile";
        }else{
            var searchable = "{{ route('blog-searchable-all-affiliates') }}";
            var feedbacks = "#feedback";
        }

        var searchableAside = "{{ route('blog-searchable-all-affiliates-aside') }}";
        var searchablePostAside = "{{ route('blog-searchable-all-affiliates-post-aside') }}";
        var feedbacksAside = "#feedbackAside";
        var feedbacksPostAside = "#feedbackPostAside";

        let pet = window.location.href.split('/')[4];
        let optionSelected = $(<?php echo $url[5]; ?>);

        $('#clicked_search_category').click(function() {
            $("ul.selectables li").removeClass('option-selected');
            $("#" + pet).addClass('option-selected');

            $.ajax({
                type: "POST",
                url: searchable,
                data: { allCategory: '', pet:pet},
                success: function (data) {
                    $(feedbacks).html(data);
                    $("#feedback").fadeIn(25);
                    $("#allCategory").val('');
                }
            });
        });

        $('#clicked_search_category_aside').click(function() {
            $("ul.selectables li").removeClass('option-selected');
            $("#" + pet).addClass('option-selected');

            $.ajax({
                type: "POST",
                url: searchableAside,
                data: { allCategoryAside: '', pet:pet},
                success: function (data) {
                    $(feedbacksAside).html(data);
                    $('#feedbackAside').fadeIn(25);
                    $("#allCategoryAside").val('');
                }
            });
        });

        $('#clicked_search_category_post_aside').click(function() {
            $("ul.selectables li").removeClass('option-selected');
            $("#" + pet).addClass('option-selected');

            $.ajax({
                type: "POST",
                url: searchablePostAside,
                data: { allCategoryPostAside: '', pet:pet},
                success: function (data) {
                    $(feedbacksPostAside).html(data);
                    $('#feedbackPostAside').fadeIn(25);
                    $("#allCategoryPostAside").val('');
                }
            });
        });
        
        $('#clicked_search').click(function() {
            $("#" + optionSelected[0].innerText).addClass('option-selected');
            $("#" + pet).addClass('option-selected');

            $.ajax({
                type: "POST",
                url: "{{ route('blog-searchable-all-brands') }}",
                data: { allBrand: ''},
                success: function (data) {
                    $("#feedback").html(data);
                    $("#feedback").fadeIn(25);
                    $("#allBarnd").val('');
                }
            });
        });

        
        $("#allCategory").keyup(function (e) {
            e.preventDefault();
            $("ul.selectables li").removeClass('option-selected');
            $("#" + pet).addClass('option-selected');

            let allCategory = $("#allCategory").val();

            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });

            $.ajax({
                type: "POST",
                url: searchable,
                data: { allCategory:allCategory, pet:pet },
                success: function (data) {
                    $(feedbacks).html(data);
                },
                complete: function () {
                    if (allCategory.length < 1 && pet.length < 1) {
                        $("#visibility").fadeIn(25);
                    } else {
                        $("#visibility").fadeOut(25);
                    }
                },
            });
        });

        
        $("#allCategoryAside").keyup(function (e) {
            e.preventDefault();
            $("ul.selectables li").removeClass('option-selected');
            $("#" + pet).addClass('option-selected');

            let allCategoryAside = $("#allCategoryAside").val();

            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });

            $.ajax({
                type: "POST",
                url: searchableAside,
                data: { allCategoryAside:allCategoryAside, pet:pet },
                success: function (data) {
                    $(feedbacksAside).html(data);
                },
                complete: function () {
                    if (allCategoryAside.length < 1 && pet.length < 1) {
                        $("#visibilityAside").fadeIn(25);
                    } else {
                        $("#visibilityAside").fadeOut(25);
                    }
                },
            });
        });

        
        $("#allCategoryPostAside").keyup(function (e) {
            e.preventDefault();
            $("ul.selectables li").removeClass('option-selected');
            $("#" + pet).addClass('option-selected');

            let allCategoryPostAside = $("#allCategoryPostAside").val();

            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });

            $.ajax({
                type: "POST",
                url: searchablePostAside,
                data: { allCategoryPostAside:allCategoryPostAside, pet:pet },
                success: function (data) {
                    $(feedbacksPostAside).html(data);
                },
                complete: function () {
                    if (allCategoryPostAside.length < 1 && pet.length < 1) {
                        $("#visibilityPostAside").fadeIn(25);
                    } else {
                        $("#visibilityPostAside").fadeOut(25);
                    }
                },
            });
        });

        $("#allBrand").keyup(function (e) {
            e.preventDefault();
            $("ul.selectables li").removeClass('option-selected');
            $("#" + pet).addClass('option-selected');

            let allBrand = $("#allBrand").val();

            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });

            $.ajax({
                type: "POST",
                url: "{{ route('blog-searchable-all-brands') }}",
                data: { allBrand:allBrand },
                success: function (data) {
                    $("#feedback").html(data);
                },
                complete: function () {
                    if (allBrand.length < 1) {
                        $("#visibility").fadeIn(25);
                    } else {
                        $("#visibility").fadeOut(25);
                    }
                },
            });
        });

        let search_affiliate = $(<?php echo json_encode($search_categories); ?>);

        for(var i = 0; i < search_affiliate.length; i++) {

            $("#" + search_affiliate[i]['category']).click(function(e) {
                e.preventDefault();
                $("#allCategory").val('');
                $("ul.selectables li").removeClass('option-selected');
                $("#" + pet).addClass('option-selected');
                // console.log(window.location.href.split('/')[4]);

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
                        url: "{{ route('blog-searchable-affiliates') }}",
                        data:{search_affiliate:e.target.id, search_pet_too:window.location.href.split('/')[4]},
                        // data:{search_affiliate:e.target.id},
                        success:function(data) {
                            $("#feedback").html(data);
                            $("#visibility").fadeOut(25);
                        },
                        complete: function () {
                            if(search_affiliate.length < 1) {
                                $("#visibility").fadeIn(25);
                            }else{
                                // console.log(previous);
                                $("#visibility").fadeOut(25);
                                $("#" + e.target.id).addClass('option-selected');
                            }
                        }
                    });                      
   
                    $("#" + e.target.id + " input").attr('checked', true);        
                }
            });
        }
    });
</script>

@include('includes/footer')

