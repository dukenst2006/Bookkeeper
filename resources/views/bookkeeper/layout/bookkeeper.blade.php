@extends('layout.base')

@section('pageTitle', $pageTitle)

@section('body')
    <main class="container-main" id="mainContainer">
        @include('partials.navigation')

        <div class="container">
            @yield('content')
        </div>

        @include('partials.footer')
    </main>
@endsection