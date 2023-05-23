<?php
function get_page($page)
{
   $path = "pages/{$page}.php";
   require "$path";
}

function get_header(){
   require "layout/header.php";
}
function get_footer(){
   require "layout/footer.php";
}
function get_sidebar(){
   require "layout/sidebar.php";
}
function get_sidebar_info(){
   require "layout/sidebar_info_user.php";
}
?>

