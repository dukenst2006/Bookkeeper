@extends('lists.base_edit')
<?php $_withForm = false; $contentsListModifier = 'content-list-container--separated'; ?>

@section('content')
    @include('lists.tabs', [
        'currentRoute' => 'bookkeeper.lists.people',
        'currentKey' => $list->getKey()
    ])

    @parent
@endsection

@section('content_sortable_links')
    <th class="content-list__cell content-list__cell--head">
        {!! sortable_link('name', uppercase(trans('validation.attributes.name'))) !!}
    </th>
    <th class="content-list__cell content-list__cell--head content-list__cell--secondary">
        {{ uppercase(trans('validation.attributes.company')) }}
    </th>
    <th class="content-list__cell content-list__cell--head content-list__cell--secondary">
        {!! sortable_link('created_at', uppercase(trans('validation.attributes.created_at'))) !!}
    </th>
@endsection

@section('content_list')
    @if($people->count())
        @include('people.list')
    @else
        {!! no_results_row('people.no_people') !!}
    @endif
@endsection

@section('content_footer')
    @include('partials.pagination', ['paginator' => $people])
@endsection
