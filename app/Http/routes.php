<?php

require_once 'routes/auth.php';
require_once 'routes/common.php';

// Authenticated reactor
Route::group(['middleware' => [
    'auth',
    'set-theme:' . config('themes.active')
]], function ()
{
    require_once 'routes/accounts.php';
    require_once 'routes/lists.php';
    require_once 'routes/overview.php';
    require_once 'routes/people.php';
    require_once 'routes/profile.php';
    require_once 'routes/settings.php';
    require_once 'routes/tags.php';
    require_once 'routes/update.php';
    require_once 'routes/users.php';
});
