@foreach($transactions as $transaction)
    <tr class="content-list__row--body">

        {!! content_list_thumbnail($transaction->getKey(), $transaction->presentThumbnail()) !!}

        <td class="content-list__cell">
            {!! link_to_route('bookkeeper.transactions.edit', $transaction->name, $transaction->getKey()) !!}
        </td>
        <td class="content-list__cell content-list__cell--secondary">
            {{ $transaction->presentAmount() }}
        </td>
        <td class="content-list__cell content-list__cell--secondary">
            {{ $transaction->created_at->formatLocalized('%b %e, %Y') }}
        </td>

        {!! content_options('transactions', $transaction->getKey()) !!}

    </tr>
@endforeach