<?php
load('helper', 'validation');
function print_field_ok($error, $field)
{
    global $$field;
    if (!empty($error) && empty($error[$field])) echo $$field;
}

function add_cat_post($data){
    if (!empty($data))
        db_insert('`tbl_cat_posts`', $data);
    else return false;
}
function check_isset_cat($name_cat_post)
{
    $check = db_fetch_row("SELECT * FROM `tbl_cat_posts` WHERE `name_cat`='$name_cat_post'");
    if($check>0)return false;
    return true;
}
function get_list_cat_posts(){
    return db_fetch_array("SELECT * FROM `tbl_cat_posts`");
}
function check_has_child($data,$id){
    if(!empty($data)){
        foreach($data as $cat_post){
            if($cat_post['cat_father_id'] == $id)return true;
        }
    }
    return false;
}
function tree_cat_posts($list_cat_posts , $cat_father_id = 0, $level = 0)
{
    if(!empty($list_cat_posts)){
        $result = array();
        $result_child = array();
        foreach($list_cat_posts as $cat_post){
            if($cat_post['cat_father_id'] == $cat_father_id) {
                $cat_post['level'] = $level;
                $result[] = $cat_post;
                if(check_has_child($list_cat_posts,$cat_post['id']))
                {
                    $result_child =  tree_cat_posts($list_cat_posts,$cat_post['id'],$level + 1);
                    $result = array_merge($result, $result_child);
                }
            }
        }
        return $result;
    }
}

function get_cat_father_by_id($data,$cat_father_id)
{
    if(!empty($data)){
        foreach($data as $item){
            if($item['id'] == $cat_father_id)
             return $item['name_cat'];
        }
        return "Không";
    }
}
// function  tree_cat_posts($list_cat_posts , $cat_father_id = 0){

// }
?>