$(document).ready(function () {
    $("#list_user form table thead tr td #check_all").change(function () {
        $("#list_user form table tbody tr td input").prop('checked', $(this).is(':checked'));

    })
    $(".content_top form input#search").keyup(function () {
        $("#list_result li").remove();
        var search = $(this).val();
        var data = { search: search }
        var status = $("input#get_status").val();
        var url = "?mod=user&controller=ajax&action=search_user_ajax&status="+status;
        $.ajax({
            type: "GET",
            url: url,
            data: data,
            dataType: 'json',
            success: function (data) {
                $("#list_result li").remove();
                data.forEach(function (user) {
                    var result = "<li class='rounded'><a href='?mod=catalog&action=search_list_user&id=" + user['id'] + "&status="+status+"'>" + user['fullname'] + "--" + user['privilege'] + "</a></li>";
                    $("#list_result").append(result);
                });
                $("#list_result").css('display', 'block');
            }

        });
    })
})