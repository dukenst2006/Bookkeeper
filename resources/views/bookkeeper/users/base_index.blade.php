@extends('layout.content')

@php
$currentSection = null;
$currentRoute = null;
@endphp

@section('actions')
    @include('partials.search', ['key' => 'users'])
    @include('partials.bulk', ['key' => 'users'])


    {!! header_action_open('users.new', 'header__action--right') !!}
    {!! action_button(route('bookkeeper.users.create'), 'icon-user-create') !!}
    {!! header_action_close() !!}
@endsection