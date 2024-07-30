{{-- @php $search_affiliates_head = $url[5] . '_tables_heads'; @endphp --}}
{{-- @php $search_affiliates_body = $url[5] . '_tables_bodies'; @endphp --}}
{{-- @php $search_affiliates = $url[5] . '_tables_columns'; @endphp  --}}

@php
    $url = url()->current();
    $url = explode('/', str_replace('%20', ' ', $url));
@endphp

<span class="awesome-table">Catnip</span>
<table class="pet-care">
    <tbody>
        @foreach($catnips as $catnip) 
            @if($catnip->pet->pet == $url[4] && $catnip->category->category != $url[5])
            <tr>
                <td>
                    @if($catnip->status->status != 'none')
                        <span class="status-{{ $catnip->status->status }}">{{ $catnip->status->status }}</span>
                    @endif
                    <a class="remove-styles" rel="sponsored" href="{{ ucwords($catnip->link) }}" target="_blank">
                        <img src="{{ $catnip->image }}" alt="{{ $catnip->name }}" title="{{ $catnip->name }}" />
                    </a>
                </td>
                <td>
                    {{-- <small>Name:</small>
                    <div class="break"></div> --}}
                    <strong>{{ ucwords($catnip->name) }}</strong>
                </td>
                <td>
                    {{-- <small>Description:</small>
                    <div class="break"></div> --}}
                    @if(!empty($catnip->description) && $catnip->description != 'n/a')
                        <p><em>{{ $catnip->description }}</em></p>
                        <div class="tiny-break"></div>
                    @endif
                    <span><small class="animal">{{ ucwords($catnip->pet->pet) }}</small> <small class="cat">{{ ucwords($catnip->category->category) }}</small> <small class="brand">{{ ucwords($catnip->brand->brand) }}</small></span>
                    <span class="delivery">{{ $catnip->delivery->delivery }}</span>
                </td>
                <td>
                    {{-- <small>Price:</small>
                    <div class="break"></div> --}}
                    <strong>${{ ucwords($catnip->price) }}</strong>
                </td>
                <td>
                    <a rel="sponsored" href="{{ ucwords($catnip->link) }}" target="_blank">Get Product</a>
                    @auth
                        <br />
                        <a class="update-button" href="/update-affiliate/{{ $catnip->id }}">update</a>
                    @endauth
                </td>
            </tr>
            @endif
        @endforeach
    </tbody>
</table>