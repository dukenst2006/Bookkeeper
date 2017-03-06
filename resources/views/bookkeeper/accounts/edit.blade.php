@extends('accounts.base_edit')

@section('form_buttons')
    {!! submit_button('icon-floppy') !!}
@endsection

@section('content')
    @include('accounts.tabs', [
        'currentRoute' => 'bookkeeper.accounts.edit',
        'currentKey' => $account->getKey()
    ])

    @include('partials.form')
@endsection