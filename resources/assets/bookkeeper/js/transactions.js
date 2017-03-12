$(document).ready(function () {
    // TAGS
    var tags = new Tags($('#transactionTags'));

    // EDIT ONLY
    if ( ! window.transactionModal) {
        // AMOUNT
        new Amount($('#amountEditWrapper'), $('#account_id'));

        return;
    }

    var expenseButton = $('#expenseButton'),
        incomeButton = $('#incomeButton'),
        transactionModalContainer = $('#transactionModalContainer'),
        transactionModal = $('#transactionModal'),
        postURL = transactionModal.data('posturl');

    // MODAL
    var transactionModalObject = new Modal(transactionModalContainer, {
        onConfirmEvent: function (modal) {
            modal.actionsDisabled = true;

            postTransaction(modal);
        }
    });

    // SENDS TRANSACTION
    var transactionLoader = $('#transactionModalLoader'),
        transactionFlash = $('#transactionFlashMessage');

    function postTransaction() {
        $('#transactionModalLoader').addClass('transaction-modal__loader--active');

        $.post(
            postURL,
            serializeFormInformation(),
            function (data) {
                if (data.success) {
                    location.reload();
                } else {
                    transactionModalObject.actionsDisabled = false;

                    transactionLoader.removeClass('transaction-modal__loader--active');
                    transactionFlash.addClass('transaction-modal__flash--active');
                    transactionFlash.text(data.message);
                }
            },
            'json'
        );
    }

    // OPEN CREATE MODAL
    expenseButton.click(function () {
        initializeTransactionModal();
        return false;
    });

    incomeButton.click(function () {
        initializeTransactionModal('income');
        return false;
    });

    function initializeTransactionModal(type) {
        resetTransactionModal();

        if(type === 'income') {
            transactionModal.removeClass('transaction-modal--expense');
            transactionModal.addClass('transaction-modal--income');
            transactionType.val('income');
        } else {
            transactionModal.removeClass('transaction-modal--income');
            transactionModal.addClass('transaction-modal--expense');
            transactionType.val('expense');
        }

        transactionModal.children('.scroller').perfectScrollbar('update');

        transactionModalObject.openModal();
    }

    // INPUTS
    var transactionType = $('#t_type'),
        transactionName = $('#t_name'),
        transactionAmount = $('#t_amount'),
        transactionAccount = $('#t_account_id'),
        transactionDate = $('#t_date'),
        transactionReceived = $('input[name="t_received"]'),
        transactionTags = $('#t_tags'),
        transactionNotes = $('#t_notes');

    // AMOUNT FIELD
    var amountField = new Amount($('#amountWrapper'), transactionAccount);

    // RESET MODAL
    function resetTransactionModal() {
        transactionFlash.removeClass('transaction-modal__flash--active');

        transactionName.val('');
        transactionAccount.val(window.currentAccount);
        // Amount should be after account
        amountField.flush();
        transactionDate.val(new Date().toJSON().slice(0,10));
        transactionReceived.prop('checked', true);
        tags.flush();
        transactionNotes.val('');
    }

    // SERIALIZE FORM INFO
    function serializeFormInformation() {
        return {
            'name': transactionName.val(),
            'type': transactionType.val(),
            'amount': transactionAmount.val() == '' ? 0 : transactionAmount.val(),
            'account_id': transactionAccount.val(),
            'created_at': transactionDate.val(),
            'received': transactionReceived.is(':checked') ? 1 : 0,
            'tags': transactionTags.val(),
            'notes': transactionNotes.val()
        }
    }
});

// DATE FIELDS
$.datetimepicker.setLocale(window.locale);
$('.form-group--datetime').each(function() {
    $(this).find('input[type="text"]').datetimepicker({
        format:'Y-m-d H:i:s'
    });
});