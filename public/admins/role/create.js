$('.checkbox_parent').on('click', function () {
    $(this).parents('.card').find('.checkbox_childrent').prop('checked', $(this).prop('checked'));
});
$('.check_all').on('click', function () {
    $(this).parents().find('.checkbox_childrent').prop('checked', $(this).prop('checked'));
    $(this).parents().find('.checkbox_parent').prop('checked', $(this).prop('checked'));
});
