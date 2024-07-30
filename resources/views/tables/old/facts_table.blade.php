@php $tables_head = $url[4] . '_tables_heads'; @endphp
@php $tables_body = $url[4] . '_tables_bodies'; @endphp
@php $tables = $url[4] . '_tables_columns'; @endphp 

<span class="awesome">Popular <?php echo $url[4]; ?> Breeds of <?php echo date('Y'); ?></span>
<table>
    <thead>
        <tr>
            @foreach($$tables as $tables_tables_column)
                @if($tables_tables_column != 'category_id' && $tables_tables_column != 'id' && $tables_tables_column != 'created_at' && $tables_tables_column != 'updated_at' && $tables_tables_column != 'pet_id')
                    <td>{{ ucwords($tables_tables_column) }}</td>
                @endif
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach($$tables_body as $url_tables_body)   
            @if($url_tables_body->category->category == $url[5] && $url_tables_body->pet->pet == $url[4])
                <tr>      
                    <td><a href="#" target="_blank">{{ ucwords($url_tables_body->breed) }}</a></td>
                    <td>{{ ucwords($url_tables_body->size) }}</td>
                    <td>{{ ucwords($url_tables_body->weight) }}</td>
                    <td>{{ ucwords($url_tables_body->coat) }}</td>
                    <td>{{ ucwords($url_tables_body->color) }}</td>
                    <td>{{ ucwords($url_tables_body->temperament) }}</td>
                    <td>{{ ucwords($url_tables_body->characteristics) }}</td>
                    <td>{{ ucwords($url_tables_body->energy) }}</td>
                    <td>{{ ucwords($url_tables_body->shedding) }}</td>
                    <td>{{ ucwords($url_tables_body->health) }}</td>
                    <td>{{ ucwords($url_tables_body->food) }}</td>
                    <td>{{ ucwords($url_tables_body->history) }}</td>
                </tr>
            @endif
        @endforeach
    </tbody>
</table>