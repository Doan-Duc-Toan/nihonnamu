<?php
function show_error($error,$field)
{
    if(!empty($error[$field]))echo $error[$field];
}
?>