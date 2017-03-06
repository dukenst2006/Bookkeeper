@extends('tags.base_edit')
<?php $_withForm = false; ?>

@section('content')
    @include('tags.tabs', [
        'currentRoute' => 'reactor.tags.transactions',
        'currentKey' => $tag->getKey()
    ])

    OVERVIEW AND TRANSACTIONS
@endsection