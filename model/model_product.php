
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
?>