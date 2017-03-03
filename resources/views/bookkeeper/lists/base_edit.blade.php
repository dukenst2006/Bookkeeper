@extends('layout.' . ((isset($_withForm) && $_withForm === false) ? 'content' : 'form'))

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