@extends('layout.' . ((isset($_withForm) && $_withForm === false) ? 'content' : 'form'))

@php
$currentSection = 'finance';
$currentRoute = 'bookkeeper.accounts.index';
@endphp

@section('header_content')
    @include('partials.header', [
        'headerTitle' => $account->name . ': ' . currency_string_for($account->getBalance(), $account),
        'headerHint' => link_to_route('bookkeeper.accounts.index', uppercase(trans('accounts.title')))
    ])
@endsection