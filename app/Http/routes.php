<?php

require_once 'routes/auth.php';
require_once 'routes/common.php';

// Authenticated reactor
Route::group(['middleware' => [
    'auth',
    'set-theme:' . config('themes.active')
]], function ()
{
    require_once 'routes/overview.php';
    require_once 'routes/people.php';
});
