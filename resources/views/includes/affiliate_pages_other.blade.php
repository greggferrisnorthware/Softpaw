<div class="tiny-break"></div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <span class="awesome">Softpaws Top Picks</span>
        </div>
    </div>

    <div class="small-break"></div>

    <div class="row featured justify-content-center">
        @php $count = 1; @endphp
        @foreach($featured_affiliates as $featured_affiliate)
            @if($count < 5)
                <div class="col-md-4 col-lg-4 col-xl-3 col-xxl-2">
                    <a class="product" rel="sponsored" href="{{ $featured_affiliate->link }}" target="_blank">
                        {{-- <span class="rank">{{ $featured_affiliate->rank }}</span> --}}
                        {{-- <span class="status">{{ $featured_affiliate->status }}</span> --}}
                        <div class="image-contain">
                            <img src="{{ $featured_affiliate->image }}" title="{{ ucwords($featured_affiliate->pet->pet) }} {{ ucwords($featured_affiliate->category->category) }}" alt="{{ ucwords($featured_affiliate->pet->pet) }} {{ ucwords($featured_affiliate->category->category) }}" />
                            {{-- <span class="status">{{ $featured_affiliate->status }}</span> --}}
                            <span class="{{ $featured_affiliate->brand->brand }}"></span>
                        </div>
                        <div class="product-body">     
                            <span><small class="animal">{{ ucwords($featured_affiliate->pet->pet) }}</small> <small class="cat">{{ ucwords($featured_affiliate->category->category) }}</small> <small class="brand">{{ ucwords($featured_affiliate->brand->brand) }}</small></span>      
                            <span>@php substr($featured_affiliate->name, 0, 140); @endphp ...</span>
                            {{-- <p>{{ substr($featured_affiliate->description, 0, 60) }} ... </p> --}}
                            <ul class="affiliated-specs">
                                <li class="spec-adjust">{{ $featured_affiliate->spec_1_name }}:</li>
                                <li class="spec-adjust-span">{{ $featured_affiliate->spec_1 }}</li>
                                <li class="spec-adjust">{{ $featured_affiliate->spec_2_name }}:</li>
                                <li class="spec-adjust-span">{{ $featured_affiliate->spec_2 }}</li>
                                <li class="spec-adjust">{{ $featured_affiliate->spec_3_name }}:</li>
                                <li class="spec-adjust-span">{{ $featured_affiliate->spec_3 }}</li>
                                <li class="spec-adjust">{{ $featured_affiliate->spec_4_name }}:</li>
                                <li class="spec-adjust-span">{{ $featured_affiliate->spec_4 }}</li>
                            </ul>
                                <span class="delivery">{{ $featured_affiliate->delivery->delivery }}</span>
                                <div class="break"></div>
                            @if($featured_affiliate->star == 5)
                                <img class="star-5" src="/images/star-{{ $featured_affiliate->star }}.png"
                                alt="star {{ $featured_affiliate->star }}" />
                            @else
                                <img class="star" src="/images/star-{{ $featured_affiliate->star }}.png"
                                alt="star {{ $featured_affiliate->star }}" />
                            @endif
                            {{-- <div class="break"></div>
                            <span>In stock: {{ $featured_affiliate->stock }}</span> --}}
                            {{-- <div class="tiny-break"></div> --}}
                            <div class="pricer">
                                {{-- <small class="discount">${{ $featured_affiliate->discountPrice }}</small> <small class="price">${{ $featured_affiliate->price }}</small> --}}
                                <small class="price">${{ $featured_affiliate->price }}</small>
                            </div>
                            <span class="click-here">Get {{ ucwords($featured_affiliate->category->category) }}</span>
                        </div>
                    </a>
                </div>
            @php $count++; @endphp
            @endif
        @endforeach
    </div>
</div>

