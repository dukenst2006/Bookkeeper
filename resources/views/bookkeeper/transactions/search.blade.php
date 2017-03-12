@extends('transactions.base_index')

@section('header_content')
    @include('partials.header', [
        'headerTitle' => $pageTitle
    ])
@endsection

@section('actions')
    @parent
    <?php $filterSearch = true; ?>
@endsection

@section('content_sortable_links')
    <th class="content-list__cell content-list__cell--head">
        {{ uppercase(trans('validation.attributes.name')) }}
    </th>
    <th class="content-list__cell content-list__cell--head content-list__cell--secondary">
        {!! uppercase(trans('validation.attributes.amount')) !!}
    </th>
    <th class="content-list__cell content-list__cell--head content-list__cell--secondary">
        {{ uppercase(trans('validation.attributes.date')) }}
    </th>
@endsection

@section('content_list')
    @if($transactions->count())
        @include('transactions.list')
    @else
        {!! no_results_row() !!}
    @endif
@endsection

@section('content_footer')
    {!! back_to_all_link('transactions') !!}
@endsection