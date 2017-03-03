@extends('layout.form')

@php
$currentSection = 'crm';
$currentRoute = 'bookkeeper.lists.index';
@endphp

@section('header_content')
    @include('partials.header', [
        'headerTitle' => $list->name,
        'headerHint' => link_to_route('bookkeeper.lists.index', uppercase(trans('lists.title')))
    ])
@endsection

@section('content')
    @include('partials.form')
@endsection