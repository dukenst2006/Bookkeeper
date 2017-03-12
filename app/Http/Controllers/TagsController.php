<?php


namespace Bookkeeper\Http\Controllers;


use Bookkeeper\Http\Controllers\Traits\BasicResource;
use Bookkeeper\Finance\Tag;
use Bookkeeper\Http\Controllers\Traits\UsesTagForms;
use Illuminate\Http\Request;

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

    /**
     * Returns the collection of retrieved nodes by json response
     *
     * @param Request $request
     * @return Response
     */
    public function searchJson(Request $request)
    {
        return Tag::search($request->input('q'), 20, true)
            ->groupBy('id')->limit(10)->get()
            ->pluck('name', 'id')->toArray();
    }

}