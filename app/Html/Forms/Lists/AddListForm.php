<?php

namespace Bookkeeper\Html\Forms\Lists;


use Kris\LaravelFormBuilder\Form;

class AddListForm extends Form {

    /**
     * Form options
     *
     * @var array
     */
    protected $formOptions = [
        'method' => 'PUT'
    ];

    public function buildForm()
    {
        $this->add('list', 'select', [
            'rules' => 'required'
        ]);
    }

}