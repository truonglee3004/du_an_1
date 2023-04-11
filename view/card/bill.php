
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng kí</title>
    <!-- Font inter Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link 
    href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800&display=swap" 
    rel="stylesheet">

    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>
    <div class="container mt-11 sm:w-[500px] md:w-[400px] mx-auto ">
        <div class="text-center">
            <div class=" sm:text-2xl md:text-base font-semibold">
                <p>Thông tin người đặt hàng</p>
            </div>
        </div>
        <div class="mt-8 sm:text-xl md:text-base">
            <?php
                if(isset($_SESSION['user']) && is_array($_SESSION['user']) ){
            ?>
            <form action="index.php?act=billconfirm" method="post">
                <div class="email">
                    <label for="email" class="block text-slate-600 font-[600]">Email</label>
                    <input 
                            type="email" id="email" name="email" readonly value="<?php echo $_SESSION['user']['user_email']?>"
                            class="border border-[#37A9CD] p-4 w-full mt-[11px] rounded-[5px]">
                </div> <!--End .email-->
                <div class="fullname">
                    <label for="fullname" class="block text-slate-600 font-[600] mt-3">Người Đặt Hàng</label>
                    <input 
                            type="text" id="fullName" name="userName"  value="<?php echo $_SESSION['user']['user_name']?>"
                            placeholder="John.snow"
                            class="block border border-[#37A9CD] p-4 w-full mt-[11px] rounded-[5px]">
                </div> <!--End .fullname-->
                <div class="password">
                    <label for="password" class="block text-slate-600 font-[600] mt-3">Phone</label>
                    <input 
                            type="text" id="password" name="phone" value="<?php echo $_SESSION['user']['user_phone']?>"
                            placeholder=""
                            class="block border border-[#37A9CD] p-4 w-full mt-[11px] rounded-[5px]">
                </div> <!--End .password-->
                <div class="repass">
                    <label for="repass" class="block text-slate-600 font-[600] mt-3"> 
                        Address
                    </label>
                    <input 
                            type="text" id="repass" name="address" value="<?php echo $_SESSION['user']['address']?>"
                            placeholder="Your Address"
                            class="block border border-[#37A9CD] p-4 w-full mt-[11px] rounded-[5px]">
                </div> <!--End .repass-->
                <div class="radio">
                    <label for="repass" class="block text-slate-600 font-[600] mt-3"> 
                        Phương Thức Thanh Toán
                    </label>
                    <input  type="radio" id="repass" name="pttt" value="1" checked> Trả tiền khi nhận hàng
                    <input  type="radio" id="repass" name="pttt" value="2"> Chuyển khoản ngân hàng
                    <input  type="radio" id="repass" name="pttt" value="3"> Thanh toán online
                </div> <!--End .repass-->
            <?php }?>
                <div>
                    <table class="w-full mx-auto ">
            <tr>
                <p class="p-3 text-[40px] border rounded-md pt-[58px]">
                    SHOPPING CART
                </p>
                <div class="flex"><p><?php if(isset($thongbao)) echo $thongbao ;?></p></div>
            </tr>
            <tr class="py-2 text-center text-black text-[28px]" >
                <td title="Mã loại hàng" class="w-[15%]"></td>
                <td title="Mã loại hàng" class="w-[20%]">PRODUCTS</td>
                <td title="Mã loại hàng" class="w-[20%]">PRICE</td>
                <td title="Tên loại hàng" class="w-[15%]">QUANTITY</td>
                <td title="Tên loại hàng" class="w-[15%]">TOTAL CASH</td>
            </tr>
            <?php
                $tong = 0;
                foreach ($list_cart as $card){
                    extract($card);
                $tong += $payment;
                
            ?>
                <tr class="show ">
                    <td class="text-center" name="pro_image"><img class="w-[200px] h-[250px]" src="img/<?=$pro_image?>" alt=""></td>  
                    <td class="text-center" name="pro_name"><?=$pro_name ?></td>
                    <td class="text-center" name="pro_price"><?=$pro_price ?></td>
                    <td class="text-center" name="pro_amount"><div class="w-[192px] h-[51px] py-[5px] mx-auto bg-[#FDF6F6] text-[24px]"><?=$amount?></td>  
                    <td class="text-center" name="pro_payment"><?php echo $payment?></td> 
                </tr>
            <?php
                }
            ?>
                <input type="hidden" name="tong" value="<?=$tong?>">
                
                
        </table>
        <div class="mt-[35px] flex justify-between">
            <div>
                <p class="text-[24px]">CHÚ THÍCH</p>
            </div>
            <div class="text-[black] font-[600] texx-[24px] flex">
                <p>Tổng Tiền:</p>
                <p class="ml-[5px]"><?=$tong?></p>
            </div>
        </div>
        <div class="mt-8 sm:text-2xl md:text-base bg-[#37A9CD] ">
            <input type="hidden" name="user_id" value="<?php echo $_SESSION['user']['id']?>">
            <input type="hidden" name="password" value="<?php echo $_SESSION['user']['password']?>">
            <input class="py-4 w-full px-[154px]  text-[#FFFF5F] font-[600] rounded-[5px] "
                type="submit" name="thanhtoan" value="Thanh Toán">
        </div>
        </form>
    </div> <!--End .container-->
</body>

</html>
