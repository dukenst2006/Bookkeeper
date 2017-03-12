@extends('layout.content')

@php
$currentSection = 'finance';
$currentRoute = 'bookkeeper.transactions.index';
@endphp

@section('actions')
    @include('partials.search', ['key' => 'transactions'])

    @include('partials.filter', [
        'filterTypes' => ['all', 'income', 'expense', 'income-i', 'expense-i'],
        'defaultFilter' => 'all',
        'key' => 'transactions',
        'filterSearch' => isset($filterSearch) ? $filterSearch : false
    ])

    @include('partials.bulk', ['key' => 'transactions'])
@endsection