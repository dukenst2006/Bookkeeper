@extends('profile.base_edit')

@php
    $currentSection = null;
    $currentRoute = null;
@endphp

@section('form_buttons')
    {!! submit_button('icon-lock') !!}
@endsection

@section('content')
    @include('profile.tabs', [
        'currentRoute' => 'bookkeeper.profile.password',
        'currentKey' => []
    ])
    @parent
@endsection