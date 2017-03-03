<?php

namespace Bookkeeper\Html\Forms\People;


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
        $this->add('first_name', 'text', [
            'rules' => 'required|max:64'
        ]);
        $this->add('last_name', 'text', [
            'rules' => 'max:64'
        ]);
        $this->add('company', 'text', [
            'rules' => 'max:128'
        ]);
        $this->add('job_title', 'text', [
            'rules' => 'max:64'
        ]);

        $this->add('email', 'email', [
            'rules' => 'email|max:255'
        ]);
        $this->add('tel', 'text', [
            'rules' => 'max:64'
        ]);
        $this->add('tel_mobile', 'text', [
            'rules' => 'max:64'
        ]);
        $this->add('fax', 'text', [
            'rules' => 'max:64'
        ]);

        $this->add('nationality', 'text', [
            'rules' => 'max:32'
        ]);
        $this->add('national_id', 'text', [
            'rules' => 'max:32'
        ]);

        $this->add('address', 'textarea', [
            'rules' => 'max:256'
        ]);
        $this->add('city', 'text', [
            'rules' => 'max:64'
        ]);
        $this->add('country', 'text', [
            'rules' => 'max:64'
        ]);
        $this->add('postal_code', 'text', [
            'rules' => 'max:16'
        ]);

        $this->add('additional', 'textarea');

    }
}