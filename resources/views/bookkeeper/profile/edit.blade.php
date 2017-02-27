@extends('profile.base_edit')

@php
    $currentSection = null;
    $currentRoute = null;
@endphp

@section('form_buttons')
    {!! submit_button('icon-floppy') !!}
@endsection

@section('content')
    @include('profile.tabs', [
        'currentRoute' => 'bookkeeper.profile.edit',
        'currentKey' => []
    ])
    @parent
@endsection