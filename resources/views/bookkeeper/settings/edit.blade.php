@extends('layout.bookkeeper')

@php
    $currentSection = null;
    $currentRoute = null;
@endphp

@section('header_content')
    @include('partials.header', [
        'headerTitle' => $pageTitle
    ])
@endsection

@section('form_buttons')
    {!! submit_button('icon-wrench') !!}
@endsection

@section('content')
    @include('partials.form')
@endsection