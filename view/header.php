<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>DỰ ÁN 1</title>
    <link rel="stylesheet" href="css/main.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.2/iconify-icon.min.js"></script>
</head>

<body>
    <header class="relative container mx-auto p-6 bg-white mw-100 items-center">
        <div class="flex items-center justify-around gap-x9">
            <div class="searchbox">
                <input type="search" placeholder="Search......" name="search" class="searchbox-input" required />
                <input type="submit" class="hidden" />
                <span class="searchbox-icon"><iconify-icon icon="ic:outline-search" width="26"></iconify-icon></span>
            </div>
            <script>
                $(document).ready(function() {
                    var isOpen = false;
                    $(".searchbox-icon").click(function() {
                        if (isOpen == false) {
                            $(".searchbox").addClass("searchbox-open");
                            $(".searchbox-input").focus();
                            isOpen = true;
                        } else {
                            $(".searchbox").removeClass("searchbox-open");
                            $(".searchbox-input").focusout();
                            isOpen = false;
                        }
                    });
                    $(".searchbox-icon").mouseup(function() {
                        return false;
                    });
                    $(".searchbox").mouseup(function() {
                        return false;
                    });
                    $(document).mouseup(function() {
                        if (isOpen == true) {
                            $(".searchbox-icon").css("display", "block");
                            $(".searchbox-icon").click();
                        }
                    });

                    function buttonUp() {
                        var inputVal = $(".searchbox-input").val();
                        inputVal = $.trim(inputVal).length;
                        if (inputVal !== 0) {
                            $(".searchbox-icon").css("display", "none");
                        } else {
                            $(".searchbox-input").val("");
                            $(".searchbox-icon").css("display", "block");
                        }
                    }
                    $("input").keyup(function() {
                        buttonUp();
                    });
                });
            </script>
            <div>
                <a href="">
                    <img src="./img/logo.png" alt="">
                </a>
                <?php
                    if(isset($_SESSION['user'])){
                    $list_cart = queryAllCart($_SESSION['user']['id']);
                    }
                ?>
            </div>
            <div class="flex">
                <div class="<?php if(isset($_SESSION['user'])) echo "group"; else echo ""; ?>">
                    <a  href="<?php if(!isset($_SESSION['user'])) echo "index.php?act=signin"; else echo "#";?>"><iconify-icon icon="material-symbols:person" width="26"></iconify-icon><?php if(isset($_SESSION['user'])) echo $_SESSION['user']['user_name'];?></a>
                    <ul class="hidden bg-white absolute z-10 group-hover:block">
                        <li><a class="block px-4 py-2 text-gray-800 hover:bg-gray-400" href="#">Đổi mật khẩu</a></li>
                        <li><a class="block px-4 py-2 text-gray-800 hover:bg-gray-400" href="index.php?act=edit_acc">Cài đặt tài khoản</a></li>
                        <li><a class="block px-4 py-2 text-gray-800 hover:bg-gray-400" href="index.php?act=mybill">Đơn hàng của tôi</a></li>
                        <?php 
                            if(($_SESSION['user']['roles']) == 0){
                        ?>
                            <li><a class="block px-4 py-2 text-gray-800 hover:bg-gray-400" href="admin/index.php">Đăng nhập Admin</a></li>
                        <?php }?>
                        <li><a class="block px-4 py-2 text-gray-800 hover:bg-gray-400" href="index.php?act=logout">Đăng xuất</a></li>
                    </ul>
                </div>
                <div class="text-[20px] font-[700]"><a href="index.php?act=viewcard"><iconify-icon icon="material-symbols:shopping-cart" width="26"></iconify-icon><?php if(isset($list_cart)) echo count($list_cart);?></a></div>
            </div>
        </div>
        <nav class="flex items-center justify-center gap-x-7 mt-2">
            <a href="index.php" class="hover:text-orange-500 hover:no-underline uppercase">Home</a>
            <a href="index.php?target=products" class="hover:text-orange-500 hover:no-underline uppercase">Products</a>
            <a href="index.php?target=deal" class="hover:text-orange-500 hover:no-underline uppercase">Specials Deal</a>
            <a href="index.php?target=aboutus" class="hover:text-orange-500 hover:no-underline uppercase">About us</a>
            <a href="index.php?target=contact" class="hover:text-orange-500 hover:no-underline uppercase">Contact</a>
        </nav>
    </header>

</body>

</html>