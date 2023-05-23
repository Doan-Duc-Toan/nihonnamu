$(document).ready(function(){
    $("#content.add_product form #select_cat").change(function(){
        var select = $(this).val();
        var selector = '#content.add_product form #select_'+select;
        $(this).nextAll('#content.add_product form select.select_cat_child').css('display', 'none');
        $(this).nextAll(selector).slideToggle();
    })
})