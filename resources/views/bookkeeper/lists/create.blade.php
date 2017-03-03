@extends('layout.form')

@php
$currentSection = 'crm';
$currentRoute = 'bookkeeper.lists.index';
@endphp

@section('header_content')
    @include('partials.header', [
        'headerTitle' => trans('lists.create'),
        'headerHint' => link_to_route('bookkeeper.lists.index', uppercase(trans('lists.title')))
    ])
@endsection

@section('pageSubtitle')
    {!! link_to_route('bookkeeper.lists.index', uppercase(trans('lists.title'))) !!}
@endsection

@section('form_buttons')
    {!! submit_button('icon-list-add') !!}
@endsection

@section('content')
    @include('partials.form')
@endsection