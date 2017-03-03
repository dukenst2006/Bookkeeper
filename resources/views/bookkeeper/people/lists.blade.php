@extends('people.base_edit')

@section('content')
    @include('users.tabs', [
        'currentRoute' => 'bookkeeper.users.password',
        'currentKey' => $user->getKey()
    ])
    @parent
@endsection