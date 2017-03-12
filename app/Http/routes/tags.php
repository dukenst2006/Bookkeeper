<?php

Route::resource('tags', 'TagsController', ['except' => ['show'], 'names' => [
    'index'   => 'bookkeeper.tags.index',
    'create'  => 'bookkeeper.tags.create',
    'store'   => 'bookkeeper.tags.store',
    'edit'    => 'bookkeeper.tags.edit',
    'update'  => 'bookkeeper.tags.update',
    'destroy' => 'bookkeeper.tags.destroy',
]]);

Route::get('tags/search', [
    'uses' => 'TagsController@search',
    'as'   => 'bookkeeper.tags.search']);
Route::post('tags/search', [
    'uses' => 'TagsController@searchJson',
    'as'   => 'bookkeeper.tags.search.json']);

Route::get('tags/{id}/transactions', [
    'uses' => 'TagsController@transactions',
    'as'   => 'bookkeeper.tags.transactions']);

Route::get('tags/{id}/overview', [
    'uses' => 'TagsController@overview',
    'as'   => 'bookkeeper.tags.overview']);