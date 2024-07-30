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

<div class="medium-break"></div>

<div class="container users">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="using">
                <ul>
                    <li><button onclick="history.back();">Back</button></li>
                    <li><a class="red-button" href="/delete-post/{{ $url[4] }}">delete</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12" style="padding:0px;">
            <h1>Update Post</h1>
            @foreach($posts as $post)
                @if($post->id == $url[4])
                    <form class="add-post" action="{{ route('update-post', $url[4]) }}" method="post" enctype="multipart/form-data">
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
                                    <option value="@php echo !empty($post->category->id) ? $post->category->id : ''; @endphp">@php echo $post->category->category; @endphp</option>
                                    @foreach($categories as $category)
                                        @if($category->id != $post->category->id)
                                            <option value="@php echo !empty($category->id) ? $category->id : ''; @endphp">@php echo !empty($category->category) ? $category->category : ''; @endphp</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label>Pet</label>
                                <select name="pet_id" required>
                                    <option value="@php echo !empty($post->pet->id) ? $post->pet->id : ''; @endphp">@php echo $post->pet->pet; @endphp</option>
                                    @foreach($pets as $pet)
                                        @if($pet->id != $post->pet->id)
                                            <option value="@php echo !empty($pet->id) ? $pet->id : ''; @endphp">@php echo !empty($pet->pet) ? $pet->pet : ''; @endphp</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            {{-- <div class="col-md-4">
                                <label>Brand</label>
                                <select name="brand_id" required>
                                    <option value="@php echo !empty($post->brand->id) ? $post->brand->id : ''; @endphp">@php echo $post->brand->brand; @endphp</option>
                                    @foreach($brands as $brand)
                                        @if($brand->id != $post->brand->id)
                                            <option value="@php echo !empty($brand->id) ? $brand->id : ''; @endphp">@php echo !empty($brand->brand) ? $brand->brand : ''; @endphp</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div> --}}
                        </div>
                        
                        <div class="row">
                            <div class="col-md-4">
                                <label>author</label>
                                <input type="text" name="author" value="@php echo !empty($post->author) ? $post->author : ''; @endphp" />
                            </div>
                            <div class="col-md-4">
                                <label>name</label>
                                <input type="text" name="name" value="@php echo !empty($post->name) ? $post->name : ''; @endphp" />
                            </div>
                            <div class="col-md-4">
                                <label>slug</label>
                                <input type="text" name="slug" value="@php echo !empty($post->slug) ? $post->slug : ''; @endphp" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label>link</label>
                                <input type="text" name="link" value="@php echo !empty($post->link) ? $post->link : ''; @endphp" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label>keywords</label>
                                <input type="text" name="keywords" value="@php echo !empty($post->keywords) ? $post->keywords : ''; @endphp" />                            
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <label>meta_robot</label>
                                <select name="meta_robot" required>
                                    <option value="@php echo !empty($post->meta_robot) ? $post->meta_robot : ''; @endphp">@php echo !empty($post->meta_robot) ? $post->meta_robot : ''; @endphp</option>
                                    <option value="noindex, nofollow">noindex, nofollow</option>
                                    <option value="index, follow">index, follow</option>
                                </select>
                            </div>
                            <div class="col-md-10">
                                <label>meta_keywords</label>
                                <input type="text" name="meta_keywords" value="@php echo !empty($post->meta_keywords) ? $post->meta_keywords : ''; @endphp" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label>meta_description</label>
                                <input type="text" name="meta_description" value="@php echo !empty($post->meta_description) ? $post->meta_description : ''; @endphp" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label>meta_author</label>
                                <input type="text" name="meta_author" value="@php echo !empty($post->meta_author) ? $post->meta_author : ''; @endphp" />
                            </div>
                            <div class="col-md-4">
                                <label>meta_title</label>
                                <input type="text" name="meta_title" value="@php echo !empty($post->meta_title) ? $post->meta_title : ''; @endphp" />
                            </div>
                            <div class="col-md-4">
                                <label>alternative_headline</label>
                                <input type="text" name="alternative_headline" value="@php echo !empty($post->alternative_headline) ? $post->alternative_headline : ''; @endphp" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label>description</label>
                                <textarea name="description">@php echo !empty($post->description) ? $post->description : ''; @endphp</textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label>description_bottom</label>
                                <textarea name="description_bottom">@php echo !empty($post->description_bottom) ? $post->description_bottom : ''; @endphp</textarea>
                            </div>
                        </div>
                        <div class="small-break"></div>
                        <div class="row">
                            <div class="col-md-8"></div>
                            <div class="col-md-4">
                                <input type="submit" name="submit" value="update post" />
                            </div>
                        </div>
                    </form>
                @endif
            @endforeach
        </div>
    </div>
</div>

@include('includes/footer')

