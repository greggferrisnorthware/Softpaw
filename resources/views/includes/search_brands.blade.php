<span class="awesome">Your Pets Favorite Brands</span>
<div class="tiny-break"></div>
<div class="tiny-break"></div>
<div class="view-all">
    <div class="sticky-search">
        <div class="container p-0">
            <div class="row">
                <div class="col-md-9 p-0">  
                </div>
                <div class="col-md-3 p-0 relative">
                    <div class="searches">
                        <input type="text" id="allBrand" class="form-control" placeholder="Search Brands" name="allBrand" value="" />
                        <div id="clicked_search" class="form-control">Clear</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="feedback"></div>

    <div id="visibility">
        <div class="container">
            <div class="row justify-content-center">
                @foreach($affiliates as $affiliate)
                    {{-- @if($affiliate->pet->pet == $url[4] && $affiliate->category->category == $url[5]) --}}
                        <div class="col-md-4 col-lg-4 col-xl-3 col-xxl-2 no-pad">
                            <a class="product" rel="sponsored" href="{{ $affiliate->link }}" target="_blank">
                                {{-- <span class="status">{{ $affiliate->status }}</span> --}}
                                <div class="image-contain">
                                    <img src="{{ $affiliate->brand }}" title="{{ ucwords($affiliate->brand) }}" alt="{{ ucwords($affiliate->brand) }}" />
                                    <span class="{{ $affiliate->brand }}">{{ $affiliate->brand }}</span>
                                </div>
                            </a>
                        </div>
                    {{-- @endif --}}
                @endforeach
            </div>
        </div>
    </div>
</div>
