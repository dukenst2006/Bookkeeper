@extends('people.base_index')

@section('content_sortable_links')
    <th class="content-list__cell content-list__cell--head">
        {{ uppercase(trans('validation.attributes.name')) }}
    </th>
    <th class="content-list__cell content-list__cell--head content-list__cell--secondary">
        {{ uppercase(trans('validation.attributes.company')) }}
    </th>
    <th class="content-list__cell content-list__cell--head content-list__cell--secondary">
        {{ uppercase(trans('validation.attributes.created_at')) }}
    </th>
@endsection

@section('content_list')
    @if($people->count())
        @include('people.list')
    @else
        {!! no_results_row() !!}
    @endif
@endsection

@section('content_footer')
    {!! back_to_all_link('people') !!}
@endsection