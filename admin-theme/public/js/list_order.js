$(document).ready(function () {
    $("#list_order form table thead tr td #check_all").change(function () {
            $("#list_order form table tbody tr td input").prop('checked', $(this).is(':checked'));

    })
})