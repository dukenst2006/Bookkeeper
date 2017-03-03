@extends('lists.base_edit')

@section('content')
    @include('lists.tabs', [
        'currentRoute' => 'bookkeeper.lists.people',
        'currentKey' => $list->getKey()
    ])
    @parent
@endsection