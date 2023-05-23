<?php
function check_element($element, $num_element_per_page, $current_page)
{
    if ($element > $num_element_per_page * ($current_page - 1) && $element <= $num_element_per_page * $current_page)
        return  true;
    return  false;
}
# Hàm thanh phân trang
// các tham số:
// $mod: module hiện tại
// $act: action hiện tại
// $current_page: trang hiện tại
// $num_page: tổng số trang
// $num_box_per_page: số ô phân trang ở mỗi trang
//$tail: đuôi thêm ở cuối url(Có thể là keyword, id, btn_search, ...)
// Hàm trả về thanh phân trang
function pagination_page($mod, $act, $current_page, $num_page, $num_box_per_page,$tail='')
{
    //Tạo ô prev_page
    $prev_page = $current_page - 1;
    if ($current_page != 1) $link_prev = "?mod=$mod&action=$act&page=$prev_page$tail";
    else $link_prev = "?mod=$mod&action=$act$tail";
    //Tạo ô next_page
    $next_page = $current_page + 1;
    if ($current_page != $num_page) $link_next = "?mod=$mod&action=$act&page=$next_page$tail";
    else $link_next = "?mod=$mod&action=$act&page=$num_page$tail";
    //Tạo chuổi các ô pagination_page
    $string_paginations = "<ul><li class='prev'><a href='$link_prev'><i class='fa-solid fa-backward'></i></a></li>";
    if ($current_page % $num_box_per_page != 0) $count = floor($current_page / $num_box_per_page) + 1;
    else $count = $current_page / $num_box_per_page;
    for ($i = $num_box_per_page * ($count - 1) + 1; $i <= $num_box_per_page * $count; $i++) {
        $link_current = "?mod=$mod&action=$act&page=$i$tail";
        if ($i != $current_page)
            $string_paginations .= "<li class='pagination_page'><a href='$link_current'>$i</a></li>";
        else
            $string_paginations .= "<li class='pagination_page current_page'><a href='$link_current'>$i</a></li>";

        if ($i == $num_page) break;
    }
    $string_paginations .= "<li class='next'><a href='$link_next'><i class='fa-solid fa-forward'></i></a></li></ul>";
    return $string_paginations;
}
