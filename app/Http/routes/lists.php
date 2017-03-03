<?php

Route::resource('lists', 'ListsController', ['except' => ['show'], 'names' => [
    'index'   => 'bookkeeper.lists.index',
    'create'   => 'bookkeeper.lists.create',
    'store'   => 'bookkeeper.lists.store',
    'edit'    => 'bookkeeper.lists.edit',
    'update'  => 'bookkeeper.lists.update',
    'destroy' => 'bookkeeper.lists.destroy',
]]);

Route::get('lists/search', [
    'uses' => 'ListController@search',
    'as'   => 'bookkeeper.lists.search']);

Route::delete('lists/destroy/bulk', [
    'uses' => 'ListController@bulkDestroy',
    'as'   => 'bookkeeper.lists.destroy.bulk']);