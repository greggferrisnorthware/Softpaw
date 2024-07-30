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
                    <li><a class="red-button" href="/delete-affiliate/{{ $url[4] }}">delete</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12" style="padding:0px;">
            <h1>Update Product</h1>
            @foreach($affiliates as $affiliate)
                @if($affiliate->id == $url[4])
                    <form class="add-post" action="{{ route('update-affiliate', $url[4]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                    <div class="col-md-6">
                        <label>Category</label>
                        <small>(Missing a category, <a href="{{ route('add-categories') }}">{{ __('Add Category') }}</a>)</small>
                        <select name="category_id" required>
                            <option value="@php echo !empty($affiliate->category->id) ? $affiliate->category->id : ''; @endphp">@php echo $affiliate->category->category; @endphp</option>
                            @foreach($categories as $category)
                                @if($category->id != $affiliate->category->id)
                                    <option value="@php echo !empty($category->id) ? $category->id : ''; @endphp">@php echo !empty($category->category) ? $category->category : ''; @endphp</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label>Pet</label>
                        <select name="pet_id" required>
                            <option value="@php echo !empty($affiliate->pet->id) ? $affiliate->pet->id : ''; @endphp">@php echo $affiliate->pet->pet; @endphp</option>
                            @foreach($pets as $pet)
                                @if($pet->id != $affiliate->pet->id)
                                    <option value="@php echo !empty($pet->id) ? $pet->id : ''; @endphp">@php echo !empty($pet->pet) ? $pet->pet : ''; @endphp</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="tiny-break"></div>

                <div class="row">
                    <div class="col-md-6">
                        <label>Affiliate</label>
                        <select name="affiliate_look_up_id" required>
                            <option value="@php echo !empty($affiliate->affiliate_look_up->id) ? $affiliate->affiliate_look_up->id : ''; @endphp">@php echo $affiliate->affiliate_look_up->affiliate_look_up; @endphp</option>
                            @foreach($affiliates_look_ups as $affiliate_look_up)
                                @if($affiliate_look_up->id != $affiliate->affiliate_look_up->id)
                                    <option value="@php echo !empty($affiliate_look_up->id) ? $affiliate_look_up->id : ''; @endphp">@php echo !empty($affiliate_look_up->affiliate_look_up) ? $affiliate_look_up->affiliate_look_up : ''; @endphp</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label>Brand</label>
                        <small>(Missing a brand, <a href="/add-brands/{{ $affiliate->id }}">{{ __('Add Brand') }}</a>)</small>
                        <select name="brand_id" class="selectpicker" data-live-search="true" required>
                            <option value="@php echo !empty($affiliate->brand->id) ? $affiliate->brand->id : ''; @endphp">@php echo $affiliate->brand->brand; @endphp</option>
                            @foreach($brands as $brand)
                                @if($brand->id != $affiliate->brand->id)
                                    <option value="@php echo !empty($brand->id) ? $brand->id : ''; @endphp">@php echo !empty($brand->brand) ? $brand->brand : ''; @endphp</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="tiny-break"></div>
                
                <div class="row">
                    <div class="col-md-4">
                        <label>Sold By</label>
                        <select name="sold_by_id" required>
                            <option value="@php echo !empty($affiliate->sold_by->id) ? $affiliate->sold_by->id : ''; @endphp">@php echo $affiliate->sold_by->sold_by; @endphp</option>
                            @foreach($sold_bies as $sold_by)
                                @if($sold_by->id != $affiliate->sold_by->id)
                                    <option value="@php echo !empty($sold_by->id) ? $sold_by->id : ''; @endphp">@php echo !empty($sold_by->sold_by) ? $sold_by->sold_by : ''; @endphp</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label>Delivery</label>
                        <select name="delivery_id" required>
                            <option value="@php echo !empty($affiliate->delivery->id) ? $affiliate->delivery->id : ''; @endphp">@php echo $affiliate->delivery->delivery; @endphp</option>
                            @foreach($deliveries as $delivery)
                                @if($delivery->id != $affiliate->delivery->id)
                                    <option value="@php echo !empty($delivery->id) ? $delivery->id : ''; @endphp">@php echo !empty($delivery->delivery) ? $delivery->delivery : ''; @endphp</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label>Status</label>
                        <select name="status_id" required>
                            <option value="@php echo !empty($affiliate->status->id) ? $affiliate->status->id : ''; @endphp">@php echo $affiliate->status->status; @endphp</option>
                            @foreach($statuses as $status)
                                @if($status->id != $affiliate->status->id)
                                    <option value="@php echo !empty($status->id) ? $status->id : ''; @endphp">@php echo !empty($status->status) ? $status->status : ''; @endphp</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-9">
                        <label>link</label>
                        <input type="text" name="link" value="@php echo !empty($affiliate->link) ? $affiliate->link : ''; @endphp" />
                    </div>
                    <div class="col-md-1">
                        <label>rank</label>
                        <select name="rank" class="fix-dropper-rank">
                            <option value="@php echo !empty($affiliate->rank) ? $affiliate->rank : ''; @endphp">@php echo $affiliate->rank; @endphp</option>
                            @if($affiliate->rank != 0)
                                <option value="0">0</option>
                            @endif
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                    <div class="col-md-1">
                        <label>stars</label>
                        <select name="star" class="fix-dropper-star">
                            <option value="@php echo !empty($affiliate->star) ? $affiliate->star : ''; @endphp">@php echo $affiliate->star; @endphp</option>
                            @if($affiliate->star != 0)
                                <option value="n">0</option>
                            @endif
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                    <div class="col-md-1">
                        <label>stock</label>
                        <input type="number" name="stock" value="@php echo !empty($affiliate->stock) ? $affiliate->stock : ''; @endphp" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label>price</label>
                        <input type="number" step="0.01" name="price" value="@php echo !empty($affiliate->price) ? $affiliate->price : ''; @endphp" />
                        <input type="hidden" name="id" value="@php echo $affiliate->id; @endphp" />
                    </div>
                    <div class="col-md-4">
                        <label>discountPrice</label>
                        <input type="number" step="0.01" name="discountPrice" value="@php echo !empty($affiliate->discountPrice) ? $affiliate->discountPrice : ''; @endphp" />
                    </div>
                    <div class="col-md-4">
                        <label>discount</label>
                        <select name="discount" class="fix-dropper">
                            <option value="@php echo !empty($affiliate->discount) ? $affiliate->discount : ''; @endphp">@php echo !empty($affiliate->discount) ? $affiliate->discount : ''; @endphp</option>
                            <option value="false">false</option>
                            <option value="true">true</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label>keywords</label>
                        <input type="text" name="keywords" value="@php echo !empty($affiliate->keywords) ? $affiliate->keywords : ''; @endphp" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label>material</label>
                        <input type="text" name="material" value="@php echo !empty($affiliate->material) ? $affiliate->material : ''; @endphp" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label>image_url</label>
                        <input type="text" name="image" value="@php echo !empty($affiliate->image) ? $affiliate->image : ''; @endphp" />
                    </div>
                </div>
                <div class="row">
                     <div class="col-md-3">
                        <label>spec_1_name</label>
                        <input name="spec_1_name" value="@php echo !empty($affiliate->spec_1_name) ? $affiliate->spec_1_name : ''; @endphp"/>
                        <div class="break"></div>
                        <label>spec 1</label>
                        <input name="spec_1" value="@php echo !empty($affiliate->spec_1) ? $affiliate->spec_1 : ''; @endphp"/>
                    </div>
                    <div class="col-md-3">
                        <label>spec_2_name</label>
                        <input name="spec_2_name" value="@php echo !empty($affiliate->spec_2_name) ? $affiliate->spec_2_name : ''; @endphp"/>
                        <div class="break"></div>
                        <label>spec 2</label>
                        <input name="spec_2" value="@php echo !empty($affiliate->spec_2) ? $affiliate->spec_2 : ''; @endphp"/>
                    </div>
                    <div class="col-md-3">
                        <label>spec_3_name</label>
                        <input name="spec_3_name" value="@php echo !empty($affiliate->spec_3_name) ? $affiliate->spec_3_name : ''; @endphp"/>
                        <div class="break"></div>
                        <label>spec 3</label>
                        <input name="spec_3" value="@php echo !empty($affiliate->spec_3) ? $affiliate->spec_3 : ''; @endphp"/>
                    </div>
                    <div class="col-md-3">
                        <label>spec_4_name</label>
                        <input name="spec_4_name" value="@php echo !empty($affiliate->spec_4_name) ? $affiliate->spec_4_name : ''; @endphp"/>
                        <div class="break"></div>
                        <label>spec 4</label>
                        <input name="spec_4" value="@php echo !empty($affiliate->spec_4) ? $affiliate->spec_4 : ''; @endphp"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label>name</label>
                        <input name="name" value="@php echo !empty($affiliate->name) ? $affiliate->name : ''; @endphp"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label>description</label>
                        <textarea name="description">@php echo !empty($affiliate->description) ? $affiliate->description : ''; @endphp</textarea>
                    </div>
                </div>
                <div class="small-break"></div>
                <div class="row">
                    <div class="col-md-8"></div>
                    <div class="col-md-4">
                        <input type="submit" name="submit" value="update product" />
                    </div>
                </div>
            </form>
            @endif
            @endforeach
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

