<?php

namespace Bookkeeper\Html\Forms\Users;


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
        $this->compose('Bookkeeper\Html\Forms\Users\EditForm');
        $this->compose('Bookkeeper\Html\Forms\Users\PasswordForm');
    }

}