<?php
    function add_user($email, $userName, $password){
        $sql = "INSERT INTO `user` (`id`, `user_email`, `user_name`, `password`, `roles`) VALUES (NULL, '{$email}', '{$userName}', '{$password}', '1');";
        connect($sql);
    }
    function queryAllUser(){
        $sql = "SELECT * FROM `users` WHERE 1";
        $list_user = getAll($sql);
        return $list_user;
    }
    function queryOneUser($email, $password){
        $sql = "SELECT * FROM `user` WHERE user_email = '{$email}' AND password = '{$password}'" ;
        $info_one_user = getOne($sql);
        return $info_one_user;
    }
    function edit_user($user_id, $email, $userName, $phone, $address){
        $sql = "UPDATE `user` SET user_email='{$email}', user_name='{$userName}', user_phone='{$phone}', address='{$address}' WHERE id='{$user_id}'";
        // UPDATE `users` SET `user_name` = 'dungxibo update', `user_pass` = '12345678', `user_repass` = '12345678' WHERE `users`.`user_id` = 3;
        connect($sql);
    }
    function add_card($pro_id,$pro_price,$pro_name,$img,$user_id,$soluong,$ttien){ 
        $sql_add_cate = "INSERT INTO `transaction` (`id`, `pro_id`, `pro_price`, `pro_name`, `pro_image`, `user_id`, `amount`, `payment`) VALUES (NULL, '{$pro_id}' ,'{$pro_price}','{$pro_name}','{$img}','{$user_id}', '{$soluong}', '{$ttien}');";
        connect($sql_add_cate);
    }
    function queryAllCart($user_id){
        $sql = "SELECT * FROM `transaction` WHERE user_id = '{$user_id}'";
        $list_cart = getAll($sql);
        return $list_cart;
    }
    function delete_cart($card_id ){
        $delete_pro = "DELETE FROM `transaction` WHERE id = '{$card_id}'";
        connect($delete_pro);
    }
    function delete_all_cart($user_id ){
        $delete_pro = "DELETE FROM `transaction` WHERE id = '{$user_id}'";
        connect($delete_pro);
    }
    function add_amout($card_id){ 
        $update_cate = "UPDATE `transaction` SET amount = amount + 1, payment = amount * pro_price  WHERE id = '{$card_id}'";
        connect($update_cate);
    }
    function add_amout_dl($pro_id, $user_id){ 
        $update_cate = "UPDATE `transaction` SET amount = amount + 1, payment = amount * pro_price  WHERE pro_id = '{$pro_id}' AND user_id = '{$user_id}'";
        connect($update_cate);
    }
    function minus_amout($card_id){ 
        $update_cate = "UPDATE `transaction` SET amount = GREATEST(amount - 1, 1), payment = amount * pro_price  WHERE id = '{$card_id}'";
        connect($update_cate);
    }
    function checkDuplicate($pro_id, $user_id) {
        $sql = "SELECT COUNT(*) as count FROM transaction WHERE pro_id = '$pro_id' AND user_id = '$user_id'";
        $result =  getAll($sql);
        $count = isset($result[0]['count']) ? (int) $result[0]['count'] : 0;
        if ($count > 0) {
            return true; // có bản ghi bị trùng lặp
        } else {
            return false; // không có bản ghi bị trùng lặp
        }
    }
    function add_bill($user_id,$email,$user_name,$phone,$address,$tong,$date,$pttt){
        $sql = "INSERT INTO `orders` (`order_id`, `user_id`, `user_email`, `user_name`, `phone`, `address`, `tong`, `date`, `pttt`) VALUES (NULL, '{$user_id}' ,'{$email}','{$user_name}','{$phone}','{$address}', '{$tong}', '{$date}', '{$pttt}');";
        return pdo_execute_return_lastID($sql);
    }
    function add_ctbil($user_id, $pro_id, $pro_name, $pro_price, $pro_image, $amount, $payment, $id_order){
        $sql = "INSERT INTO `orders_item` (`id`,`user_id`, `pro_id`, `pro_name`, `pro_price`, `pro_image`, `amount`, `payment`, `order_id`) VALUES (NULL, '{$user_id}' ,'{$pro_id}','{$pro_name}','{$pro_price}','{$pro_image}', '{$amount}', '{$payment}', '{$id_order}');";
        connect($sql);
    }
    function query_bill_userid($user_id){
        $sql = "SELECT * FROM `orders` WHERE user_id = '{$user_id}';";
        $list_bill = getAll($sql);
        return $list_bill;
    }
    function set_pttt($pttt){
        switch ($pttt){
            case '1':
                $pttt = "Trả Tiền khi nhận hàng";
                break;
            case '2':
                $pttt = "Chuyển khoản ngân hàng";
                break;
            case '3':
                $pttt = "Thanh toán online";
                break;
        }
        return $pttt;
    }
    function set_stt($status){
        switch ($status){
            case '0':
                $status = "Đơn hàng mới";
                break;
            case '1':
                $status = "Đang xử lý";
                break;
            case '2':
                $status = "Đang giao hàng";
                break;
            case '3':
                $status = "Hoàn Tất";
                break;
        }
        return $status;
    }
    function queryOneBIll($bill_id){
        $query_one_pro = "SELECT * FROM orders_item WHERE order_id = '{$bill_id}'";
        $one_pro = getAll($query_one_pro);
        return $one_pro;
    }
?>