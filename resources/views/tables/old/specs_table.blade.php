{{-- @php $search_affiliates_head = $url[5] . '_tables_heads'; @endphp --}}
{{-- @php $search_affiliates_body = $url[5] . '_tables_bodies'; @endphp --}}
{{-- @php $search_affiliates = $url[5] . '_tables_columns'; @endphp  --}}

@php
    $url = url()->current();
    $url = explode('/', str_replace('%20', ' ', $url));
@endphp

<span class="awesome">Related {{ $url[4] }} {{ $url[5] }} Specs</span>
<table class="specs">
    {{-- <thead>
        <tr>
            @foreach($search_affiliates as $affiliate) 
                @if($affiliate->pet->pet == $url[4] && $affiliate->category->category == $url[5])
                    <td>Name</td>
                    <td>Brand</td>
                    <td>{{ ucwords($affiliate->spec_1_name) }}</td>
                    <td>{{ ucwords($affiliate->spec_2_name) }}</td>
                    <td>{{ ucwords($affiliate->spec_3_name) }}</td>
                    <td>{{ ucwords($affiliate->spec_4_name) }}</td>
                    <td>Link</td>
                    @php break; @endphp
                @endif
            @endforeach
        </tr>
    </thead> --}}
    <tbody>
        {{-- @php --}}
        {{-- print_r($affiliates[0]->specs);
        $affiliated = explode(', ', $search_affiliates[0]->specs);
        print_r($affiliated); --}}
        {{-- @endphp --}}
        @foreach($featured_affiliates as $affiliate) 
            @if($affiliate->pet->pet == $url[4] && $affiliate->category->category == $url[5])
            <tr>      
                {{-- <td><img src="{{ $affiliate->image }}" alt="{{ $affiliate->name }}" title="{{ $affiliate->name }}" /></td> --}}
                {{-- <td>
                    <img src="{{ $affiliate->image }}" alt="{{ $affiliate->name }}" title="{{ $affiliate->name }}" />
                </td> --}}
                <td>
                    <strong>{{ ucwords($affiliate->rank) }}</strong>
                </td>
                <td>
                    <small>Name:</small>
                    <div class="break"></div>
                    <strong>{{ ucwords($affiliate->name) }}</strong>
                </td>
                <td>
                    <small>{{ ucwords($affiliate->spec_1_name) }}:</small>
                    <div class="break"></div>
                    <strong>{{ ucwords($affiliate->spec_1) }}</strong>
                </td>
                <td>
                    <small>{{ ucwords($affiliate->spec_2_name) }}:</small>
                    <div class="break"></div>
                    <strong>{{ ucwords($affiliate->spec_2) }}</strong>
                </td>
                <td>
                    <small>{{ ucwords($affiliate->spec_3_name) }}:</small>
                    <div class="break"></div>
                    <strong>{{ ucwords($affiliate->spec_3) }}</strong>
                </td>
                <td>
                    <small>{{ ucwords($affiliate->spec_4_name) }}:</small>
                    <div class="break"></div>
                    <strong>{{ ucwords($affiliate->spec_4) }}</strong>
                </td>
                <td><a rel="sponsored" href="{{ ucwords($affiliate->link) }}" target="_blank">Link</a></td>
            </tr>
            @endif
        @endforeach
    </tbody>
</table>