<?php
    // show_array($list_pro);
    // show_array($list_cate);
?>

<div class="view">
    <p class="p-3 text-[28px] border bg-[#EEE] rounded-md">
        DANH SÁCH ĐƠN HÀNG
    </p>
<!-- Form tìm kiếm sản phẩm theo tên hoặc danh mục  -->
    <table class="border w-full border mt-2">
        <tr class="title bg-[#FFC0CB] py-2 border text-[17px] text-red-600 text-center" >
            <td class="w-[2%] ">ID</td>
            <td class="w-[2%] ">ID Khách</td>
            <td class="w-[7%] ">Ngày Đặt</td>
            <td class="w-[7%]">Tên</td>
            <td class="w-[5%]">Email</td>
            <!-- <td class="text-center">Giảm Giá</td> -->
            <!-- <td class="text-center w-[110px]">Ngày Tạo</td> -->
            <td class="w-[5%]">Phone</td>   
            <td class="w-[10%]">Địa Chỉ</td>
            <td class="w-[5%]">Phương Thức Thanh Toán</td>
            <td class="w-[5%]">Trạng Thái Đơn Hàng</td>
            <td class="w-[20%]">Thao Tác</td>
        </tr>
        <?php
        foreach ($list_order as $order){
            $order['pttt'] =set_pttt($order['pttt']);
            $order['status'] =set_stt($order['status'])
            ?>
            <tr class="show hover:bg-[#FFEEEE]">
                <td class="text-center"><?php echo $order['order_id']?></td>
                <td class="text-center"><?php echo $order['user_id']?></td>
                <td class="text-center"><?php echo $order['date']?></td>
                <td class="px-2"><?php echo $order['user_name']?></td>
                
                <td class="text-center"><?php echo $order['user_email']?></td>
                <td class="text-center"><?php echo $order['phone'] ?></td> 
                <td class="px-2"><?php echo $order['address']?></td>
                <td class="px-2"><?php echo $order['pttt']?></td>
                <td class="px-2"><?php echo $order['status']?></td>
                <td class="text-center leading-9">
                    <a href="index.php?act=edit_order&order_id=<?php echo $order['order_id']?>">Cập Nhật Trạng Thái</a>
                    <a href="index.php?act=detail_order&order_id=<?php echo $order['order_id']?>">Xem Chi Tiết</a>
                    <a href="index.php?act=delete_order&order_id=<?php echo $order['order_id']?>">Xóa</a>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
</div>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Loại Hàng</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;1,100;1,300;1,400;1,500&display=swap" rel="stylesheet">
    <style>
        body{
            font-family: 'Roboto', sans-serif;

        }
        table{
            border-collapse: collapse;
        }
        .title td{
            padding: 7px 0;
            border: 1px solid gray;
        }
        tr>td{
            border: 1px solid gray;
        }
        .show a{
            padding: 5px 10px;
            font-weight: 500;
            background-color: #FFC0CB;
            border: 1px solid darkgray;
            border-radius: 4px;
        }
        .show a:hover{
            color: rgb(239 68 68);
        }
        .action>input{
            background-color: #FFC0CB;
            padding: 5px 15px;
            border-radius: 4px;
        }
        .action>input:hover{
            color: rgb(239 68 68);
            font-weight: 500;
        }
    </style>
</head>        