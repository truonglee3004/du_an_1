<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
   <style>
    body{
        font-family:
    }
   </style> 
</head>
<body>
    <div class="container bg-[#E5E5E5] max-w-full mx-auto mb-[100px] h-[2748px]">
        <p class="invisible">.</p>
        <div class="content  mx-auto w-[939px] h-[984px] bg-[#B4B2B2] rounded-[46px] mt-[356px] p-[26px]">            
            <div class="text-center">
                <div class="">
                    <p class="text-[48px] font-[800]">LOGIN FROM</p>
                </div>
            </div>
            <div class="">
                <div class="mt-[46px] w-[729px] mx-auto bg-[#F97316] h-[113px] rounded-[50px] pt-[32px]">
                    <a href="" class="text-[36px] font-[660] px-[118.5px] bg-[#FA9550] py-[34px] rounded-[50px]">LOGIN</a>
                    <a href="index.php?act=signup" class="text-[36px] font-[600]  px-[118.5px] hover:bg-[#FA9550] py-[34px] hover:rounded-[50px]">SIGN UP</a>
                </div>
            </div>
                <form action="index.php?act=signin" method="post" autocomplete="off">
                    <div class="email mt-[87px]">
                        <input type="email" name="email" id="email"
                        placeholder="EMAIL ADDRESS"
                        class="block border border-[#37A9CD] bg-[#D9D9D9]  w-[834px] mx-auto  h-[90px] rounded-[30px]"
                        >
                    </div> <!-- End .eamil-->
                    <div class="password mt-[90px]">
                        <input type="password" name="password" id="password"
                        placeholder="PASSWORD"
                        class="block border border-[#37A9CD] bg-[#D9D9D9]  w-[834px] mx-auto h-[90px] rounded-[30px]"
                        >
                    </div> <!--End .password-->
                    <div class="mt-[50px] text-[20px] font-[400] text-[#FF0000] ml-[39px]">
                        <a href="">
                        FORGOT PASSWORD?
                        </a>
                     </div>
                    <div class="bg-[#FA9550] w-[834px] mx-auto rounded-[20px] h-[90px] text-[28px] mt-[38px]">
                        <input type="submit" name="sign_in" value="LOGIN"
                            class="block w-full mt-[30px] rounded-[20px]  py-[21px] text-[#FFFFFF] font-[700]">
                    </div>
                    <?php
                        if(isset($thong_bao)) echo $thong_bao;
                    ?>
                </form>
                <div class="mt-[50px] text-center text-[24px] font-[500]">
                    <span class=" text-[#000000]">
                        NOT A MEMBER?
                    </span>
                    <a href="" class="text-[#FF6C01]">
                        SIGN UP NOW
                    </a>
                </div>
            
        </div>
    </div><!-- End .container-->    
</body>

</html>