@extends('tags.base_edit')
<?php $_withForm = false; ?>

@php
$currentSection = 'finance';
$currentRoute = 'bookkeeper.tags.index';
@endphp

@section('content')
    @include('tags.tabs', [
        'currentRoute' => 'bookkeeper.tags.overview',
        'currentKey' => $tag->getKey()
    ])

    @include('overview.chart')
@endsection

@include('transactions.create')