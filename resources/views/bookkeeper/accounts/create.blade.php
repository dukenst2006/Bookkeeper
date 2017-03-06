@extends('layout.form')

@php
$currentSection = 'finance';
$currentRoute = 'bookkeeper.accounts.index';
@endphp

@section('header_content')
    @include('partials.header', [
        'headerTitle' => $pageTitle,
        'headerHint' => link_to_route('bookkeeper.accounts.index', uppercase(trans('accounts.title')))
    ])
@endsection

@section('form_buttons')
    {!! submit_button('icon-list-add') !!}
@endsection

@section('content')
    @include('partials.form')
@endsection