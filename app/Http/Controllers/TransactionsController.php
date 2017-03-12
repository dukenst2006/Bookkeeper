<?php


namespace Bookkeeper\Http\Controllers;


use Bookkeeper\Finance\Transaction;
use Bookkeeper\Http\Controllers\Traits\BasicResource;
use Bookkeeper\Http\Controllers\Traits\UsesTransactionForms;
use Illuminate\Http\Request;

class TransactionsController extends BookkeeperController {

    use BasicResource, UsesTransactionForms;

    /**
     * Self model path required for ModifiesPermissions
     *
     * @var string
     */
    protected $modelPath = Transaction::class;
    protected $resourceMultiple = 'transactions';
    protected $resourceSingular = 'transaction';


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::sortable()
            ->filteredByType()->paginate();

        return $this->compileView('transactions.index', compact('transactions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'name'       => 'required|max:255',
            'type'       => 'required|in:income,expense',
            'amount'     => 'required|integer',
            'account_id' => 'required|exists:accounts,id',
            'created_at' => 'required'
        ]);

        if ($validator->fails())
        {
            return response()->json([
                'success' => false,
                'message' => trans('transactions.error_saving')
            ]);
        }

        $transaction = Transaction::create($request->all());
        $transaction->tags()->sync(json_decode($request->input('tags')));

        return response()->json([
            'success' => true
        ]);
    }

}