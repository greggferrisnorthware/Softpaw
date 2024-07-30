<div class="adjust-container-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <span class="awesome-search">Related <?php echo $url[4]; ?> Products</span>
            </div>
        </div>
    </div>
</div>

<div class="view-all">
    <div class="sticky-search">
        <div class="container p-0">
            <div class="row">
                <div class="col-md-9 p-0">
                    {{-- <ul class="selectables">
                        @foreach($animals as $animal)
                            <li id="{{ $animal->animal }}"><input type="checkbox" name="search" value="{{ $animal->animal }}" id="search" />{{ $animal->animal }}</li>
                        @endforeach
                    </ul> --}}

                    @php
                        $url = url()->current();
                        $url = explode('/', $url);
                        // print_r($url);
                    @endphp

                    <ul class="selectables">
                        @foreach($search_pets as $search_pet)
                            @if($search_pet->pet == $url[4])
                                <li id="{{ $search_pet->pet }}" class="@php if($search_pet->pet == $url[4]) { echo 'option-selected'; } else{ } @endphp"><input type="checkbox" name="combined[]" id="{{ $search_pet->id }}" value="{{ $search_pet->id }}" />{{ ucwords(str_replace('-', ' ', $search_pet->pet)) }}</li>
                            @endif
                        @endforeach
                        @foreach($search_categories as $search_category)
                            <li id="{{ $search_category->category }}" class="@php if($search_category->category == $url[5]) { echo 'option-selected'; } else{ } @endphp"><input type="checkbox" name="combined[]" id="id-{{ $search_category->id }}" value="{{ $search_category->id }}" />{{ ucwords(str_replace('-', ' ', $search_category->category)) }}</li>
                        @endforeach
                        {{-- <li><input type="checkbox" name="all" value="all" id="all"/>All</li> --}}
                    </ul>
                </div>

                <div class="col-md-3 p-0 relative">
                    <div class="searches">
                        <input type="text" id="allCategory" class="form-control" placeholder="Search Products" name="allCategory" value="" />
                        <div id="clicked_search_category" class="form-control">Clear</div>
                    </div>
                </div>
            </div>
        </div>
        <div id="feedbackMobile"></div>
    </div>
    
    <div class="adjust-container-padding">

    <div id="feedback"></div>

    <div id="visibility">
    <div class="view-all">
        <div class="row featured justify-content-center">
                @php $count = 1; @endphp
                @foreach($affiliates as $affiliate)
                    @if($count < 6)
                    @if($affiliate->pet->pet == $url[4] && $affiliate->category->category == $url[5])
                        <div class="col-md-4 col-lg-4 col-xl-3 col-xxl-2 no-pad">
                            <a class="product" rel="sponsored" href="{{ $affiliate->link }}" target="_blank">
                                {{-- <span class="status-{{ $affiliate->status->status }}">{{ $affiliate->status->status }}</span> --}}
                                <div class="image-contain">
                                    <img src="{{ $affiliate->image }}" title="{{ ucwords($affiliate->pet->pet) }} {{ ucwords($affiliate->category->category) }}" alt="{{ ucwords($affiliate->pet->pet) }} {{ ucwords($affiliate->category->category) }}" />
                                    {{-- <span class="status">{{ $affiliate->status }}</span> --}}
                                    <span class="{{ $affiliate->brand->brand }}"></span>
                                </div>
                                <div class="product-body">             
                                    <span><small class="animal">{{ ucwords($affiliate->pet->pet) }}</small> <small class="cat">{{ ucwords($affiliate->category->category) }}</small> <small class="brand">{{ ucwords($affiliate->brand->brand) }}</small></span> 
                                    <span>@php echo substr($affiliate->name, 0, 140); @endphp ...</span>     
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
                                    {{-- <p>{{ substr($affiliate->description, 0, 60) }} ... </p> --}}
                                    <span class="delivery">{{ $affiliate->delivery->delivery }}</span>
                                    <div class="break"></div>
                                    @if($affiliate->star == 5)
                                        <img class="star-5" src="/images/star-{{ $affiliate->star }}.png"
                                        alt="star {{ $affiliate->star }}" />
                                    @else
                                        <img class="star" src="/images/star-{{ $affiliate->star }}.png"
                                        alt="star {{ $affiliate->star }}" />
                                    @endif
                                    {{-- <div class="break"></div> --}}
                                    {{-- <span>In stock: {{ $affiliate->stock }}</span> --}}
                                    {{-- <div class="tiny-break"></div> --}}
                                    <div class="pricer">
                                        {{-- <small class="discount">${{ $affiliate->discountPrice }}</small> <small class="price">${{ $affiliate->price }}</small> --}}
                                        <small class="price">${{ $affiliate->price }}</small>
                                    </div>
                                    {{-- <small>{{ $affiliate->material }}</small> --}}
                                    <span class="click-here">Get {{ ucwords($affiliate->category->category) }}</span>
                                </div>
                            </a>
                        </div>
                    @php $count++; @endphp
                    @endif
                    @endif
                @endforeach
            </div>
            </div>
        </div>
    </div>
</div>
