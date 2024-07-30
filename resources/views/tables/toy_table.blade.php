{{-- @php $search_affiliates_head = $url[5] . '_tables_heads'; @endphp --}}
{{-- @php $search_affiliates_body = $url[5] . '_tables_bodies'; @endphp --}}
{{-- @php $search_affiliates = $url[5] . '_tables_columns'; @endphp  --}}

@php
    $url = url()->current();
    $url = explode('/', str_replace('%20', ' ', $url));
@endphp

<span class="awesome-table">{{ $url[4] }} Toys</span>
<table class="pet-care">
    <tbody>
        @foreach($toys as $toy) 
            @if($toy->pet->pet == $url[4] && $toy->category->category != $url[5])
            <tr>
                <td>
                    @if($toy->status->status != 'none')
                        <span class="status-{{ $toy->status->status }}">{{ $toy->status->status }}</span>
                    @endif
                    <a class="remove-styles" rel="sponsored" href="{{ ucwords($toy->link) }}" target="_blank">
                        <img src="{{ $toy->image }}" alt="{{ $toy->name }}" title="{{ $toy->name }}" />
                    </a>
                </td>
                <td>
                    {{-- <small>Name:</small>
                    <div class="break"></div> --}}
                    <strong>{{ ucwords($toy->name) }}</strong>
                </td>
                <td>
                    {{-- <small>Description:</small>
                    <div class="break"></div> --}}
                    @if(!empty($toy->description) && $toy->description != 'n/a')
                        <p><em>{{ $toy->description }}</em></p>
                        <div class="tiny-break"></div>
                    @endif
                    <span><small class="animal">{{ ucwords($toy->pet->pet) }}</small> <small class="cat">{{ ucwords($toy->category->category) }}</small> <small class="brand">{{ ucwords($toy->brand->brand) }}</small></span>
                    <span class="delivery">{{ $toy->delivery->delivery }}</span>
                </td>
                <td>
                    {{-- <small>Price:</small> --}}
                    <strong>${{ ucwords($toy->price) }}</strong>
                </td>
                <td>
                    <a rel="sponsored" href="{{ ucwords($toy->link) }}" target="_blank">Get Product</a>
                    @auth
                        <br />
                        <a class="update-button" href="/update-affiliate/{{ $toy->id }}">update</a>
                    @endauth
                </td>
            </tr>
            @endif
        @endforeach
    </tbody>
</table>