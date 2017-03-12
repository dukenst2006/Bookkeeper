@section('content_sortable_links')
    <th class="content-list__cell content-list__cell--head">
        {!! sortable_link('name', uppercase(trans('validation.attributes.name'))) !!}
    </th>
    <th class="content-list__cell content-list__cell--head content-list__cell--secondary">
        {!! sortable_link('amount', uppercase(trans('validation.attributes.amount'))) !!}
    </th>
    <th class="content-list__cell content-list__cell--head content-list__cell--secondary">
        {!! sortable_link('created_at', uppercase(trans('validation.attributes.date'))) !!}
    </th>
@endsection

@section('content_list')
    @if($transactions->count())
        @include('transactions.list')
    @else
        {!! no_results_row('transactions.no_transactions') !!}
    @endif
@endsection

@section('content_footer')
    @include('partials.pagination', ['paginator' => $transactions])
@endsection

@include('transactions.create')