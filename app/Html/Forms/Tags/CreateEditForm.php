<?php

namespace Bookkeeper\Html\Forms\Tags;


use Kris\LaravelFormBuilder\Form;

class CreateEditForm extends Form {

    public function buildForm()
    {
        $this->add('name', 'text', [
            'rules'      => ['required', 'max:255', 'unique:tags,name'],
        ]);
    }

}