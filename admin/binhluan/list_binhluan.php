<?php
    // show_array($list_cate);
?>

<p class="p-3 text-[28px] border bg-[#EEE] rounded-md">
                QUẢN LÝ BÌNH LUẬN
</p>
<?php if(isset($thong_bao)) echo "<p class='text-red-500'>".$thong_bao."</p>"?>
<div class="list_cate mt-6 w-full">
    <table class="border w-full mx-auto ">
        <tr class="bg-[#FFC0CB] py-2 border text-center text-red-600" >
            <td title="Mã loại hàng" class="w-[140px]">ID</td>
            <td title="Tên loại hàng" class="">Nội Dung</td>
            <td title="Hành động" class="w-[120px]">Tên khách hàng</td>
            <td title="Hành động" class="w-[120px]">ID sản phẩm</td>
            <td title="Hành động" class="w-[120px]">Ngày Bình luận</td>
            <td title="Hành động" class="w-[120px]">Thao Tác</td>
        </tr>
        <?php
            foreach ($list_binhluan as $bl){
        ?>
            <tr class="show ">
                <td class="text-center"><?php echo $bl['bl_id']?></td>
                <td class="pl-[20px] hover:bg-[#FFEEEE]" title="<?php echo $bl['content']?>"><?php echo $bl['content']?></td>
                <td class="text-center"><?php echo $bl['user_name']?></td>
                <td class="text-center"><?php echo $bl['pro_id']?></td>
                <td class="text-center"><?php echo $bl['comment_date']?></td>
                <td class="text-center">
                    <a onclick="return confirm('Bạn có chắc chắn muốn xóa?')"
                        href="index.php?act=delete_binhluan&id_bl=<?php echo $bl['bl_id']?>">Xóa</a>
                </td>
            </tr>
        <?php
            }
        ?>
    </table>
</div> <!-- End .list_cate-->
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
        tr>td{
            padding: 7px 0;
            border: 1px solid gray;
        }
        .show a{
            padding: 4px 8px;
            margin-right: 5px;
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
            font-weight:500;
        }
    </style>
</head>        