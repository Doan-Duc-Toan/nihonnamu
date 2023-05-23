$(document).ready(function(){
    $("form#add_post select#select_cat").change(function(){
        var select = $(this).val();
        // alert(select);
        // alert("ok")
        var selector = 'form#add_post select#select_'+select;
        $(this).nextAll('form#add_post select.select_cat_child').css('display', 'none');
        $(this).nextAll(selector).slideToggle();
    })
})