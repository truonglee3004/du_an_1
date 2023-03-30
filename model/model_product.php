<?php
function queryAll(){
    $query_cate = "SELECT * FROM `product` WHERE catalog_id = 1";
    $list_nike = getAll($query_cate);
    return $list_nike;
}
?>