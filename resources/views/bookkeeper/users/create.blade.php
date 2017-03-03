@extends('layout.form')

@php
    $currentSection = null;
    $currentRoute = null;
@endphp

@section('header_content')
    @include('partials.header', [
        'headerTitle' => trans('users.create'),
        'headerHint' => link_to_route('bookkeeper.users.index', uppercase(trans('users.title')))
    ])
@endsection

@section('pageSubtitle')
    {!! link_to_route('bookkeeper.users.index', uppercase(trans('users.title'))) !!}
@endsection

@section('form_buttons')
    {!! submit_button('icon-user-create') !!}
@endsection

@section('content')
    @include('partials.form')
@endsection