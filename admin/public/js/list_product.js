$(document).ready(function () {
    $("#list_product form table thead tr td #check_all").change(function () {
            $("#list_product form table tbody tr td input").prop('checked', $(this).is(':checked'));

    })
})