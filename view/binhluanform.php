<?php 
    session_start();
    include "../model/pdo.php";
    include "../model/model_binhluan.php";
    $idpro = $_REQUEST['idpro'];
    $dsbl = queryAllbl($idpro)
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
<body>
    <div class="category w-full mt-5">
        <p class="p-2 text-center text-xl font-sans font-semibold text-[#F54748] border-b">
            BÌNH LUẬN
        </p>
        <?php if(!isset($_SESSION['user'])){?>
            <p class="p-2 text-center text-xl font-sans font-semibold text-[#F54748] border-b">
            Đăng nhập để bình luận
        </p>
        <?php }?>
        <ul class="category_list">
        <table>
            <?php
                foreach($dsbl as $bl){
                    extract($bl);
                    echo '<tr><td class="font-bold text-[20px]">'.$user_name.'</td>';
                    echo '<td class="hidden">'.$pro_id.'</td>';
                    echo '<td class="text-[15px]">'.$comment_date.'</td><tr>';
                    echo '<td class="font-[500]">'.$content.'</td>';
                }      
            ?>   
        </table>
            <!-- 
            <li class="">
                <a class="block border-b p-2 text-lg hover:bg-[#FFEEEE] hover:text-[#F54748]" href="">Túi Đeo Chéo </a>
            </li>
            <li class="">
                <a class="block border-b p-2 text-lg hover:bg-[#FFEEEE] hover:text-[#F54748]" href="">Túi Đeo Chéo </a>
            </li> -->
        </ul> <!-- End .category_list-->
        <div class="<?php if(isset($_SESSION['user'])) echo ""; else echo"hidden ";?>search-cate mt-2 p-2 bg-[#FFEEEE]">
            <form action="<?= $_SERVER['PHP_SELF']?>" method="POST" class="flex space-x-2">
                <input type="hidden" name="idpro" value="<?=$idpro?>">
                <input require class="border w-full px-2 py-1 " title="Tìm kiếm sản phẩm, danh mục"
                        type="text" name="noidung" 
                        placeholder="Viết bình luận...">
                <input class="border px-2 py-1 text-[#F54748] bg-[#FFFFFF] hover:bg-[#FFC0CB]"
                        type="submit" name="guibinhluan" value="Đăng">
            </form> 
        </div> <!-- End .search_cate -->
        <div><?php if(isset($thongbao)) echo $thongbao;?></div>
        <?php
        if(isset($_POST['guibinhluan']) && ($_POST['guibinhluan'])){
            $noi_dung = $_POST['noidung'];
            $user_id = $_SESSION['user']['id'];
            $pro_id = $_POST['idpro'];
            $ngay_bl = date('d/m/Y');
            if(trim($noi_dung) === ""){
                $thongbao = "Test";
            }else
            {
                add_binhluan($noi_dung,$user_id,$pro_id,$ngay_bl);
                $thongbao = "";
            }
            header("Location:".$_SERVER['HTTP_REFERER']);
        }
            
        ?>
    </div>
</body>
</html>