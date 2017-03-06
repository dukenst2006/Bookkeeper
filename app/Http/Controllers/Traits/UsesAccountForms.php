<?php

namespace Bookkeeper\Http\Controllers\Traits;


use Illuminate\Http\Request;
use Bookkeeper\Finance\Account;

trait UsesAccountForms {

    /**
     * @return \Kris\LaravelFormBuilder\Form
     */
    protected function getCreateForm()
    {
        return $this->form('Bookkeeper\Html\Forms\Accounts\CreateEditForm', [
            'method' => 'POST',
            'url'    => route('bookkeeper.accounts.store')
        ]);
    }

    /**
     * @param Request $request
     */
    protected function validateCreateForm(Request $request)
    {
        $this->validateForm('Bookkeeper\Html\Forms\Accounts\CreateEditForm', $request);
    }

    /**
     * @param int $id
     * @param Account $account
     * @return \Kris\LaravelFormBuilder\Form
     */
    protected function getEditForm($id, Account $account)
    {
        return $this->form('Bookkeeper\Html\Forms\Accounts\CreateEditForm', [
            'method' => 'PUT',
            'url'    => route('bookkeeper.accounts.update', $id),
            'model'  => $account
        ]);
    }

    /**
     * @param Request $request
     * @param Account $account
     */
    protected function validateEditForm(Request $request, Account $account)
    {
        $this->validateForm('Bookkeeper\Html\Forms\Accounts\CreateEditForm', $request, [
            'name' => ['required', 'max:255',
                'unique:accounts,name,' . $account->getKey()],
        ]);
    }

}