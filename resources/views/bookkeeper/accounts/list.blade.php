@foreach($accounts as $account)
    <tr class="content-list__row--body">

        {!! content_list_thumbnail($account->getKey()) !!}

        <td class="content-list__cell">
            {!! link_to_route('bookkeeper.accounts.overview', $account->name, $account->getKey()) !!}
        </td>
        <td class="content-list__cell">
            {{ currency_string_for($account->getBalance(), $account->getKey()) }}
        </td>
        <td class="content-list__cell content-list__cell--secondary">
            {{ $account->currency }}
        </td>
        <td class="content-list__cell content-list__cell--secondary">
            {{ $account->created_at->formatLocalized('%b %e, %Y') }}
        </td>

        {!! content_options('accounts', $account->getKey()) !!}

    </tr>
@endforeach