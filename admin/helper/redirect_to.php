<?php
function redirect_to($mod = "home",$controller="index",$action ="index",$tails=''){
    $path = "?mod=$mod&controller=$controller&action=$action$tails";
    header("Location: $path");
}
?>