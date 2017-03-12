<?php

return [

    // Templates
    'form'          => 'laravel-form-builder::form',
    'text'          => 'fields.text',
    'textarea'      => 'fields.textarea',
    'checkbox'      => 'fields.checkbox',
    'select'        => 'fields.select',

    'custom_fields' => [
        'password' => 'Bookkeeper\Html\Fields\PasswordField',
        'datetime' => 'Bookkeeper\Html\Fields\DatetimeField',
        'amount' => 'Bookkeeper\Html\Fields\AmountField',
    ]
];
