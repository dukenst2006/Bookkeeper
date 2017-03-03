@foreach($people as $person)
    <tr class="content-list__row--body">

        {!! content_list_thumbnail($person->getKey()) !!}

        <td class="content-list__cell">
            {!! link_to_route('bookkeeper.people.edit', $person->presentFullName(), $person->getKey()) !!}
        </td>
        <td class="content-list__cell content-list__cell--secondary">
            {{ $person->company }}
        </td>
        <td class="content-list__cell content-list__cell--secondary">
            {{ $person->created_at->formatLocalized('%b %e, %Y') }}
        </td>

        {!! content_options('people', $person->getKey()) !!}

    </tr>
@endforeach