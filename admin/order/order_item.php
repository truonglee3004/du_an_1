<?php
    // show_array($list_pro);
    // show_array($list_cate);
?>

<div class="view">
    <p class="p-3 text-[28px] border bg-[#EEE] rounded-md">
        CHi TIẾT ĐƠN HÀNG<?=$one_order[0]['order_id'];?>
    </p>
<!-- Form tìm kiếm sản phẩm theo tên hoặc danh mục  -->
    <table class="border w-full border mt-2">
        <tr class="title bg-[#FFC0CB] py-2 border text-[17px] text-red-600 text-center" >
            <td class="w-[2%] ">ID</td>
            <td class="w-[2%] ">ID Sản Phẩm</td>
            <td class="w-[7%] ">ID Khách</td>
            <td class="w-[7%]">Tên Sản Phẩm</td>
            <td class="w-[5%]">Giá</td>
            <!-- <td class="text-center">Giảm Giá</td> -->
            <!-- <td class="text-center w-[110px]">Ngày Tạo</td> -->
            <td class="w-[5%]">Hình</td>   
            <td class="w-[10%]">Số Lượng</td>
            <td class="w-[5%]">Thành Tiền</td>
        </tr>
        <?php
        foreach ($one_order as $order){
            ?>
            <tr class="show hover:bg-[#FFEEEE]">
                <td class="text-center"><?php echo $order['id']?></td>
                <td class="text-center"><?php echo $order['pro_id']?></td>
                <td class="text-center"><?php echo $order['user_id']?></td>
                <td class="px-2"><?php echo $order['pro_name']?></td>
                
                <td class="text-center"><?php echo $order['pro_price']?></td>
                <td class="text-center"><img src="../img/<?php echo $order['pro_image'] ?>" alt=""></td> 
                <td class="px-2"><?php echo $order['amount']?></td>
                <td class="px-2"><?php echo $order['payment']?></td>
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