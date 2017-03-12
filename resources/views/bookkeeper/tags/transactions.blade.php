@extends('tags.base_edit')
<?php $_withForm = false; $contentsListModifier = 'content-list-container--separated'; ?>

@section('content')
    @include('tags.tabs', [
        'currentRoute' => 'bookkeeper.tags.transactions',
        'currentKey' => $tag->getKey()
    ])

    @parent
@endsection

@include('transactions.contents')