@extends('layout.' . ((isset($_withForm) && $_withForm === false) ? 'content' : 'form'))

@php
$currentSection = 'finance';
$currentRoute = 'bookkeeper.tags.index';
@endphp

@section('header_content')
    @include('partials.header', [
        'headerTitle' => $tag->name,
        'headerHint' => link_to_route('bookkeeper.tags.index', uppercase(trans('tags.title')))
    ])
@endsection