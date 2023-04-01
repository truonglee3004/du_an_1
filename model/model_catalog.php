<?php
// Thêm danh mục
    function add_cate($cate_name){ 
        $sql_add_cate = "INSERT INTO `catalog` VALUES (NULL, '$cate_name')";
        connect($sql_add_cate);
    }
 // Hàm lấy tất cả danh mục
    function queryAll(){
        $query_cate = "SELECT * FROM `catalog` ORDER BY id";
        $list_cate = getAll($query_cate);
        return $list_cate;
    }
// Hàm lấy 1 danh mục
    function queryOne($cate_id){ 
        $query_one_cate = "SELECT * FROM `catalog`  WHERE id = '{$cate_id}'";
        $one_cate = getOne($query_one_cate);
        return $one_cate;
    }

// Hàm cập nhật danh mục    
    function update_cate($cate_id, $cate_name){ 
        $update_cate = "UPDATE `catalog` SET cata_name = '{$cate_name}' WHERE id = '{$cate_id}'";
        connect($update_cate);
    }
// Hàm xóa danh mục theo id    
    function delete_cate($cate_id){ 
        $delete_cate = "DELETE FROM `catalog` WHERE id = '{$cate_id}'";
        connect($delete_cate); 
    }

?>