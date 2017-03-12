<div class="modal" id="transactionModalContainer">
    <div class="modal__whiteout">
        <div class="modal__inner transaction-modal" id="transactionModal" data-posturl="{{ route('bookkeeper.transactions.store') }}">
            <div class="transaction-modal__loader" id="transactionModalLoader"></div>

            <div class="scroller">
                <div>
                    <h4 class="modal__heading modal__heading--success">{!! trans('transactions.add_income') !!}</h4>
                    <h4 class="modal__heading modal__heading--danger">{!! trans('transactions.add_expense') !!}</h4>
                    <p class="transaction-modal__flash" id="transactionFlashMessage"></p>

                    <div class="modal__content">

                        <input type="hidden" name="t_type" value="" id="t_type">

                        <div class="transaction-modal__column transaction-modal__column--main">
                            {!! field_wrapper_open([], 't_name', $errors, 'form-group--inverted') !!}
                                {!! field_label(true, ['label' => trans('validation.attributes.name')], 't_name', $errors) !!}
                                {!! Form::text('t_name') !!}
                            </div>

                            {!! field_wrapper_open([], 't_amount', $errors, 'form-group--inverted') !!}
                                {!! field_label(true, ['label' => trans('validation.attributes.amount')], 't_amount', $errors) !!}
                                <div class="amount-field" id="amountWrapper">
                                    {!! Form::text('t_amount', '', ['class' => 'amount-field__value', 'autocomplete' => 'off']) !!}
                                    <input type="text" name="t_amountPlaceholder" class="amount-field__input">
                                    <span class="amount-field__currency"></span>
                                </div>
                            </div>

                            {!! field_wrapper_open([], 't_account_id', $errors, 'form-group--inverted') !!}
                                {!! field_label(true, ['label' => trans('accounts.self')], 't_account_id', $errors) !!}
                                <div class="form-group__select">
                                    {!! Form::select('t_account_id', get_accounts_list(), get_default_account()) !!}
                                    <i class="icon-arrow-down"></i>
                                </div>
                            </div>

                            {!! field_wrapper_open([], 't_date', $errors, 'form-group--datetime form-group--inverted') !!}
                                {!! field_label(true, ['label' => trans('validation.attributes.date')], 't_date', $errors) !!}
                                {!! Form::text('t_date', date('Y-m-d H:i:s')) !!}
                            </div>

                            <label class="form-group__checkbox transaction-modal__received">
                                {!! Form::checkbox('t_received', 1, true) !!}
                                <span>
                                    <i class="form-group__checkbox-icon icon-cancel button__icon button__icon--right"> <span>{{ uppercase(trans('transactions.received')) }}</span></i><i class="form-group__checkbox-icon icon-confirm button__icon button__icon--right"> <span>{{ uppercase(trans('transactions.received')) }}</span></i>
                                </span>
                            </label>
                        </div><div class="transaction-modal__column transaction-modal__column--meta">
                            <div class="form-section"
                                 id="transactionTags"
                                 data-searchurl="{{ route('bookkeeper.tags.search.json') }}">

                                <input type="hidden" name="t_tags" value="[]" id="t_tags">

                                <h4 class="form-section__heading">{{ uppercase(trans('tags.title')) }}</h4>
                                <ul class="tags-list tags-list--compact">
                                    
                                </ul>


                                <div class="related-search">

                                    <input class="related-search__search" type="text" name="_relatedsearch" placeholder="{{ trans('tags.type_to_add') }}" autocomplete="off">
                                    <p class="related-search__hint">{{ trans('tags.choose_from_results_to_add') }}</p>

                                    <ul class="related-search__results">

                                    </ul>
                                </div>

                            </div>

                            {!! field_wrapper_open([], 't_notes', $errors, 'form-group--inverted') !!}
                                {!! field_label(true, ['label' => trans('validation.attributes.notes')], 't_notes', $errors) !!}
                                {!! Form::textarea('t_notes') !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-buttons">
                <button class="button button--close">
                    {{ uppercase(trans('general.dismiss')) }}
                </button><button class="button button--confirm">{{
                    uppercase(trans('general.confirm')) }}
                </button>
            </div>
        </div>
    </div>
</div>