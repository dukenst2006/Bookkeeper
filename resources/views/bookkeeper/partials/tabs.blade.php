<div class="tabs-container">
    <div class="tabs-outer scroller scroller--muted">
        <ul class="tabs">
            @foreach($flaps as $route => $text)
                <li class="tabs__flap">
                    {!! link_to_route(
                        $route,
                        uppercase(trans($text)),
                        isset($currentKey) ? $currentKey : [],
                        ['class' => 'tabs__link' . (($currentRoute === $route) ? ' tabs__link--active' : '')]
                    ) !!}
                </li>
            @endforeach
        </ul>
    </div>
</div>