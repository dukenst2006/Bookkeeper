<?php

namespace Bookkeeper\Html\Forms\Accounts;


use Bookkeeper\Support\Currencies\CurrencyHelper;
use Kris\LaravelFormBuilder\Form;

class CreateEditForm extends Form {

    public function buildForm()
    {
        $this->add('name', 'text', [
            'rules' => ['required', 'max:255', 'unique:accounts,name'],
        ]);
        $this->add('currency', 'select', [
            'choices' => CurrencyHelper::getCurrencies(),
            'default_value' => env('DEFAULT_CURRENCY')
        ]);
    }

}