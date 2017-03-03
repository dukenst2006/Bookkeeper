<?php


namespace Bookkeeper\Http\Controllers;


use Bookkeeper\CRM\Person;
use Bookkeeper\Http\Controllers\Traits\BasicResource;
use Bookkeeper\Http\Controllers\Traits\UsesPersonForms;
use Illuminate\Http\Request;

class PeopleController extends BookkeeperController {

    use BasicResource, UsesPersonForms;

    /**
     * Self model path required for ModifiesPermissions
     *
     * @var string
     */
    protected $modelPath = Person::class;
    protected $resourceMultiple = 'people';
    protected $resourceSingular = 'person';

    /**
     * List the specified resource lists.
     *
     * @param int $id
     * @return Response
     */
    public function lists($id)
    {
        $person = Person::with('lists')->findOrFail($id);

        list($form, $count) = $this->getAddListForm($id, $person);

        return $this->compileView('people.lists', compact('person', 'form', 'count'), trans('lists.title'));
    }

    /**
     * Associate a list to the specified resource.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function associateList(Request $request, $id)
    {
        $this->validateForm('Bookkeeper\Html\Forms\Lists\AddListForm', $request);

        $person = Person::findOrFail($id);

        $person->assignListById($request->input('list'));

        $this->notify('lists.associated');

        return redirect()->back();
    }

    /**
     * Dissociate a list from the specified resource.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function dissociateList(Request $request, $id)
    {
        $person = Person::findOrFail($id);

        $person->retractListById($request->input('list'));

        $this->notify('lists.dissociated');

        return redirect()->back();
    }

}