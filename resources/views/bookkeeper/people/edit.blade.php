@extends('people.base_edit')

@section('form_buttons')
    {!! submit_button('icon-floppy') !!}
@endsection

@section('content')
    @include('people.tabs', [
        'currentRoute' => 'bookkeeper.people.edit',
        'currentKey' => $person->getKey()
    ])
    @parent
@endsection