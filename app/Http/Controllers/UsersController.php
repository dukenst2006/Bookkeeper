<?php


namespace Bookkeeper\Http\Controllers;

use Illuminate\Http\Request;
use Bookkeeper\Http\Controllers\Traits\BasicResource;
use Bookkeeper\Http\Controllers\Traits\UsesUserForms;
use Bookkeeper\Users\User;

class UsersController extends BookkeeperController {

    use BasicResource, UsesUserForms;

    /**
     * Self model path required for ModifiesPermissions
     *
     * @var string
     */
    protected $modelPath = User::class;
    protected $resourceMultiple = 'users';
    protected $resourceSingular = 'user';
    protected $permissionKey = 'USERS';

    /**
     * Show the form for updating password.
     *
     * @param int $id
     * @return Response
     */
    public function password($id)
    {
        $user = User::findOrFail($id);

        $form = $this->getPasswordForm($id);

        return $this->compileView('users.password', compact('form', 'user'), trans('users.change_password'));
    }

    /**
     * Update users password
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function updatePassword(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $this->validateForm('Bookkeeper\Html\Forms\Users\PasswordForm', $request);

        $user->setPassword($request->input('password'))->save();

        $this->notify('users.changed_password');

        return redirect()->route('bookkeeper.users.password', $id);
    }

}