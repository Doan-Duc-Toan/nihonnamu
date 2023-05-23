$(document).ready(function() {
    $(".dropdown_toggle").click(function () {
        // alert("ok")
        $(this).next("ul.dropdown_menu").stop().slideToggle(300);
    })
})