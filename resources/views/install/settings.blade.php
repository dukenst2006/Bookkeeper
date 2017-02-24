@extends('layout.base')

@section('pageTitle', trans('install.bookkeeper_settings'))

@section('body')
    <main class="dialog-container dialog-container--large">
        <div class="dialog dialog--large">
            @include('partials.progress', ['step' => 4])

            <div class="install text--center">
                <h1>@yield('pageTitle')</h1>

                @if($errors->count() > 0)
                <p class="text--sm text--danger">{{ trans('install.check_bookkeeper_settings') }}</p>
                @else
                <p class="text--sm">{{ trans('install.enter_bookkeeper_settings') }}</p>
                @endif

                <form action="{{ route('install-settings-post') }}" method="post" class="install-form">
                    {!! csrf_field() !!}

                    {!! field_wrapper_open([], 'base_url', $errors, 'form-group--inverted') !!}
                        {!! field_label(true, ['label' => trans('install.bookkeeper_base_url')], 'base_url', $errors) !!}
                        {!! Form::text('base_url', 'http://bookkeeper.dev') !!}
                    </div>

                    {!! field_wrapper_open([], 'default_currency', $errors, 'form-group--inverted') !!}
                        {!! field_label(true, ['label' => trans('currencies.default_currency')], 'default_currency', $errors) !!}

                        <div class="form-group__select">
                            {!! Form::select('default_currency', Bookkeeper\Support\Currencies\CurrencyHelper::getCurrencies(), env('DEFAULT_CURRENCY', 'EUR')) !!}
                            <i class="icon-arrow-down"></i>
                        </div>
                    </div>

                    <div class="modal-buttons">
                        {!! action_button(route('install-user'), 'icon-arrow-left', trans('general.back'), '', 'l') !!}
                        {!! submit_button('icon-arrow-right', trans('install.complete')) !!}
                    </div>
                </form>

            </div>
        </div>
    </main>
@endsection