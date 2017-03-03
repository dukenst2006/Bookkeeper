<?php

namespace Bookkeeper\Html\Forms\Lists;


use Kris\LaravelFormBuilder\Form;

class CreateForm extends Form {

    /**
     * Form options
     *
     * @var array
     */
    protected $formOptions = [
        'method' => 'POST'
    ];

    public function buildForm()
    {
        $this->add('name', 'text', [
            'rules' => 'required'
        ]);

    }
}