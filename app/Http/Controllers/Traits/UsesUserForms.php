<?php

namespace Bookkeeper\Http\Controllers\Traits;


use Illuminate\Http\Request;
use Bookkeeper\Users\User;

trait UsesUserForms {

    /**
     * @return \Kris\LaravelFormBuilder\Form
     */
    protected function getCreateForm()
    {
        return $this->form('Bookkeeper\Html\Forms\Users\CreateForm', [
            'url' => route('bookkeeper.users.store')
        ]);
    }

    /**
     * @param Request $request
     */
    protected function validateCreateForm(Request $request)
    {
        $this->validateForm('Bookkeeper\Html\Forms\Users\CreateForm', $request);
    }

    /**
     * @param int $id
     * @param User $user
     * @return \Kris\LaravelFormBuilder\Form
     */
    protected function getEditForm($id, User $user)
    {
        return $this->form('Bookkeeper\Html\Forms\Users\EditForm', [
            'url'   => route('bookkeeper.users.update', $id),
            'model' => $user
        ]);
    }

    /**
     * @param Request $request
     * @param User $user
     */
    protected function validateEditForm(Request $request, User $user)
    {
        $this->validateForm('Bookkeeper\Html\Forms\Users\EditForm', $request, [
            'email' => 'required|email|max:255|unique:users,email,' . $user->getKey()
        ]);
    }

    /**
     * @param int $id
     * @return \Kris\LaravelFormBuilder\Form
     */
    protected function getPasswordForm($id)
    {
        return $this->form('Bookkeeper\Html\Forms\Users\PasswordForm', [
            'url' => route('bookkeeper.users.password.post', $id),
        ]);
    }

}