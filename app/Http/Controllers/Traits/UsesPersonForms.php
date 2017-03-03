<?php

namespace Bookkeeper\Http\Controllers\Traits;


use Bookkeeper\CRM\Person;
use Illuminate\Http\Request;

trait UsesPersonForms {

    /**
     * @return \Kris\LaravelFormBuilder\Form
     */
    protected function getCreateForm()
    {
        return $this->form('Bookkeeper\Html\Forms\People\CreateForm', [
            'url' => route('bookkeeper.people.store')
        ]);
    }

    /**
     * @param Request $request
     */
    protected function validateCreateForm(Request $request)
    {
        $this->validateForm('Bookkeeper\Html\Forms\People\CreateForm', $request);
    }

    /**
     * @param int $id
     * @param Person $person
     * @return \Kris\LaravelFormBuilder\Form
     */
    protected function getEditForm($id, Person $person)
    {
        return $this->form('Bookkeeper\Html\Forms\People\EditForm', [
            'url'   => route('bookkeeper.people.update', $id),
            'model' => $person
        ]);
    }

    /**
     * @param Request $request
     */
    protected function validateEditForm(Request $request)
    {
        $this->validateForm('Bookkeeper\Html\Forms\People\EditForm', $request);
    }

}