<?
    function add_card($pro_id,$img,$user_id,$soluong,$ttien){ 
        $sql_add_cate = "INSERT INTO `donhang` (`id`, `pro_id`'pro_image' `user_id`, `amount`, `payment`) VALUES (NULL'{$pro_id}','{$img}','{$user_id}', '{$soluong}', '{$ttien}')";
        connect($sql_add_cate);
    }
?>