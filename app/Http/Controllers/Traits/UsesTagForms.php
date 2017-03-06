<?php

namespace Bookkeeper\Http\Controllers\Traits;


use Illuminate\Http\Request;
use Bookkeeper\Finance\Tag;

trait UsesTagForms {

    /**
     * @return \Kris\LaravelFormBuilder\Form
     */
    protected function getCreateForm()
    {
        return $this->form('Bookkeeper\Html\Forms\Tags\CreateEditForm', [
            'method' => 'POST',
            'url'    => route('bookkeeper.tags.store')
        ]);
    }

    /**
     * @param Request $request
     */
    protected function validateCreateForm(Request $request)
    {
        $this->validateForm('Bookkeeper\Html\Forms\Tags\CreateEditForm', $request);
    }

    /**
     * @param int $id
     * @param Tag $tag
     * @return \Kris\LaravelFormBuilder\Form
     */
    protected function getEditForm($id, Tag $tag)
    {
        return $this->form('Bookkeeper\Html\Forms\Tags\CreateEditForm', [
            'method' => 'PUT',
            'url'    => route('bookkeeper.tags.update', $id),
            'model'  => $tag
        ]);
    }

    /**
     * @param Request $request
     * @param Tag $tag
     */
    protected function validateEditForm(Request $request, Tag $tag)
    {
        $this->validateForm('Bookkeeper\Html\Forms\Tags\CreateEditForm', $request, [
            'name' => ['required', 'max:255',
                'unique:tags,name,' . $tag->getKey()],
        ]);
    }

}