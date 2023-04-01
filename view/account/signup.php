
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

    <script src="https://cdn.tailwindcss.com"></script>

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
                    <a href="index.php?act=signin" class="text-[36px] font-[660] px-[118.5px] hover:bg-[#FA9550] py-[34px] hover:rounded-[50px]">LOGIN</a>
                    <a href="index.php?act=signup" class="text-[36px] font-[600]  px-[118.5px] bg-[#FA9550] py-[34px] rounded-[50px]">SIGN UP</a>
                </div>
            </div>
            <div class="">
                <form action="index.php?act=signup" method="post">
                    <div class="email mt-[30px]">
                        <input 
                                type="email" id="email" name="email"
                                placeholder="EMAIL ADDRESS"
                                class="block mx-auto border border-[#37A9CD] bg-[#D9D9D9] p-4 w-[834px] h-[90px] rounded-[30px]">
                    </div> <!--End .email-->
                    <div class="fullname mt-[30px]">
                        <input 
                                type="text" id="fullName" name="userName"
                                placeholder="USER NAME"
                                class="block border border-[#37A9CD] bg-[#D9D9D9] p-4 w-[834px] h-[90px] mx-auto rounded-[30px]">
                    </div> <!--End .fullname-->
                    <div class="password mt-[30px]">
                        <input 
                                type="password" id="password" name="password"
                                placeholder="PASSWORD"
                                class="block border border-[#37A9CD] bg-[#D9D9D9] p-4 w-[834px] mx-auto h-[90px] rounded-[30px]">
                    </div> <!--End .password-->
                    <div class="repass mt-[30px]">
                        <input 
                                type="password" id="repass" name="repass"
                                placeholder="RE-PASSWORD"
                                class="block border border-[#37A9CD] bg-[#D9D9D9] p-4 w-[834px] mx-auto h-[90px] rounded-[30px]">
                    </div> <!--End .repass-->

                    <div class="bg-[#FA9550] w-[834px] mx-auto rounded-[20px] h-[90px] text-[28px] mt-[38px]">
                        <input class="py-5 w-full px-[154px] bg-[#37A9CD] text-[#FFFFFF] font-[600] rounded-[30px] "
                            type="submit" name="sign_up" value="Create Now">
                    </div>
                </form>
                <?php if(isset($thong_bao)) echo $thong_bao?>
            </div>
        </div>
    </div> <!--End .container-->
</body>

</html>
