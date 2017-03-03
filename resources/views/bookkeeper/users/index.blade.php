@extends('users.base_index')

@section('header_content')
    @include('partials.header', [
        'headerTitle' => trans('users.index')
    ])
@endsection

@section('content_sortable_links')
    <th class="content-list__cell content-list__cell--head">
        {!! sortable_link('first_name', uppercase(trans('validation.attributes.name'))) !!}
    </th>
    <th class="content-list__cell content-list__cell--head content-list__cell--secondary">
        {!! sortable_link('email', uppercase(trans('validation.attributes.email'))) !!}
    </th>
    <th class="content-list__cell content-list__cell--head content-list__cell--secondary">
        {!! sortable_link('created_at', uppercase(trans('validation.attributes.created_at'))) !!}
    </th>
@endsection

@section('content_list')
    @include('users.list')
@endsection

@section('content_footer')
    @include('partials.pagination', ['paginator' => $users])
@endsection