<?php
    // show_array($list_pro);
    // show_array($list_cate);
?>

<div class="view">
    <p class="p-3 text-[28px] border bg-[#EEE] rounded-md">
        DANH SÁCH KHÁCH HÀNG
    </p>
<!-- Form tìm kiếm sản phẩm theo tên hoặc danh mục  -->
    <table class="border w-full border mt-2">
        <tr class="title bg-[#FFC0CB] py-2 border text-[17px] text-red-600 text-center" >
            <td class="w-[5%] ">ID Khách</td>
            <td class="w-[10%]">Tên</td>
            <td class="w-[8%]">Email</td>
            <!-- <td class="text-center">Giảm Giá</td> -->
            <!-- <td class="text-center w-[110px]">Ngày Tạo</td> -->
            <td class="w-[10%]">Phone</td>   
            <td class="w-[21%]">Địa Chỉ</td>

            <td class="w-[6%]">Thao Tác</td>
        </tr>
        <?php
        foreach ($list_user as $user){
            ?>
            <tr class="show hover:bg-[#FFEEEE]">
                <td class="text-center"><?php echo $user['id']?></td>
                <td class="px-2"><?php echo $user['user_name']?></td>
                
                <td class="text-center"><?php echo $user['user_email']?></td>
                <td class="text-center"><?php echo $user['user_phone'] ?></td> 
                <td class="px-2"><?php echo $user['address']?></td>
                <td class="text-center leading-9">
                    <a href="index.php?act=edit_user&user_id=<?php echo $user['id']?>">Sửa</a>
                    <a onclick="return confirm('Bạn có chắc chắn muốn xóa?')"
                        href="index.php?act=delete_user&user_id=<?php echo $user['id']?>">Xóa</a>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
    <?php if(isset($thong_bao)) echo $thong_bao ?>
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