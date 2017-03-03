{!! content_table_open(true) !!}
<th class="content-list__cell content-list__cell--head">
    {{ uppercase(trans('lists.self')) }}
</th>
{!! content_table_middle() !!}

@if($lists->count())
    @foreach ($lists as $list)
        <tr class="content-list__row--body">

            <td class="content-list__cell">
                {!! link_to_route('bookkeeper.lists.edit', $list->name, $list->getKey()) !!}
            </td>

            {!! content_options_open() !!}
            <li class="dropdown-sub__item dropdown-sub__item--delete">
                {!! delete_form(
                    route('bookkeeper.people.lists.dissociate', $person->getKey()),
                    trans('lists.dissociate'),
                    '<input type="hidden" name="list" value="' . $list->getKey() . '">',
                    true
                ) !!}
            </li>
            {!! content_options_close() !!}

        </tr>
    @endforeach
@else
    {!! no_results_row('lists.no_lists') !!}
@endif

{!! content_table_close(true) !!}