@extends('layout.form')

@section('header_content')
    @include('partials.header', [
        'headerTitle' => $profile->presentFullName()
    ])
@endsection

@section('content')
    @include('partials.form')
@endsection