<?php

function construct() {
//    echo "DÙng chung, load đầu tiên";
    load_model('index');
}

function list_productAction() {
    load_view('index');
}
function add_productAction(){
    load_view('add_product');
}
function cat_productAction(){
    load_view('cat_product');
}


