@extends('layout.form')

@php
$currentSection = 'finance';
$currentRoute = 'bookkeeper.tags.index';
@endphp

@section('header_content')
    @include('partials.header', [
        'headerTitle' => $pageTitle,
        'headerHint' => link_to_route('bookkeeper.tags.index', uppercase(trans('tags.title')))
    ])
@endsection

@section('form_buttons')
    {!! submit_button('icon-tag-create') !!}
@endsection

@section('content')
    @include('partials.form')
@endsection