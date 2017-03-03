<?php


namespace Bookkeeper\Http\Controllers;


use Bookkeeper\CRM\PeopleList;
use Bookkeeper\Http\Controllers\Traits\BasicResource;
use Bookkeeper\Http\Controllers\Traits\UsesListForms;

class ListsController extends BookkeeperController {

    use BasicResource, UsesListForms;

    /**
     * Self model path required for ModifiesPermissions
     *
     * @var string
     */
    protected $modelPath = PeopleList::class;
    protected $resourceMultiple = 'lists';
    protected $resourceSingular = 'list';

    /**
     * List the specified resource people.
     *
     * @param int $id
     * @return Response
     */
    public function people($id)
    {
        $list = PeopleList::findOrFail($id);

        $people = $list->people()
            ->sortable()
            ->paginate();

        return $this->compileView('lists.people', compact('list', 'people', 'count'), trans('people.title'));
    }

}