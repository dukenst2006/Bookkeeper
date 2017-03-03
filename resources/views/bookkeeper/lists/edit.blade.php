@extends('lists.base_edit')

@section('form_buttons')
    {!! submit_button('icon-floppy') !!}
@endsection

@section('content')
    @include('lists.tabs', [
        'currentRoute' => 'bookkeeper.lists.edit',
        'currentKey' => $list->getKey()
    ])

    @include('partials.form')
@endsection