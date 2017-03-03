@extends('users.base_edit')

@section('form_buttons')
    {!! submit_button('icon-lock') !!}
@endsection

@section('content')
    @include('users.tabs', [
        'currentRoute' => 'bookkeeper.users.password',
        'currentKey' => $user->getKey()
    ])
    @parent
@endsection