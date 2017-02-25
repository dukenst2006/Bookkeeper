<div>
    <h3 class="content-inner__heading content-inner__heading--danger"><i class="icon-status-pending"></i> {{ trans('update.nuclear_is_not_up_to_date') }}</h3>
    <p class="content-inner__message">{!! trans('update.not_up_to_date_description', ['latest' => $latest->tag_name, 'version' => bookkeeper_version()]) !!}</p>
</div>

<div class="content-inner__row">
    <h3 class="content-inner__heading"><i class="icon-sync"></i> {{ trans('update.auto_update') }}</h3>
    <p class="content-inner__message">{{ trans('update.auto_update_description') }}</p>

    {!! action_button(route('bookkeeper.update.start'), 'icon-sync', trans('update.start')) !!}
</div>