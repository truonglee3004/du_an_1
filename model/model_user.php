<?php
    function add_user($email, $fullName, $password, $repass){
        $sql = "INSERT INTO `users` (`user_id`, `user_email`, `user_name`, `user_pass`, `user_repass`, `user_role`) VALUES (NULL, '{$email}', '{$fullName}', '{$password}', '{$repass}', '0');";
        connect($sql);
    }
    function queryAllUser(){
        $sql = "SELECT * FROM `users` WHERE 1";
        $list_user = getAll($sql);
        return $list_user;
    }
    function queryOneUser($email, $password){
        $sql = "SELECT * FROM `users` WHERE user_email = '{$email}' AND user_pass = '{$password}'" ;
        $info_one_user = getOne($sql);
        return $info_one_user;
    }
    function edit_user($user_id, $email, $fullName, $password, $repass){
        $sql = "UPDATE `users` SET user_email='{$email}', user_name='{$fullName}', user_pass='{$password}', user_repass='{$repass}' WHERE user_id='{$user_id}'";
        // UPDATE `users` SET `user_name` = 'dungxibo update', `user_pass` = '12345678', `user_repass` = '12345678' WHERE `users`.`user_id` = 3;
        connect($sql);
    }
    function add_card($pro_id,$pro_price,$img,$user_id,$soluong,$ttien){ 
        $sql_add_cate = "INSERT INTO `donhang` (`id`, `pro_id`, `pro_price`, `pro_image`, `user_id`, `amount`, `payment`) VALUES (NULL, '{$pro_id}' ,'{$pro_price}','{$img}','{$user_id}', '{$soluong}', '{$ttien}');";
        connect($sql_add_cate);
    }
    function queryAllCart($user_id){
        $sql = "SELECT * FROM `donhang` WHERE user_id = '{$user_id}'";
        $list_cart = getAll($sql);
        return $list_cart;
    }
    function delete_cart($card_id ){
        $delete_pro = "DELETE FROM `donhang` WHERE id = '{$card_id}'";
        connect($delete_pro);
    }
    function delete_all_cart($user_id ){
        $delete_pro = "DELETE FROM `donhang` WHERE user_id = '{$user_id}'";
        connect($delete_pro);
    }
    function add_amout($card_id){ 
        $update_cate = "UPDATE `donhang` SET amount = amount + 1, payment = amount * pro_price  WHERE id = '{$card_id}'";
        connect($update_cate);
    }
    function add_amout_dl($pro_id, $user_id){ 
        $update_cate = "UPDATE `donhang` SET amount = amount + 1, payment = amount * pro_price  WHERE pro_id = '{$pro_id}' AND user_id = '{$user_id}'";
        connect($update_cate);
    }
    function minus_amout($card_id){ 
        $update_cate = "UPDATE `donhang` SET amount = GREATEST(amount - 1, 1), payment = amount * pro_price  WHERE id = '{$card_id}'";
        connect($update_cate);
    }
    function checkDuplicate($pro_id, $user_id) {
        $sql = "SELECT COUNT(*) as count FROM donhang WHERE pro_id = '$pro_id' AND user_id = '$user_id'";
        $result =  getAll($sql);
        $count = isset($result[0]['count']) ? (int) $result[0]['count'] : 0;
        if ($count > 0) {
            return true; // có bản ghi bị trùng lặp
        } else {
            return false; // không có bản ghi bị trùng lặp
        }
    }
?>