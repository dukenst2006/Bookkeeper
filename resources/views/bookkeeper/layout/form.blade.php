@extends('layout.bookkeeper')

@section('scripts')
    @parent

    <script>window.locale = '{{ app()->getLocale() }}';</script>
    {!! Theme::js('js/forms.js') !!}
@endsection