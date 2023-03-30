<?php
    // show_array($list_cate);
?>

<p class="p-3 text-[28px] border bg-[#EEE] rounded-md">
    Giỏ Hàng
</p>
<?php if(isset($thong_bao)) echo "<p class='text-red-500'>".$thong_bao."</p>"?>
<div class="list_cate mt-6 w-full">
    <table class="border w-full mx-auto ">
        <tr class="bg-[#FFC0CB] py-2 border text-center text-red-600" >
            <td class="w-[55px] "></td>
            <td title="Mã loại hàng" class="w-[140px]">ID Sản Phẩm</td>
            <td title="Mã loại hàng" class="w-[140px]">Ảnh</td>
            <td title="Mã loại hàng" class="w-[140px]">Đơn Giá</td>
            <td title="Tên loại hàng" class="">Số Lượng</td>
            <td title="Tên loại hàng" class="">Thành Tiền</td>
            <td title="Hành động" class="w-[120px]">Thao Tác</td>
        </tr>
        <?php
            $tong = 0;
            foreach ($list_cart as $card){
                extract($card);
            $pro_image = substr($pro_image, 3);
            $tong += $payment;
            
        ?>
            <tr class="show ">
                <td class="text-center"><input type="checkbox"></td>
                <td class="text-center"><?php echo $pro_id?></td>
                <td class="text-center"><img src="<?=$pro_image?>" alt=""></td>  
                <td class="text-center"><?=$pro_price ?></td>
              
                <td class="text-center"><a href="index.php?act=change_amount&card_id=<?=$id?>&change=minus"><i class="fa-solid fa-chevron-left"></i></a><?=$amount?><a href="index.php?act=change_amount&card_id=<?=$id?>&change=add"><i class="fa-solid fa-chevron-right"></i></a></td>  
                <td class="text-center"><?php echo $payment?></td> 
                <td class="text-center">
                    <a onclick="return confirm('Bạn có chắc chắn muốn xóa?')"
                        href="index.php?act=delete_card&card_id=<?=$id?>">Xóa</a>
                </td>
            </tr>
           
        <?php
           }
        ?>
             <tr>
                <td class="text-center" colspan="5">Tổng số tiền</td>
                <td class="text-center"><?=$tong?></td>
            </tr>
    </table>
    <div class="action w-full mx-auto mt-4 space-x-1">
        <input type="button" value="Chọn tất cả">
        <input type="button" value="Bỏ chọn tất cả">
        <input type="button" value="Xóa các mục đã chọn">
                    <a onclick="return confirm('Bạn có chắc chắn muốn xóa?')"
                        href="index.php?act=delete_card">Xóa Giỏ Hàng</a>
                </td>
    </div> <!-- End .action -->
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
     
    </style>
</script>
</head>        
