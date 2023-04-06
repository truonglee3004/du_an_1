
<?php
function query_nike(){
    $query_cate = "SELECT * FROM `product` WHERE catalog_id = 1 LIMIT 4";
    $list_nike = getAll($query_cate);
    return $list_nike;
}
function query_adidas(){
    $query_cate = "SELECT * FROM `product` WHERE catalog_id = 2 LIMIT 4";
    $list_nike = getAll($query_cate);
    return $list_nike;
}
function query_puma(){
    $query_cate = "SELECT * FROM `product` WHERE catalog_id = 3 LIMIT 4";
    $list_nike = getAll($query_cate);
    return $list_nike;
}
function queryOnePro($pro_id){
    $query_one_pro = "SELECT * FROM product WHERE id = '{$pro_id}'";
    $one_pro = getOne($query_one_pro);
    return $one_pro;
}
function query_similar_pro($pro_id, $cate_id){
    $sql = "SELECT * FROM `product` WHERE id <> '{$pro_id}' AND catalog_id = '{$cate_id}' ORDER BY view DESC";
    $similar_pro = getAll($sql);
    return $similar_pro;
}
function queryAllPro($key_word, $cate_id){
    $query_pro = "SELECT * FROM `product` WHERE 1";
    if($key_word != ""){
        $query_pro.= " AND pro_name like '%{$key_word}%'";
    }
    if($cate_id > 0){
        $query_pro.= " AND catalog_id = '{$cate_id}' ";
    }
    $query_pro.= " ORDER BY id";
    $list_pro = getAll($query_pro);
    return $list_pro;
}
function update_pro($pro_id, $pro_name, $pro_price, $discount, $target_file, $pro_desc, $chat_lieu, $cate_id){
    if($target_file == "../img/"){
        $update_pro = "UPDATE `product` SET pro_name='{$pro_name}', price='{$pro_price}', content = '{$pro_desc}', size = '{$chat_lieu}', discount = '{$discount}', catalog_id = '{$cate_id}' WHERE id = '{$pro_id}'";
    } else{
        $update_pro = "UPDATE `product` SET pro_name='{$pro_name}', price='{$pro_price}', image_link = '{$target_file}', content = '{$pro_desc}', size = '{$chat_lieu}', discount = '{$discount}', catalog_id = '{$cate_id}' WHERE id = '{$pro_id}'";
    }
    connect($update_pro);
}
function add_pro($pro_name, $pro_price, $target_file, $pro_desc, $giamgia, $chat_lieu, $cate_id){
    $sql_add_pro = "INSERT INTO `product` (`id`, `pro_name`, `price`, `image_link`, `content`, `size`,`discount`, `catalog_id`) VALUES (NULL, '{$pro_name}', '{$pro_price}', '{$target_file}', '{$pro_desc}', '{$chat_lieu}','{$giamgia}','{$cate_id}')";
    connect($sql_add_pro);
}
function delete_pro($pro_id ){
    $delete_pro = "DELETE FROM `product` WHERE id = '{$pro_id}'";
    connect($delete_pro);
}
?>