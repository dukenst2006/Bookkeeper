<?php

namespace Bookkeeper\Html\Forms\Lists;


use Kris\LaravelFormBuilder\Form;

class EditForm extends Form {

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
        $this->compose('Bookkeeper\Html\Forms\Lists\CreateForm');
    }
}