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
                    <li><a href="/update-affiliate/{{ $url[4] }}">Update</a></li>
                    <li><a class="red-button" href="/delete-affiliate/{{ $url[4] }}">delete</a></li>

                </ul>
            </div>
        </div>
    </div>
</div>

<div class="small-break"></div>

<div class="container">
    <div class="row featured justify-content-center">
        @foreach($affiliates as $affiliate)
            @if($affiliate->id == $url[4])
                <div class="col-md-4">
                <h3>Featured Size:</h3>
                    <a class="product" rel="sponsored" href="{{ $affiliate->link }}" target="_blank">
                        @if($affiliate->rank != '0') 
                            <span class="status-rank">{{ $affiliate->rank }}</span>
                        @endif 
                        @if($affiliate->status->status != 'none') 
                            <span class="status-{{ $affiliate->status->status }}">{{ $affiliate->status->status }}</span>
                        @endif   
                        <div class="image-contain">
                            <img src="{{ $affiliate->image }}" title="{{ ucwords($affiliate->pet->pet) }} {{ ucwords($affiliate->category->category) }}" alt="{{ ucwords($affiliate->pet->pet) }} {{ ucwords($affiliate->category->category) }}" />
                            {{-- <span class="{{ $affiliate->affiliate }}"></span> --}}
                            <span class=" {{ $affiliate->brand->brand }}"></span>
                        </div>
                        <div class="product-body">     
                            <span><small class="animal">{{ ucwords($affiliate->pet->pet) }}</small> <small class="cat">{{ ucwords($affiliate->category->category) }}</small> <small class="brand">{{ ucwords($affiliate->brand->brand) }}</small></span>      
                            <span>@php echo substr($affiliate->name, 0, 140); @endphp ...</span>
                            {{-- <p>{{ substr($affiliate->description, 0, 60) }} ... </p> --}}                         
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
                                <span class="delivery">{{ $affiliate->delivery->delivery }}</span>
                                <div class="break"></div>
                            @if($affiliate->star == 5)
                                <img class="star-5" src="/images/star-{{ $affiliate->star }}.png"
                                alt="star {{ $affiliate->star }}" />
                            @else
                                <img class="star" src="/images/star-{{ $affiliate->star }}.png"
                                alt="star {{ $affiliate->star }}" />
                            @endif
                            {{-- <div class="break"></div>
                            <span>In stock: {{ $affiliate->stock }}</span> --}}
                            {{-- <div class="tiny-break"></div> --}}
                            <div class="pricer">
                                {{-- <small class="discount">${{ $affiliate->discountPrice }}</small> <small class="price">${{ $affiliate->price }}</small> --}}
                                <small class="price">${{ $affiliate->price }}</small>
                            </div>
                            <span class="click-here">View Product</span>
                        </div>
                    </a>
                </div>
            @endif
        @endforeach
        <div class="col-md-1"></div>
        @foreach($affiliates as $affiliate)
            @if($affiliate->id == $url[4])
                <div class="col-md-3">
                <h3>Search Size:</h3>
                    <a class="product" rel="sponsored" href="{{ $affiliate->link }}" target="_blank">
                        @if($affiliate->rank != '0') 
                            <span class="status-rank">{{ $affiliate->rank }}</span>
                        @endif 
                        @if($affiliate->status->status != 'none') 
                            <span class="status-{{ $affiliate->status->status }}">{{ $affiliate->status->status }}</span>
                        @endif   
                        <div class="image-contain">
                            <img src="{{ $affiliate->image }}" title="{{ ucwords($affiliate->pet->pet) }} {{ ucwords($affiliate->category->category) }}" alt="{{ ucwords($affiliate->pet->pet) }} {{ ucwords($affiliate->category->category) }}" />
                            {{-- <span class="{{ $affiliate->affiliate }}"></span> --}}
                            <span class=" {{ $affiliate->brand->brand }}"></span>
                        </div>
                        <div class="product-body">     
                            <span><small class="animal">{{ ucwords($affiliate->pet->pet) }}</small> <small class="cat">{{ ucwords($affiliate->category->category) }}</small> <small class="brand">{{ ucwords($affiliate->brand->brand) }}</small></span>      
                            <span>@php echo substr($affiliate->name, 0, 140); @endphp ...</span>
                            {{-- <p>{{ substr($affiliate->description, 0, 60) }} ... </p> --}}                         
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
                                <span class="delivery">{{ $affiliate->delivery->delivery }}</span>
                                <div class="break"></div>
                            @if($affiliate->star == 5)
                                <img class="star-5" src="/images/star-{{ $affiliate->star }}.png"
                                alt="star {{ $affiliate->star }}" />
                            @else
                                <img class="star" src="/images/star-{{ $affiliate->star }}.png"
                                alt="star {{ $affiliate->star }}" />
                            @endif
                            {{-- <div class="break"></div>
                            <span>In stock: {{ $affiliate->stock }}</span> --}}
                            {{-- <div class="tiny-break"></div> --}}
                            <div class="pricer">
                                {{-- <small class="discount">${{ $affiliate->discountPrice }}</small> <small class="price">${{ $affiliate->price }}</small> --}}
                                <small class="price">${{ $affiliate->price }}</small>
                            </div>
                            <span class="click-here">View Product</span>
                        </div>
                    </a>
                </div>
            @endif
        @endforeach
        </div>
        </div>

<div class="large-break"></div>

@include('includes/footer')

