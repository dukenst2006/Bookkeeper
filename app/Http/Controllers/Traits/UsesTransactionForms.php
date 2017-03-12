<?php

namespace Bookkeeper\Http\Controllers\Traits;


use Bookkeeper\Finance\Transaction;
use Illuminate\Http\Request;

trait UsesTransactionForms {

    /**
     * @param int $id
     * @param Transaction $transaction
     * @return \Kris\LaravelFormBuilder\Form
     */
    protected function getEditForm($id, Transaction $transaction)
    {
        return $this->form('Bookkeeper\Html\Forms\Transactions\EditForm', [
            'url'    => route('bookkeeper.transactions.update', $id),
            'model'  => $transaction
        ]);
    }

    /**
     * @param Request $request
     * @param Transaction $transaction
     */
    protected function validateEditForm(Request $request, Transaction $transaction)
    {
        $this->validateForm('Bookkeeper\Html\Forms\Transactions\EditForm', $request);
    }

}