@extends('tags.base_edit')

@section('form_buttons')
    {!! submit_button('icon-floppy') !!}
@endsection

@section('content')
    @include('tags.tabs', [
        'currentRoute' => 'bookkeeper.tags.edit',
        'currentKey' => $tag->getKey()
    ])

    @include('partials.form')
@endsection