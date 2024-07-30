{{-- @php $search_affiliates_head = $url[5] . '_tables_heads'; @endphp --}}
{{-- @php $search_affiliates_body = $url[5] . '_tables_bodies'; @endphp --}}
{{-- @php $search_affiliates = $url[5] . '_tables_columns'; @endphp  --}}

@php
    $url = url()->current();
    $url = explode('/', str_replace('%20', ' ', $url));
@endphp

<span class="awesome"><?php echo $url[4]; ?>s also searched for these <?php echo $url[5]; ?>s</span>
<table>
    <thead>
        <tr>
            <td>name</td>
            <td>image</td>
            <td>star</td>
            <td>description</td>
            <td>category</td>
            <td>price</td>
            <td>pet</td>
            <td>brand</td>
            <td>link</td>
        </tr>
    </thead>
    <tbody>
        @foreach($search_affiliates as $search_affiliate)   
            @if(str_replace(' ', '-', strtolower($search_affiliate->brand->brand)) == $url[6] && str_replace(' ', '-', strtolower($search_affiliate->category->category)) == $url[5])
                <tr>      
                    <td>{{ ucwords($search_affiliate->name) }}</td>
                    <td><img src="{{ $search_affiliate->image }}" title="{{ $search_affiliate->pet->pet }}" alt="{{ $search_affiliate->pet->pet }}" /></td>
                    <td>{{ $search_affiliate->star }}</td>
                    <td>{{ $search_affiliate->description }}</td>
                    <td>{{ ucwords($search_affiliate->category->category) }}</td>
                    <td>{{ $search_affiliate->price }}</td>
                    <td>{{ $search_affiliate->pet->pet }}</td>
                    <td>{{ ucwords($search_affiliate->brand->brand) }}</td>
                    <td><a rel="sponsored" href="{{ $search_affiliate->link }}" target="_blank">Get Product</a></td>
                </tr>
            @endif
        @endforeach
    </tbody>
</table>