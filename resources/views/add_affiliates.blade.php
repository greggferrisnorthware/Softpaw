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
    <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css" />

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
            <h1>Add Product</h1>
            <form class="add-post" action="{{ route('add-affiliate') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <label>Category</label>
                        <small>(Missing a category, <a href="{{ route('add-categories') }}">{{ __('Add Category') }}</a>)</small>
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
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label>Affiliate</label>
                        <select name="affiliate_look_up_id" required>
                            <option value="">Select an Affiliate</option>
                            @foreach($affiliates_look_ups as $affiliates_look_up)
                                <option value="{{ $affiliates_look_up->id }}">{{ $affiliates_look_up->affiliate_look_up }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label>Brand</label>
                        @if(empty($url[4]))
                        <small>(Missing a brand, <a href="{{ route('add-brands') }}">{{ __('Add Brand') }}</a>)</small>
                        @else
                        <small>(Missing a brand, <a href="{{ route('add-update-brands') }}">{{ __('Add Brand') }}</a>)</small>
                        @endif
                        <select name="brand_id" class="selectpicker" data-live-search="true" required>
                            <option value="">Select a Brand</option>
                            @foreach($brands as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->brand }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label>Sold By</label>
                        <select name="sold_by_id" required>
                            <option value="">Select a Sold By</option>
                            @foreach($sold_bies as $sold_by)
                                <option value="{{ $sold_by->id }}">{{ $sold_by->sold_by }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label>Delivery</label>
                        <select name="delivery_id" required>
                            <option value="">Select delivery</option>
                            @foreach($deliveries as $delivery)
                                <option value="{{ $delivery->id }}">{{ $delivery->delivery }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label>Status</label>
                        <select name="status_id" required>
                            <option value="">Select a status</option>
                            @foreach($statuses as $status)
                                <option value="{{ $status->id }}">{{ $status->status }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-9">
                        <label>link</label>
                        <input type="text" name="link" />
                    </div>
                    <div class="col-md-1">
                        <label>rank</label>
                        <select name="rank">
                            <option value="">Select a Rank</option>
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                    <div class="col-md-1">
                        <label>stars</label>
                        <select name="star">
                            <option value="">Select Star</option>
                            <option value="n">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                    <div class="col-md-1">
                        <label>stock</label>
                        <input type="number" name="stock" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label>price</label>
                        <input type="number" step="0.01" name="price" placeholder="0.00" />
                    </div>
                    <div class="col-md-4">
                        <label>discountPrice</label>
                        <input type="number" step="0.01" name="discountPrice" placeholder="0.00" />
                    </div>
                    <div class="col-md-4">
                        <label>discount</label>
                        <select name="discount">
                            <option value="">Select Discount</option>
                            <option value="false">false</option>
                            <option value="true">true</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label>keywords</label>
                        <input type="text" name="keywords" />
                    </div>
                    <div class="col-md-12">
                        <label>material</label>
                        <input type="text" name="material" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label>image_url</label>
                        <input type="text" name="image" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label>spec_1_name</label>
                        <input name="spec_1_name" />
                        <div class="break"></div>
                        <label>spec 1</label>
                        <input name="spec_1" />
                    </div>
                    <div class="col-md-3">
                        <label>spec_2_name</label>
                        <input name="spec_2_name" />
                        <div class="break"></div>
                        <label>spec 2</label>
                        <input name="spec_2" />
                    </div>
                    <div class="col-md-3">
                        <label>spec_3_name</label>
                        <input name="spec_3_name" />
                        <div class="break"></div>
                        <label>spec 3</label>
                        <input name="spec_3" />
                    </div>
                    <div class="col-md-3">
                        <label>spec_4_name</label>
                        <input name="spec_4_name" />
                        <div class="break"></div>
                        <label>spec 4</label>
                        <input name="spec_4" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label>name</label>
                        <input name="name" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label>description</label>
                        <textarea name="description"></textarea>
                    </div>
                </div>
                <div class="small-break"></div>
                <div class="row">
                    <div class="col-md-8"></div>
                    <div class="col-md-4">
                        <input type="submit" name="submit" value="add product" />
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

@include('includes/footer')

