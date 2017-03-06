@extends('layout.bookkeeper')

@php
$currentSection = 'finance';
$currentRoute = 'bookkeeper.tags.index';
@endphp

@section('actions')
    @include('partials.search', ['key' => 'tags'])

    {!! header_action_open('tags.new', 'header__action--right') !!}
    {!! action_button(route('bookkeeper.tags.create'), 'icon-tag-create') !!}
    {!! header_action_close() !!}
@endsection