<?php
    // show_array($list_cate);
?>

<div class="bg-[#DBDBDB] w-full px-[74px]">

<?php if(isset($thong_bao)) echo "<p class='text-red-500'>".$thong_bao."</p>"?>
<div class="list_cate mt-6 w-full">
    <table class="w-full mx-auto ">
        <tr>
            <p class="p-3 text-[40px] border rounded-md pt-[58px]">
                MY ORDER
            </p>
        </tr>
        <tr class="py-2 text-center text-black text-[28px]" >
            <td title="Mã loại hàng" class="w-[10%]">Mã Đơn Hàng</td>
            <td title="Tên loại hàng" class="w-[10%]">Ngày Đặt</td>
            <td title="Mã loại hàng" class="w-[7%]">Người Đặt</td>
            <td title="Mã loại hàng" class="w-[10%]">Địa chỉ</td>
            <td title="Tên loại hàng" class="w-[10%]">Số Điện Thoại</td>
            <td title="Tên loại hàng" class="w-[10%]">Hình Thức Thanh Toán</td>
            <td title="Tên loại hàng" class="w-[10%]">Trạng Thái Đơn Hàng </td>
            <td title="Tên loại hàng" class="w-[10%]">Thành Tiền</td>
            <td title="Tên loại hàng" class="w-[22%]">Thao Tác</td>
        </tr>
        <?php
            $tong = 0;
            foreach ($list_bill as $bill){
                extract($bill);
                $pttt =set_pttt($pttt);
                $status =set_stt($status);
        ?>
            <tr class="show ">
                <td class="text-center">SP-00<?=$order_id?></td>  
                <td class="text-center"><?=$date ?></td>
                <td class="text-center"><?=$user_name ?></td>
                <td class="text-center"><?=$address ?></td>
                <td class="text-center"><?=$phone?></td> 
                <td class="text-center"><?=$pttt?></td> 
                <td class="text-center"><?=$status?></td>  
                <td class="text-center"><?=$tong?>đ</td> 
                <td class="text-center">
                    <a class="bg-[orange] rounded-[20px] p-[10px] font-bold" href="index.php?act=detail_bill&bill_id=<?=$order_id?>">Chi tiết Đơn Hàng</a>
                    <a class="bg-[orange] rounded-[20px] p-[10px] font-bold" href="<?php
if ($status == "Đang giao hàng" || $status == "Hoàn Tất") {
  echo "#";
} else if ($status == "Đơn hàng mới" || $status == "Đang xử lý"){
  echo "index.php?act=delete_bill&bill_id=$order_id";
}
?>
"><?php if($status == "Đang giao hàng" || $status == "Hoàn Tất") echo "Không thể hủy đơn hàng"; else echo"Hủy đơn hàng";?></a>
                </td> 
            </tr>
        <?php
           }
        ?>
           
    </table>
    <div class="mt-[35px] flex justify-between">
        <div>
            <p class="text-[24px]">CHÚ THÍCH</p>
        </div>
    </div>

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
