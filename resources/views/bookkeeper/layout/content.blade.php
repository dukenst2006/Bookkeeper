@extends('layout.bookkeeper')

@section('content')

    <div class="content-list-container {{ $contentsListModifier or '' }}">

        {!! content_table_open() !!}

        @yield('content_sortable_links')

        {!! content_table_middle() !!}

        @yield('content_list')

        {!! content_table_close() !!}

        <div class="content-footer content-footer--table">
            @yield('content_footer')
        </div>

    </div>

@endsection