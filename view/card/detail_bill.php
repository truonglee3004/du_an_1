<?php 
    // show_array($detail_pro);
    // show_array($similar_pro);
    // show_array($list_cate);
?>
<?php
    // show_array($list_cate);
?>

<div class="bg-[#DBDBDB] w-full px-[74px]">

<?php if(isset($thong_bao)) echo "<p class='text-red-500'>".$thong_bao."</p>"?>
<div class="list_cate mt-6 w-full">
    <table class="w-full mx-auto ">
        <tr>
            <p class="p-3 text-[40px] border rounded-md pt-[58px]">
                CHI TIẾT ĐƠN HÀNG
            </p>
        </tr>
        <tr class="py-2 text-center text-black text-[28px]" >
            <td title="Mã loại hàng" class="w-[15%]"></td>
            <td title="Mã loại hàng" class="w-[20%]">PRODUCTS</td>
            <td title="Mã loại hàng" class="w-[20%]">PRICE</td>
            <td title="Tên loại hàng" class="w-[15%]">QUANTITY</td>
            <td title="Tên loại hàng" class="w-[15%]">TOTAL CASH</td>
        </tr>
        <?php
            foreach ($detail_bill as $bill){
                extract($bill);
            
        ?>
            <tr class="show ">
                <td class="text-center"><img class="w-[200px] h-[250px]" src="img/<?=$pro_image?>" alt=""></td>  
                <td class="text-center"><?=$pro_name ?></td>
                <td class="text-center"><?=$pro_price ?></td>
                <td class="text-center"><?=$amount?></td>  
                <td class="text-center"><?php echo $payment?></td> 
            </tr>
        <?php
           }
        ?>
             <!-- <tr>
                <td class="text-center" colspan="5">Tổng số tiền</td>
                <td class="text-center">></td>
            </tr> -->
           
    </table>
    <div class="mt-[35px] flex justify-between">
        <div>
            <p class="text-[24px]">CHÚ THÍCH</p>
        </div>
        <div class="text-[black] font-[600] texx-[24px] flex">
            <p>Tổng Tiền:</p>
            <p class="ml-[5px]"></p>
        </div>
    </div>
    <div class="action w-full mx-auto mt-4 space-x-1 flex">
       <a href="index.php?act=bill">Đặt Hàng</a>
                    <a onclick="return confirm('Bạn có chắc chắn muốn xóa?')"
                        href="index.php?act=delete_card">Xóa Giỏ Hàng</a>

    </div> <!-- End .action -->
</div> <!-- End .list_cate-->
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body{
            font-family: 'Roboto', sans-serif;

        }
        table{
            border-collapse: collapse;
        }
        tr>td{
            padding: 42px 0;
            border-bottom: 1px solid gray;
            border-top: 1px solid gray;
        }

     
    </style>
</script>
</head>        
