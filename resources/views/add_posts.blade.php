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

    script src=""

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
            <h1>Add Post</h1>
            <form class="add-post" action="{{ route('add-post') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="box">
                            <label>image</label>
                            <input type="file" name="image" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="box">
                            <label>image_large</label>
                            <input type="file" name="image_large" />
                        </div>
                    </div>
                </div>       
                <div class="row">
                    <div class="col-md-6">
                        <label>Category</label>
                        <select name="category_id" required>
                            <option value="">Select a Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label>Pet</label>
                        <select name="pet_id" required>
                            <option value="">Select a Pet</option>
                            @foreach($pets as $pet)
                                <option value="{{ $pet->id }}">{{ $pet->pet }}</option>
                            @endforeach
                        </select>
                    </div>
                    {{-- <div class="col-md-4">
                        <label>Brand</label>
                        <select name="brand_id" required>
                            <option value="">Select a brand</option>
                            @foreach($brands as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->brand }}</option>
                            @endforeach
                        </select>
                    </div> --}}
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label>author</label>
                        <input type="text" name="author" />
                    </div>
                    <div class="col-md-4">
                        <label>name</label>
                        <input type="text" name="name" />
                    </div>
                    <div class="col-md-4">
                        <label>slug</label>
                        <input type="text" name="slug" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label>link</label>
                        <input type="text" name="link" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label>keywords</label>
                        <input type="text" name="keywords" />
                    </div>
                </div>         
                <div class="row">
                    <div class="col-md-2">
                        <label>meta_robot</label>
                        <select name="meta_robot" required>
                            <option value="">Select a meta_robot</option>
                            <option value="noindex, nofollow">noindex, nofollow</option>
                            <option value="index, follow">index, follow</option>
                        </select>
                    </div>
                    <div class="col-md-10">
                        <label>meta_keywords</label>
                        <input type="text" name="meta_keywords" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label>meta_description</label>
                        <input type="text" name="meta_description" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label>meta_author</label>
                        <input type="text" name="meta_author" />
                    </div>
                    <div class="col-md-4">
                        <label>meta_title</label>
                        <input type="text" name="meta_title" />
                    </div>
                    <div class="col-md-4">
                        <label>alternative_headline</label>
                        <input type="text" name="alternative_headline" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label>description</label>
                        <textarea name="description"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label>description_bottom</label>
                        <textarea name="description_bottom"></textarea>
                    </div>
                </div>
                <div class="small-break"></div>
                <div class="row">
                    <div class="col-md-8"></div>
                    <div class="col-md-4">
                        <input type="submit" name="submit" value="add post" />
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@include('includes/footer')

