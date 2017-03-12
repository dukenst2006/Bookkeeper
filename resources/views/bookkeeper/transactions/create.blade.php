@section('modules')
    @parent

    <div class="transaction-buttons">
        <a href="#" id="expenseButton" class="transaction-buttons__button transaction-buttons__button--expense"></a><a href="#" id="incomeButton" class="transaction-buttons__button transaction-buttons__button--income"></a>
    </div>

    @include('transactions.modal')
@endsection

@section('scripts')
    @parent

    <script>
        window.transactionModal = true;
        window.locale = '{{ env('APP_LOCALE') }}';
        window.currentAccount = '{{ get_default_account() }}';
        window.accountCurrencies = JSON.parse('{!! json_encode($accountCurrencies) !!}');
    </script>
    {!! Theme::js('js/transactions.js') !!}
@endsection