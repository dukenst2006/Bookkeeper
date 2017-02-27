@extends('layout.form')

@section('header_content')
    @include('partials.header', [
        'headerTitle' => $profile->first_name . ' ' . $profile->last_name
    ])
@endsection

@section('content')
    @include('partials.form')
@endsection