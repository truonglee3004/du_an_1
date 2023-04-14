
 

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
            <form action="index.php?act=list_pro" method="post" class="mt-3 flex justify-between items-center space-x-3 mb-2">
        <input class="border w-[300px] py-1 px-2" placeholder="Tìm kiếm sản phẩm"
               type="text" name="key_word" value="<?php echo (isset($key_word) && !empty($key_word)) ? $key_word : "";?>" >
        <div>
            <!-- <p>Showing</p> -->
            <span class="font-[500] text-gray-800">Showing all <?php echo count($list_pro)?> results</span>
            <select name="cate_id" id="" class="border py-[6px]">
                <option value="0">--Tất cả--</option>
                <?php foreach($list_cate as $cate){?>
                    <option value="<?php echo $cate['id']?>"><?php echo $cate['cata_name']?></option>
                <?php }?>
            </select>
            <input name="search_by_cate"
                class="border px-2 py-1 hover:bg-[#FFEEEE] hover:text-[#F54748]" type="submit" value="Tìm kiếm">
        </div>
        
    </form>
    <?php if(isset($key_word) && !empty($key_word)) echo "<span class='text-[19px]'>Kết quả tìm kiếm cho : </span>\""."<span class='text-xl font-[500]'>".$key_word."</span>"."\"";?>
        </div>
        <div class="list_product grid grid-cols-3 mt-12 justify-between gap-10">
        <?php 
            foreach ($list_pro as $pro) { extract($pro) ?>
              <div class="group bg-white rounded-md h-fit w-auto">
                <a href="index.php?act=detail_pro&pro_id=<?php echo $pro_id?>">
                    <img class="w-full"src="./img/<?php echo $image_link?>" alt="">
                 </a>
                <div class="ml-[21px]">
                    <p class="text-[24px] py-[10px]"><?php echo $pro_name?></p>
                    <p class="text-[#6D6D6D] text-[20px] pb-2"><?=$cata_name?></p>
                    <p class="text-[16px] mb-4"><?php echo $price ." đ"?></p>
                    <div class="hidden group-hover:block ml-[33px]">
                    <form class="bg-[orange] font-[700] text-center w-[200px] text-[18px]" action="<?php if(isset($_SESSION['user'])) echo "index.php?act=addtocard"; else echo "index.php?act=signin"?>" method="post">
                        <input type="hidden" name="image" value="<?=$image_link?>">
                        <input type="hidden" name="id" value="<?=$pro_id?>">
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
