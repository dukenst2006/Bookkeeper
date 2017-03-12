@extends('accounts.base_edit')
<?php $_withForm = false; $contentsListModifier = 'content-list-container--separated'; ?>

@section('content')
    @include('accounts.tabs', [
        'currentRoute' => 'bookkeeper.accounts.transactions',
        'currentKey' => $account->getKey()
    ])

    @parent
@endsection

@include('transactions.contents', ['currentAccountId' => $account->getKey()])