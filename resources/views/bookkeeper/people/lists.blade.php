@extends('people.base_edit')
<?php $_withForm = false; ?>

@section('content')
    @include('people.tabs', [
        'currentRoute' => 'bookkeeper.people.lists',
        'currentKey' => $person->getKey()
    ])

    <div class="content-inner content-inner--compact">
        @include('lists.sublist', ['lists' => $person->lists])

        @if($count > 0)
        @include('lists.add')
        @endif
    </div>
@endsection

@include('partials.modals.delete_specific', ['message' => trans('lists.confirm_dissociate')])