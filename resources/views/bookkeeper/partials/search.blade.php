{!! header_action_open('general.search') !!}
<form class="header__search" method="GET" action="{{ route('bookkeeper.' . $key . '.search') }}">
    <i class="icon-search"></i>
    <input type="search" name="q" value="{{ request('q') }}" placeholder="{{ trans($key . '.search') }}...">
</form>
{!! header_action_close() !!}