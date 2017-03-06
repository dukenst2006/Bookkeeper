<?php


namespace Bookkeeper\Http\Controllers;


use Bookkeeper\Http\Controllers\Traits\BasicResource;
use Bookkeeper\Finance\Account;
use Bookkeeper\Http\Controllers\Traits\UsesAccountForms;

class AccountsController extends BookkeeperController {

    use BasicResource, UsesAccountForms;

    /**
     * Self model path required for ModifiesPermissions
     *
     * @var string
     */
    protected $modelPath = Account::class;
    protected $resourceMultiple = 'accounts';
    protected $resourceSingular = 'account';

    /**
     * List the specified resource fields.
     *
     * @param int $id
     * @return Response
     */
    public function transactions($id)
    {
        $account = Account::findOrFail($id);

        $transactions = $account->transactions()
            ->sortable()->paginate();

        return $this->compileView('accounts.transactions', compact('account', 'transactions'), trans('transactions.title'));
    }

}