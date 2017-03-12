{!! field_wrapper_open($options, $name, $errors) !!}

<div class="form-group-column form-group-column--{{ array_get($options, 'fullWidth', false) ? 'full' : 'field' }} ">
    {!! field_label($showLabel, $options, $name, $errors) !!}

    <div class="amount-field" id="amountEditWrapper">
        {!! Form::text('amount', $options['value'], ['class' => 'amount-field__value', 'autocomplete' => 'off']) !!}
        <input type="text" name="amountPlaceholder" class="amount-field__input">
        <span class="amount-field__currency"></span>
    </div>

    {!! field_errors($errors, $name) !!}

</div>{!! field_help_block($name, $options) !!}

{!! field_wrapper_close($options) !!}