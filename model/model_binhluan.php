<?php 
    function add_binhluan($noi_dung,$user_id,$pro_id,$ngay_bl){ 
        $sql_add_cate = "INSERT INTO `comment` (`content`, `user_id`, `pro_id`, `comment_date`) VALUES ('{$noi_dung}','{$user_id}', '{$pro_id}', '{$ngay_bl}')";
        connect($sql_add_cate);
    }
    function queryAllcm($idpro){
        $query_cate = "SELECT * FROM `comment` INNER JOIN `user` ON comment.user_id = user.id WHERE pro_id = '{$idpro}' ORDER BY id_bl";
        $list_binhluan = getAll($query_cate);
        return $list_binhluan;
    }
    function queryAllbl($idpro){
        $query_cate = "SELECT * FROM `comment` INNER JOIN `user` ON comment.user_id = user.id WHERE 1";
        if($idpro > 0) {$query_cate.=" AND pro_id ='".$idpro."'";}
        $list_binhluan = getAll($query_cate);
        return $list_binhluan;
    }
    function delete_binhluan($id_bl ){
        $delete_pro = "DELETE FROM `comment` WHERE bl_id = '{$id_bl}'";
        connect($delete_pro);
    }
?>