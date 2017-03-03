@extends('layout.base')

@section('pageTitle', $pageTitle)

@section('body')
    <main class="container-main" id="mainContainer">
        @include('partials.navigation')

        <div class="header container">
            @yield('header_content')

            <div class="header__actions">
                @yield('actions')
            </div>
        </div>

        <div class="container">
            @include('partials.flash')

            @yield('content')
        </div>

        @include('partials.footer')
    </main>
@endsection