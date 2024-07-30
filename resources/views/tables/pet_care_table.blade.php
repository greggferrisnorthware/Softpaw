{{-- @php $search_affiliates_head = $url[5] . '_tables_heads'; @endphp --}}
{{-- @php $search_affiliates_body = $url[5] . '_tables_bodies'; @endphp --}}
{{-- @php $search_affiliates = $url[5] . '_tables_columns'; @endphp  --}}

@php
    $url = url()->current();
    $url = explode('/', str_replace('%20', ' ', $url));
    $count = 1;
@endphp

<span class="awesome-table">{{ $url[4] }} Health</span>
<table class="pet-care">
    <tbody>
        @foreach($pet_cares as $pet_care) 
            @if($pet_care->pet->pet == $url[4] && $pet_care->category->category == 'health')
            @if($count < 4)
            <tr>
                <td>
                    @if($pet_care->status->status != 'none')
                        <span class="status-{{ $pet_care->status->status }}">{{ $pet_care->status->status }}</span>
                    @endif
                    <a class="remove-styles" rel="sponsored" href="{{ ucwords($pet_care->link) }}" target="_blank">
                        <img src="{{ $pet_care->image }}" alt="{{ $pet_care->name }}" title="{{ $pet_care->name }}" />
                    </a>
                </td>
                <td>
                    {{-- <small>Name:</small>
                    <div class="break"></div> --}}
                    <strong>{{ ucwords($pet_care->name) }}</strong>
                </td>
                <td>
                    {{-- <small>Description:</small>
                    <div class="break"></div> --}}
                    @if(!empty($pet_care->description) && $pet_care->description != 'n/a')
                        <p><em>{{ $pet_care->description }}</em></p>
                        <div class="tiny-break"></div>
                    @endif
                    <span><small class="animal">{{ ucwords($pet_care->pet->pet) }}</small> <small class="cat">{{ ucwords($pet_care->category->category) }}</small> <small class="brand">{{ ucwords($pet_care->brand->brand) }}</small></span>
                    <span class="delivery">{{ $pet_care->delivery->delivery }}</span>
                </td>
                <td>
                    {{-- <small>Price:</small> --}}
                    <strong>${{ ucwords($pet_care->price) }}</strong>
                </td>
                <td>
                    <a rel="sponsored" href="{{ ucwords($pet_care->link) }}" target="_blank">Get Product</a>
                    @auth
                        <br />
                        <a class="update-button" href="/update-affiliate/{{ $pet_care->id }}">update</a>
                    @endauth
                </td>
            </tr>
            @php $count++; @endphp
            @endif
            @endif
        @endforeach
    </tbody>
</table>