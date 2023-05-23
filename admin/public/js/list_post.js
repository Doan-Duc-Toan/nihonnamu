$(document).ready(function () {
    $("#list_post form table thead tr td #check_all").change(function () {
            $("#list_post form table tbody tr td input").prop('checked', $(this).is(':checked'));

    })
})