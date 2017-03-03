@extends('layout.content')

@php
$currentSection = 'crm';
$currentRoute = 'bookkeeper.lists.index';
@endphp

@section('actions')
    @include('partials.search', ['key' => 'lists'])
    @include('partials.bulk', ['key' => 'lists'])


    {!! header_action_open('lists.new', 'header__action--right') !!}
    {!! action_button(route('bookkeeper.lists.create'), 'icon-list-add') !!}
    {!! header_action_close() !!}
@endsection