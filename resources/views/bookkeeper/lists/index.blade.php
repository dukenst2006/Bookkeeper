@extends('lists.base_index')

@section('header_content')
    @include('partials.header', [
        'headerTitle' => trans('lists.index')
    ])
@endsection

@section('content_sortable_links')
    <th class="content-list__cell content-list__cell--head">
        {!! sortable_link('name', uppercase(trans('validation.attributes.name'))) !!}
    </th>
    <th class="content-list__cell content-list__cell--head content-list__cell--secondary">
        {!! sortable_link('created_at', uppercase(trans('validation.attributes.created_at'))) !!}
    </th>
@endsection

@section('content_list')
    @if($lists->count())
        @include('lists.list')
    @else
        {!! no_results_row('lists.no_lists') !!}
    @endif
@endsection

@section('content_footer')
    @include('partials.pagination', ['paginator' => $lists])
@endsection