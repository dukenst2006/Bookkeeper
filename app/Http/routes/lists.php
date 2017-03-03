<?php

Route::resource('lists', 'ListsController', ['except' => ['show'], 'names' => [
    'index'   => 'bookkeeper.lists.index',
    'create'  => 'bookkeeper.lists.create',
    'store'   => 'bookkeeper.lists.store',
    'edit'    => 'bookkeeper.lists.edit',
    'update'  => 'bookkeeper.lists.update',
    'destroy' => 'bookkeeper.lists.destroy',
]]);

Route::get('lists/search', [
    'uses' => 'ListsController@search',
    'as'   => 'bookkeeper.lists.search']);

Route::delete('lists/destroy/bulk', [
    'uses' => 'ListsController@bulkDestroy',
    'as'   => 'bookkeeper.lists.destroy.bulk']);

Route::get('lists/{id}/people', [
    'uses' => 'ListsController@people',
    'as'   => 'bookkeeper.lists.people']);