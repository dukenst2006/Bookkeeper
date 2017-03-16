@extends('layout.form')

@php
$currentSection = 'finance';
$currentRoute = 'bookkeeper.transactions.index';
@endphp

@section('header_content')
    @include('partials.header', [
        'headerTitle' => $transaction->name,
        'headerHint' => link_to_route('bookkeeper.transactions.index', uppercase(trans('transactions.title')))
    ])
@endsection

@section('form_buttons')
    {!! submit_button('icon-floppy') !!}
@endsection

@section('content')
    {!! form_start($form) !!}

    <div class="content-inner">
        <div class="form-column form-column--full">
            {!! form_rest($form) !!}
        </div>

        <div class="transaction-tags">
            <div class="form-section"
                 id="transactionTags"
                 data-searchurl="{{ route('bookkeeper.tags.search.json') }}">

                <input type="hidden" name="tags" value="{!! json_encode($transaction->getTagKeys()) !!}" id="t_tags">

                <h4 class="form-section__heading">{{ uppercase(trans('tags.title')) }}</h4>
                <ul class="tags-list tags-list--compact">
                    @foreach($transaction->tags as $tag)
                        <li class="tag" data-tagid="{{ $tag->getKey() }}">
                            <span class="tag__text">
                                {!! link_to_route('bookkeeper.tags.overview', $tag->name, $tag->getKey(), ['target' => '_blank']) !!}
                            </span>

                            <span class="tag__option tag__option--detach">
                                <i class="tag__icon icon-cancel"></i>
                            </span>
                        </li>
                    @endforeach
                </ul>

                <div class="related-search">

                    <input class="related-search__search" type="text" name="_relatedsearch" placeholder="{{ trans('tags.type_to_add') }}" autocomplete="off">
                    <p class="related-search__hint">{{ trans('tags.choose_from_results_to_add') }}</p>

                    <ul class="related-search__results">

                    </ul>
                </div>

            </div>
        </div>

        <div class="form-buttons" id="formButtons">
            @yield('form_buttons')
        </div>
    </div>

    {!! form_end($form) !!}
@endsection

@section('scripts')
    @parent

    <script>
        window.transactionModal = false;
        window.locale = '{{ env('APP_LOCALE') }}';
        window.accountCurrencies = JSON.parse('{!! json_encode($accountCurrencies) !!}');
    </script>
    {!! Theme::js('js/transactions.js') !!}
@endsection