@extends('people.base_edit')

@section('content')
    @include('users.tabs', [
        'currentRoute' => 'bookkeeper.people.lists',
        'currentKey' => $person->getKey()
    ])
    @parent
@endsection