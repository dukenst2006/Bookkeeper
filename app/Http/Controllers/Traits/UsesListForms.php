<?php

namespace Bookkeeper\Http\Controllers\Traits;


use Bookkeeper\CRM\PeopleList;
use Illuminate\Http\Request;

trait UsesListForms {

    /**
     * @return \Kris\LaravelFormBuilder\Form
     */
    protected function getCreateForm()
    {
        return $this->form('Bookkeeper\Html\Forms\Lists\CreateForm', [
            'url' => route('bookkeeper.lists.store')
        ]);
    }

    /**
     * @param Request $request
     */
    protected function validateCreateForm(Request $request)
    {
        $this->validateForm('Bookkeeper\Html\Forms\Lists\CreateForm', $request);
    }

    /**
     * @param int $id
     * @param PeopleList $list
     * @return \Kris\LaravelFormBuilder\Form
     */
    protected function getEditForm($id, PeopleList $list)
    {
        return $this->form('Bookkeeper\Html\Forms\Lists\EditForm', [
            'url'   => route('bookkeeper.lists.update', $id),
            'model' => $list
        ]);
    }

    /**
     * @param Request $request
     */
    protected function validateEditForm(Request $request)
    {
        $this->validateForm('Bookkeeper\Html\Forms\Lists\EditForm', $request);
    }

}