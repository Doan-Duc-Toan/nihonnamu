<?php
    require "lib/get_page.php";
    $page = (empty($_GET['page']))? 'home':$_GET['page'];
    get_page($page);
?>