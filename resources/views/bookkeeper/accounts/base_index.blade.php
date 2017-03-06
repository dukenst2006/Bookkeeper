@extends('layout.content')

@php
$currentSection = 'finance';
$currentRoute = 'bookkeeper.accounts.index';
@endphp

@section('actions')
    @include('partials.search', ['key' => 'accounts'])
    @include('partials.bulk', ['key' => 'accounts'])


    {!! header_action_open('accounts.new', 'header__action--right') !!}
    {!! action_button(route('bookkeeper.accounts.create'), 'icon-list-add') !!}
    {!! header_action_close() !!}
@endsection