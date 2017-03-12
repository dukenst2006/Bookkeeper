<?php

Route::resource('accounts', 'AccountsController', ['except' => ['show'], 'names' => [
    'index'   => 'bookkeeper.accounts.index',
    'create'  => 'bookkeeper.accounts.create',
    'store'   => 'bookkeeper.accounts.store',
    'edit'    => 'bookkeeper.accounts.edit',
    'update'  => 'bookkeeper.accounts.update',
    'destroy' => 'bookkeeper.accounts.destroy',
]]);

Route::get('accounts/search', [
    'uses' => 'AccountsController@search',
    'as'   => 'bookkeeper.accounts.search']);

Route::delete('accounts/destroy/bulk', [
    'uses' => 'AccountsController@bulkDestroy',
    'as'   => 'bookkeeper.accounts.destroy.bulk']);

Route::get('accounts/{id}/overview', [
    'uses' => 'AccountsController@overview',
    'as'   => 'bookkeeper.accounts.overview']);

Route::get('accounts/{id}/transactions', [
    'uses' => 'AccountsController@transactions',
    'as'   => 'bookkeeper.accounts.transactions']);