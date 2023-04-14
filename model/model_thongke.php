<?php
    function thongke(){ 
        $query_one_cate = "SELECT  cata_name as dm,SUM(pro_price * orders_item.amount) as doanhthu  FROM `orders_item` inner join product on orders_item.pro_id = product.pro_id inner join catalog on product.catalog_id = catalog.id GROUP BY cata_name";
        $one_cate = getAll($query_one_cate);
        return $one_cate;
    }

?>