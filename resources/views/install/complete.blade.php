@extends('layout.base')

@section('pageTitle', trans('install.completed'))

@section('body')
<main class="dialog-container dialog-container--large">
    <div class="dialog dialog--large">
        @include('partials.progress', ['step' => 5])

        <div class="install text--center">
            <h1>@yield('pageTitle')</h1>

            {!! Theme::img('img/bookkeeper-logo.svg', 'Bookkeeper Logo', 'dialog__logo') !!}

            <p>{{ trans('install.install_success') }}</p>
            <p class="text--sm">{{ trans('install.enjoy_bookkeeper') }}</p>
            <br><br><br><br><br>
            {!! action_button(route('bookkeeper.auth.login'), 'icon-login', trans('install.go_to_login')) !!}
        </div>
    </div>
</main>
@endsection