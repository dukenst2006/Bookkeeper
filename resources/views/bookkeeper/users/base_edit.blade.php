@extends('layout.form')

@php
$currentSection = null;
$currentRoute = null;
@endphp

@section('header_content')
    @include('partials.header', [
        'headerTitle' => $user->presentFullName(),
        'headerHint' => link_to_route('bookkeeper.users.index', uppercase(trans('users.title')))
    ])
@endsection

@section('content')
    @include('partials.form')
@endsection