@extends('layout.form')

@php
$currentSection = 'crm';
$currentRoute = 'bookkeeper.people.index';
@endphp

@section('header_content')
    @include('partials.header', [
        'headerTitle' => $pageTitle,
        'headerHint' => link_to_route('bookkeeper.people.index', uppercase(trans('people.title')))
    ])
@endsection

@section('form_buttons')
    {!! submit_button('icon-user-create') !!}
@endsection

@section('content')
    @include('partials.form')
@endsection