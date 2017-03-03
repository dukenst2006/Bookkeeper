@extends('users.base_edit')

@section('form_buttons')
    {!! submit_button('icon-floppy') !!}
@endsection

@section('content')
    @include('users.tabs', [
        'currentRoute' => 'bookkeeper.users.edit',
        'currentKey' => $user->getKey()
    ])
    @parent
@endsection