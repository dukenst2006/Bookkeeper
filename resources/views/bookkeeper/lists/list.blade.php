@foreach($lists as $list)
    <tr class="content-list__row--body">

        {!! content_list_thumbnail($list->getKey()) !!}

        <td class="content-list__cell">
            {!! link_to_route('bookkeeper.lists.people', $list->name, $list->getKey()) !!}
        </td>
        <td class="content-list__cell content-list__cell--secondary">
            {{ $list->created_at->formatLocalized('%b %e, %Y') }}
        </td>

        {!! content_options('lists', $list->getKey()) !!}

    </tr>
@endforeach