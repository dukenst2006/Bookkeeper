@extends('layout.bookkeeper')

@php
$currentSection = 'finance';
$currentRoute = 'bookkeeper.overview';
@endphp

@section('header_content')
    @include('partials.header', [
        'headerTitle' => trans('general.hello') . ', ' . $currentUser->first_name . '!',
        'headerHint' => trans('general.overview_hint')
    ])
@endsection

@section('content')
    @include('overview.chart')
@endsection

@include('transactions.create')