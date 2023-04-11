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

<body class="bg-[#E5E5E5]">
    <div class="container mx-auto">
        <div class="mt-[21px]">
            <p class="text-[40px] ">ALL PRODUCTS</p>
            <select id="" class="my-[39px] border-[#F97316] border-2 rounded-2xl text-[24px] py-[5px] px-[15px]">
            <?php
                foreach ($list_cata as $cata) { extract($cata) ?>
                    <option value="<?php echo $cata_name ?>"><?php echo $cata_name ?></option>
                    <?php }
                ?>
            </select>
        </div>
        <div class="list_product grid grid-cols-3 mt-12 justify-between gap-10">
        <?php 
            foreach ($list_pro as $pro) { extract($pro) ?>
              <div class="group bg-white rounded-md h-fit w-auto">
                <a href="index.php?act=detail_pro&pro_id=<?php echo $pro['id']?>">
                    <img class="w-full"src="./img/<?php echo $image_link?>" alt="">
                 </a>
                <div class="ml-[21px]">
                    <p class="text-[24px] py-[10px]"><?php echo $pro_name?></p>
                    <p class="text-[#6D6D6D] text-[20px] pb-2"><?=$cata_name?></p>
                    <p class="text-[16px] mb-4"><?php echo $price ." đ"?></p>
                    <div class="hidden group-hover:block ml-[33px]">
                    <form class="bg-[orange] font-[700] text-center w-[200px] text-[18px]" action="<?php if(isset($_SESSION['user'])) echo "index.php?act=addtocard"; else echo "index.php?act=signin"?>" method="post">
                        <input type="hidden" name="image" value="<?=$image_link?>">
                        <input type="hidden" name="id" value="<?=$id?>">
                        <input type="hidden" name="price" value="<?=$price?>">
                        <input type="hidden" name="pro_name" value="<?=$pro_name?>">
                        <input type="hidden" name="user" value="<?php if(isset($_SESSION['user'])) echo $_SESSION['user']['id'] ?>">
                        <input type="submit" name="addtocard" value="ADD TO CARD">
                    </form>
                  </div>
                    
                </div>
            </div>
           <?php }
        ?>
        </div>
    </div>
      
</body>
