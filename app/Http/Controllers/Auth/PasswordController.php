<?php

namespace Bookkeeper\Http\Controllers\Auth;

use Bookkeeper\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

class PasswordController extends Controller
{

    use ResetsPasswords;

    /**
     * Create a new password controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');

        $this->redirectTo = route('bookkeeper.overview');
    }
}
