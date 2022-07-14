$(document).ready(function () {
    $('input[type=checkbox]').live('click', function () {
        var parent = $(this).parent().attr('id');
        $('#' + parent + ' input[type=checkbox]').removeAttr('checked');
        $(this).attr('checked', 'checked');
    });
});