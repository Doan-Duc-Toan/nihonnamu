$(document).ready(function () {
    $("#list_user form table thead tr td #check_all").change(function () {
            $("#list_user form table tbody tr td input").prop('checked', $(this).is(':checked'));

    })
})