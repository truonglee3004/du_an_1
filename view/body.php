<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="css/main.css" />
    <script src="https://cdn.tailwindcss.com"></script>
  </head>
  <body class="bg-gray-300 max-w-7xl mx-auto">
    <section class="max-w-7xl mx-auto mt-20 items-center">
      <div class="font-semibold text-3xl text-center uppercase">
        <h3>Special Deals</h3>
      </div>
      <div class="flex col-span-4 mt-12 justify-between">
        <?php foreach($spd as $sp){
          extract($sp) ?>
        <div class="group bg-white rounded-md h-fit w-auto">
          <div class="rounded-md w-[300px] h-[300px]">
            <a href="index.php?act=detail_pro&pro_id=<?php echo $pro_id?>"><img class="w-full h-[300px]" src="./img/<?=$image_link?>" alt="" /></a>
          </div>
          <div class="ml-2 pb-8">
            <div
              class="text-2xl mt-4 hover:text-orange-500 hover:no-underline w-fit"
            >
              <a href="index.php?act=detail_pro&pro_id=<?php echo $pro_id?>"><?=$pro_name?></a>
            </div>
            <div
              class="mt-2 text-gray-600 hover:text-orange-500 hover:no-underline w-fit"
            >
              <a>Nike</a>
            </div>
            <div class="flex">
              <div class="flex">
                <p class="line-through"><?=$price?></p>
                <p class="ml-[100px]  text-red-500"><?php $price = $price - ($price * $discount / 100); if($discount == 0) echo""; else echo $price ?></p>
              </div>
              <div class="hidden group-hover:block ml-[-183px] mt-[50px]">
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
        </div>
        <?php }?>
      </div>
      <div class="flex items-center flex-col">
        <button
          class="mt-20 bg-white w-32 h-10 text-2xl text-center font-semibold"
        >
          <a href="">More</a>
        </button>
      </div>
    </section>
    <section class="max-w-7xl mx-auto mt-20 items-center">
      <div class="font-semibold text-3xl text-center uppercase">
        <h3>nike</h3>
      </div>
      <div class="flex col-span-4 mt-12 justify-between">
        <?php foreach($nike as $nk){
          extract($nk) ?>
        <div class="group bg-white rounded-md h-fit w-auto">
          <div class="rounded-md w-[300px] h-[300px]">
            <a href="index.php?act=detail_pro&pro_id=<?php echo $pro_id?>"><img class="w-full h-[300px]" src="./img/<?=$image_link?>" alt="" /></a>
          </div>
          <div class="ml-2 pb-8">
            <div
              class="text-2xl mt-4 hover:text-orange-500 hover:no-underline w-fit"
            >
              <a href="index.php?act=detail_pro&pro_id=<?php echo $pro_id?>"><?=$pro_name?></a>
            </div>
            <div
              class="mt-2 text-gray-600 hover:text-orange-500 hover:no-underline w-fit"
            >
              <a>Nike</a>
            </div>
            <div class="">
              <div class="flex">
                <p class="line-through"><?=$price?></p>
                <p class="ml-[100px]  text-red-500"><?php $price = $price - ($price * $discount / 100); if($discount == 0) echo""; else echo $price ?></p>
              </div>
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
        </div>
        <?php }?>
      </div>
      <div class="flex items-center flex-col">
        <button
          class="mt-20 bg-white w-32 h-10 text-2xl text-center font-semibold"
        >
          <a href="">More</a>
        </button>
      </div>
    </section>
    <section class="max-w-7xl mx-auto mt-20 items-center">
      <div class="font-semibold text-3xl text-center uppercase">
        <h3>adidas</h3>
      </div>
      <div class="flex col-span-4 mt-12 justify-between">
        <?php foreach($adidas as $ad){
          extract($ad) ?>
        <div class="group bg-white rounded-md h-fit w-auto">
          <div class="rounded-md">
            <a href="index.php?act=detail_pro&pro_id=<?php echo $pro_id?>"><img src="./img/<?=$image_link?>" alt="" /></a>
          </div>
          <div class="ml-2 pb-8">
            <div
              class="text-2x0 mt-4 hover:text-orange-500 hover:no-underline w-fit"
            >
              <a href="index.php?act=detail_pro&pro_id=<?php echo $pro_id?>"><?=$pro_name?></a>
            </div>
            <div
              class="mt-2 text-gray-600 hover:text-orange-500 hover:no-underline w-fit"
            >
              <a href="index.php?act=detail_pro&pro_id=<?php echo $pro_id?>">Adidas</a>
            </div>
            <div class="">
            <div class="flex">
                <p class="line-through"><?=$price?></p>
                <p class="ml-[100px]  text-red-500"><?php $price = $price - ($price * $discount / 100); if($discount == 0) echo""; else echo $price ?></p>
              </div>
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
        </div>
        <?php }?>
      </div>
      <div class="flex items-center flex-col">
        <button
          class="mt-20 bg-white w-32 h-10 text-2xl text-center font-semibold"
        >
          <a href="">More</a>
        </button>
      </div>
    </section>
    <section class="max-w-7xl mx-auto mt-20 items-center">
      <div class="font-semibold text-3xl text-center uppercase">
        <h3>puma</h3>
      </div>
      <div class="flex col-span-4 mt-12 justify-between">
        <?php foreach($puma as $pm){
          extract($pm) ?>
        <div class="group bg-white rounded-md h-fit w-auto">
          <div class="rounded-md">
            <a href="index.php?act=detail_pro&pro_id=<?php echo $pro_id?>"><img src="./img/<?=$image_link?>" alt="" /></a>
          </div>
          <div class="ml-2 pb-8">
            <div
              class="text-2x0 mt-4 hover:text-orange-500 hover:no-underline w-fit"
            >
              <a href="index.php?act=detail_pro&pro_id=<?php echo $pro_id?>"><?=$pro_name?></a>
            </div>
            <div
              class="mt-2 text-gray-600 hover:text-orange-500 hover:no-underline w-fit"
            >
              <a >Puma</a>
            </div>
            <div class="">
              <div class="flex">
                <p class="line-through"><?=$price?></p>
                <p class="ml-[100px]  text-red-500"><?php $price = $price - ($price * $discount / 100); if($discount == 0) echo""; else echo $price ?></p>
              </div>
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
        </div>
        <?php }?>
      </div>
      <div class="flex items-center flex-col">
        <button
          class="mt-20 bg-white w-32 h-10 text-2xl text-center font-semibold"
        >
          <a href="">More</a>
        </button>
      </div>
    </section>
  </body>
</html>