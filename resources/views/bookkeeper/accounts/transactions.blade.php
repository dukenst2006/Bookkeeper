@extends('accounts.base_edit')
<?php $_withForm = false; ?>

@section('content')
    @include('accounts.tabs', [
        'currentRoute' => 'bookkeeper.accounts.transactions',
        'currentKey' => $tag->getKey()
    ])

    OVERVIEW AND TRANSACTIONS
@endsection