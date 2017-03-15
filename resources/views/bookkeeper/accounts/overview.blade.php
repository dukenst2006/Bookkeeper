@extends('accounts.base_edit')
<?php $_withForm = false; ?>

@php
$currentSection = 'finance';
$currentRoute = 'bookkeeper.accounts.index';
@endphp

@section('content')
    @include('accounts.tabs', [
        'currentRoute' => 'bookkeeper.accounts.overview',
        'currentKey' => $account->getKey()
    ])

    @include('overview.chart')
@endsection

@include('transactions.create', ['currentAccountId' => $account->getKey()])