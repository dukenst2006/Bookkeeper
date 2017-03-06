<?php


namespace Bookkeeper\Http\Controllers;


use Bookkeeper\Http\Controllers\Traits\BasicResource;
use Bookkeeper\Finance\Tag;
use Bookkeeper\Http\Controllers\Traits\UsesTagForms;

class TagsController extends BookkeeperController {

    use BasicResource, UsesTagForms;

    /**
     * Self model path required for ModifiesPermissions
     *
     * @var string
     */
    protected $modelPath = Tag::class;
    protected $resourceMultiple = 'tags';
    protected $resourceSingular = 'tag';

    /**
     * List the specified resource fields.
     *
     * @param int $id
     * @return Response
     */
    public function transactions($id)
    {
        $tag = Tag::findOrFail($id);

        $transactions = $tag->transactions()
            ->sortable()->paginate();

        return $this->compileView('tags.transactions', compact('tag', 'transactions'), trans('transactions.title'));
    }

}