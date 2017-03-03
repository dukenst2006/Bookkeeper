@extends('layout.' . ((isset($_withForm) && $_withForm === false) ? 'content' : 'form'))

@php
$currentSection = 'crm';
$currentRoute = 'bookkeeper.people.index';
@endphp

@section('header_content')
    @include('partials.header', [
        'headerTitle' => $person->presentFullName(),
        'headerHint' => link_to_route('bookkeeper.people.index', uppercase(trans('people.title')))
    ])
@endsection

@section('content')
    @include('partials.form')
@endsection