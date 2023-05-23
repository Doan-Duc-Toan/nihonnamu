<?php
function is_fullname($fullname){
    $regex = "/^[ A-Za-z0-9ÂĂÔƠƯÊẤẦẨẬẮẰẶẲỐỒỔỘỚỜỞỢỪỨỰỬẾỀỂỆăắặằẳấầâẩậổốồộôơớờởợỡẴẪỖỠỮỄẵẫữưửừựứễềếểệêđĐáàạảãéèẹẻẽíìịĩỉóòọỏõúùủũụýỳỵỷỹÁÀẠẢÃÉÈẸẺẼÍÌỊỈĨÓÒỌỎÕÚÙỤỦŨ]{3,50}$/";
    if(!preg_match($regex,$fullname)) return false;
    return true;
}
function is_username($username){
    $regex = "/^[A-Za-z0-9]{8,32}$/";
    if(!preg_match($regex,$username))return false;
    return true;
}

function is_password($password){
    $regex = "/^([A-Z]{1})(([\w_\.!@#$%^&*()]{0,})([_\.!@#$%^&*()])+([\w_\.!@#$%^&*()]){0,})$/";
    if(!preg_match($regex,$password))return false;
    return true;
}

function is_email($email){
    $regex = "/^([A-Za-z0-9_]{6,32})@([A-Za-z0-9]{2,12}).([A-Za-z]{2,12})$/";
    if(!preg_match($regex,$email))return false;
    return true;
}

function is_phone_number($phone_number){
    $regex = "/^((09|08|03)([1-5]{1}))+([0-9]{7})$/";
    if(!preg_match($regex,$phone_number))return false;
    return true;
}
function is_name($name){
    $regex = "/^[ A-Za-z0-9ÂĂÔƠƯÊẤẦẨẬẮẰẶẲỐỒỔỘỚỜỞỢỪỨỰỬẾỀỂỆăắặằẳấầâẩậổốồộôơớờởợỡẴẪỖỠỮỄẵẫữưửừựứễềếểệêđĐáàạảãéèẹẻẽíìịĩỉóòọỏõúùủũụýỳỵỷỹÁÀẠẢÃÉÈẸẺẼÍÌỊỈĨÓÒỌỎÕÚÙỤỦŨ]{3,50}$/";
    if(!preg_match($regex,$name))return false;
    return true;
}
?>