<?php
    function add_user($email, $userName, $password){
        $sql = "INSERT INTO `user` (`id`, `user_email`, `user_name`, `password`, `roles`) VALUES (NULL, '{$email}', '{$userName}', '{$password}', '1');";
        connect($sql);
    }
    function queryAllUser(){
        $sql = "SELECT * FROM `user` WHERE 1";
        $list_user = getAll($sql);
        return $list_user;
    }
    function delete_user($user_id){ 
        $delete_cate = "DELETE FROM `transaction` WHERE user_id = '{$user_id}'";
        $delete_cate1 = "DELETE FROM `orders` WHERE user_id = '{$user_id}'";
        $delete_cate2 = "DELETE FROM `orders_item` WHERE user_id = '{$user_id}'";
        $delete_cate3 = "DELETE FROM `comment` WHERE user_id = '{$user_id}'";
        $delete_cate4 = "DELETE FROM `user` WHERE id = '{$user_id}'";
        connect($delete_cate); 
        connect($delete_cate1); 
        connect($delete_cate2); 
        connect($delete_cate3); 
        connect($delete_cate4); 
    }
    function queryOneUser($email, $password){
        $sql = "SELECT * FROM `user` WHERE user_email = '{$email}' AND password = '{$password}'" ;
        $info_one_user = getOne($sql);
        return $info_one_user;
    }
    function queryOneUserByEmail($email){
        $sql = "SELECT * FROM `user` WHERE user_email = '{$email}'" ;
        $info_one_user = getOne($sql);
        return $info_one_user;
    }
    function queryOneUserByID($user_id){
        $sql = "SELECT * FROM `user` WHERE id = '{$user_id}'" ;
        $sql = getOne($sql);
        return $sql;
    }
    function update_user($user_id, $user_name,$user_email,$user_phone,$address){
        $sql = "UPDATE `user` SET user_email='{$user_email}', user_name='{$user_name}', user_phone='{$user_phone}', address='{$address}' WHERE id='{$user_id}'";
        connect($sql);
    }

    function edit_user($user_id, $email, $userName, $phone, $address){
        $sql = "UPDATE `user` SET user_email='{$email}', user_name='{$userName}', user_phone='{$phone}', address='{$address}' WHERE id='{$user_id}'";
        // UPDATE `users` SET `user_name` = 'dungxibo update', `user_pass` = '12345678', `user_repass` = '12345678' WHERE `users`.`user_id` = 3;
        connect($sql);
    }
    function update_pass($user_id, $pass){
        $sql = "UPDATE `user` SET password ='{$pass}' WHERE id='{$user_id}'";
        connect($sql);
    }
?>