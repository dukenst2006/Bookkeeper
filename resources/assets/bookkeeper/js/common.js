$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

// SCROLLERS
$('.scroller').perfectScrollbar();

$(window).on('resize.scroller', function () {
    $('.scroller').perfectScrollbar('update');
});

// GENERAL LABEL HIGHLIGHTERS
$('.form-group input, .form-group textarea').focus(function () {
    $(this).closest('.form-group').find('.form-group__label').addClass('form-group__label--focus');
});

$('.form-group input, .form-group textarea').blur(function () {
    $(this).closest('.form-group').find('.form-group__label').removeClass('form-group__label--focus');
});

// PAGINATION SELECTORS
$('.pagination__selector').on('change', function () {
    window.location = $(this).val();
});

// FORM BUTTONS
var formButtons = $('#formButtons');

if (formButtons.length > 0) {
    var w = $(window),
        d = $(document),
        fbT = formButtons.offset().top,
        dH = 0;

    locateFormButtons();

    w.on('scroll.formbuttons resize.formbuttons', function () {
        locateFormButtons();
    });

    function locateFormButtons() {
        refreshFormButtonsOffset();

        if ((w.outerHeight() + w.scrollTop() - 16) < (fbT + 40)) {
            formButtons.css({'bottom': '16px', 'position': 'fixed'});

            if (w.outerWidth() > 1088) {
                formButtons.css({'right': 'calc(50% - 32em)'});
            }
        } else {
            formButtons.css({'bottom': '', 'position': ''});
        }
    }

    function refreshFormButtonsOffset() {
        if (d.outerHeight() !== dH) {
            dH = d.outerHeight();

            formButtons.css({'bottom': '', 'position': '', 'right': ''});
            fbT = formButtons.offset().top;
        }
    }
}

// CONTENT FILTERS
$('#contentFilter').on('change', function () {
    window.location = $(this).find('option:selected').data('filterurl');
});

// CONTENT CHECKBOXES & BULK ACTIONS
var headerBulkActions = $('.header__action--bulk'),
    bulkSelectedInput = headerBulkActions.find('input[name="_bulkSelected"]');

$('.content-list__checkbox').on('change', function () {
    if ($('.content-list__checkbox:checked').length > 0) {
        headerBulkActions.removeClass('header__action--hidden');
    } else {
        headerBulkActions.addClass('header__action--hidden');
    }

    compileSelectedForBulkAction();
});

headerBulkActions.find('.button--select-none').click(function () {
    $('.content-list__checkbox:checked').prop('checked', false);
    headerBulkActions.addClass('header__action--hidden');

    compileSelectedForBulkAction();
});

headerBulkActions.find('.button--select-all').click(function () {
    $('.content-list__checkbox').prop('checked', true);

    compileSelectedForBulkAction();
});

function compileSelectedForBulkAction() {
    var compiled = [],
        checked = $('.content-list__checkbox:checked');

    for (var i = 0; i < checked.length; i++) {
        compiled.push(checked.eq(i).val());
    }

    bulkSelectedInput.val(JSON.stringify(compiled));
}

// INHERITANCE
var inheritsFrom = function (child, parent) {
    child.prototype = Object.create(parent.prototype);
};