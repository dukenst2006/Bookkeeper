<?php

namespace Bookkeeper\Http\Controllers\Traits;


use Illuminate\Http\Request;
use Bookkeeper\Users\User;

trait UsesProfileForms {

    /**
     * @param User $profile
     * @return \Kris\LaravelFormBuilder\Form
     */
    protected function getEditProfileForm(User $profile)
    {
        return $this->form('Bookkeeper\Html\Forms\Users\EditForm', [
            'url'   => route('bookkeeper.profile.update'),
            'model' => $profile
        ]);
    }

    /**
     * @param Request $request
     * @param User $profile
     */
    protected function validateUpdateProfile(Request $request, User $profile)
    {
        $this->validateForm('Bookkeeper\Html\Forms\Users\EditForm', $request, [
            'email' => 'required|email|unique:users,email,' . $profile->getKey()
        ]);
    }

    /**
     * @return \Kris\LaravelFormBuilder\Form
     */
    protected function getPasswordForm()
    {
        return $this->form('Bookkeeper\Html\Forms\Users\PasswordForm', [
            'url' => route('bookkeeper.profile.password.post'),
        ]);
    }

}