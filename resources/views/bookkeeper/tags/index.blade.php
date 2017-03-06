@extends('tags.base_index')

@section('content')
    <div class="tags-list-container">
        <div class="sortable-links">
            {!! sortable_link('name', uppercase(trans('validation.attributes.name'))) !!} {!! sortable_link('created_at', uppercase(trans('validation.attributes.created_at'))) !!}
        </div>

        @include('tags.list')
    </div>

    <div class="content-footer">
        @include('partials.pagination', ['paginator' => $tags, 'paginationModifier' => 'pagination--inpage'])
    </div>
@endsection