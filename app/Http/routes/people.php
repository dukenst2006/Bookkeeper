<?php

Route::resource('people', 'PeopleController', ['except' => ['show'], 'names' => [
    'index'   => 'bookkeeper.people.index',
    'create'   => 'bookkeeper.people.create',
    'store'   => 'bookkeeper.people.store',
    'edit'    => 'bookkeeper.people.edit',
    'update'  => 'bookkeeper.people.update',
    'destroy' => 'bookkeeper.people.destroy',
]]);