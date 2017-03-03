<div class="navigation-container">
    <div class="container">
        <nav class="navigation {{ ($currentSection === 'finance' || $currentSection === 'crm') ? '' : 'navigation--padded' }}">
            <div class="navigation__sections">
                @foreach([
                    'finance' => 'bookkeeper.overview',
                    'crm' => 'bookkeeper.people.index'
                ] as $section => $route)
                    @if($currentSection === $section)
                        <span class="navigation__section navigation__section--active">{{ uppercase(trans('general.' . $section)) }}</span>
                    @else
                        <a href="{{ route($route) }}" class="navigation__section">{{ uppercase(trans('general.' . $section)) }}</a>
                    @endif
                @endforeach
            </div>

            <ul class="navigation__modules">

                <li class="navigation-module has-dropdown" data-hover="true">
                    <i class="navigation-module__icon dropdown-icon icon-user"></i>
                    <div class="dropdown navigation-module__dropdown">
                        <div class="dropdown__info">{{ uppercase(trans('users.title')) }}</div>
                        <ul class="dropdown-sub">
                            <li class="dropdown-sub__item"><a href="{{ route('bookkeeper.users.index') }}"><i class="icon-users"></i>{{ trans('users.index') }}</a></li>
                            <li class="dropdown-sub__item"><a href="{{ route('bookkeeper.users.create') }}"><i class="icon-user-create"></i>{{ trans('users.create') }}</a></li>
                        </ul>
                    </div>
                </li>

                <li class="navigation-module has-dropdown" data-hover="true">
                    <i class="navigation-module__icon dropdown-icon icon-cog"></i>
                    <div class="dropdown navigation-module__dropdown">
                        <div class="dropdown__info">{{ uppercase(trans('settings.title')) }}</div>
                        <ul class="dropdown-sub">
                            <li class="dropdown-sub__item"><a href="{{ route('bookkeeper.settings.edit') }}"><i class="icon-wrench"></i>{{ trans('settings.index') }}</a></li>
                            <li class="dropdown-sub__item"><a href="{{ route('bookkeeper.update.index') }}"><i class="icon-sync"></i>{{ trans('update.index') }}</a></li>
                        </ul>
                    </div>
                </li>

                <li class="navigation-module navigation-user has-dropdown" data-hover="true">
                    <span class="navigation-user__avatar">
                        {!! $currentUser->presentAvatar() !!}
                    </span>

                    <div class="dropdown navigation-module__dropdown">
                        <div class="dropdown__info">{{ uppercase($currentUser->presentFullName()) }}</div>
                        <ul class="dropdown-sub">
                            <li class="dropdown-sub__item"><a href="{{ route('bookkeeper.profile.edit') }}"><i class="icon-profile"></i>{{ trans('users.update_profile') }}</a>
                            <li class="dropdown-sub__item"><a href="{{ route('bookkeeper.profile.password') }}"><i class="icon-lock"></i>{{ trans('users.change_password') }}</a>
                            <li class="dropdown-sub__item"><a href="{{ route('bookkeeper.auth.logout') }}"><i class="icon-logout"></i>{{ trans('auth.logout') }}</a>
                        </ul>
                    </div>
                </li>

            </ul>

            <form class="navigation__search" method="GET" action="#">
                <input type="search" name="q" id="keywords" placeholder="{{ trans('general.search') }}..." required>
                <label class="navigation__search-label icon-label" for="keywords">
                    <i class="icon-search"></i>
                </label>
            </form>
        </nav>

        @if($currentSection === 'finance' || $currentSection === 'crm')
            @include('partials.tabs', [
                'flaps' => ($currentSection === 'finance') ?
                    [
                        'bookkeeper.overview' => 'overview.index',
                        'bookkeeper.people.index' => 'transactions.title',
                        'bookkeeper.people.create' => 'accounts.title',
                        'bookkeeper.settings.edit' => 'tags.title',
                    ] :
                    [
                        'bookkeeper.people.index' => 'people.title',
                        'bookkeeper.people.create' => 'lists.title',
                    ]
            ])
        @endif

    </div>
</div>