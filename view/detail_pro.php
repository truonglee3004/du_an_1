<?php 
    // show_array($detail_pro);
    // show_array($similar_pro);
    // show_array($list_cate);
?>
<div class="container max-w-full bg-[#E5E5E5] mx-auto">
    <div class="pt-[49px] px-[61px]">
        <?php foreach($list_cata as $cata){
            extract($cata);?>
            <a class="font-[400] text-[36px] rounded-[30px] uppercase  px-[40px] py-[15px] ml-[50px]<?php if($id == $detail_pro['catalog_id']) echo " bg-[#FF6C01] text-[#000000]"; else echo " bg-[#6D6D6D] text-[#FCFAFA]";;?>" href=""><?=$cata_name?></a>
        <?php }?>
    </div>
    <div class="grid grid-cols-3 gap-x-[210px] mt-[90px] px-[100px]">
        <div class="col-span-1 w-[442px] h-[686px] rounded-[30px]"><img class="w-full h-[686px]" src="img/<?=$detail_pro['image_link']?>" alt=""></div>
        <div class="col-span-2">
            <p class="font-[600] text-[32px]"><?=$detail_pro['pro_name']?></p>
            <div class="flex mt-[70px]">
            <p class="text-[#ADB049] font-[600] text-[40px] mr-[25px]">5.0</p><img class="mr-[14px]" src="./img/sao.png" alt=""><img class="mr-[14px]" src="./img/sao.png" alt=""><img class="mr-[14px]" src="./img/sao.png" alt=""><img class="mr-[14px]" src="./img/sao.png" alt=""><img class="mr-[55px]" src="./img/sao.png" alt="">
            <p class="font-[600] text-[36px]">125 ĐÁNH GIÁ</p>
            </div>
            <div class="mt-[70px]">
            <p class="inline font-[600] text-[30px]">GIÁ BÁN :</p>
            <p class="inline font-[600] text-[48px] ml-[25px]"><?=$detail_pro['price']?> đ</p>
            </div>
            <div class="flex text-center mt-[35px]">
                <img class="w-[100px] h-[100px]" src="./img/icontran.jpg" alt="">
                <p class="font-[500] text-[20px] ml-[26px]">THỜI GIAN DỰ KIẾN QUÝ KHÁCH SẼ NHẬN ĐƯỢC HÀNG VÀO NGÀY 12-04-2023 ĐẾN 17-04-2023. NẾU QUÝ KHÁCH THANH TOÁN TRONG HÔM NAY</p>
            </div>
            <div class="bg-[white] w-[320px] font-[500] text-[24px] text-[#FF0000] h-[64px] px-[26px] py-[14px] rounded-[20px] mt-[48px]">
                <form class="" action="<?php if(isset($_SESSION['user'])) echo "index.php?act=addtocard"; else echo "index.php?act=signin"?>" method="post">
                    <input type="hidden" name="image" value="<?=$detail_pro['image_link']?>">
                    <input type="hidden" name="id" value="<?=$detail_pro['id']?>">
                    <input type="hidden" name="price" value="<?=$detail_pro['price']?>">
                    <input type="hidden" name="pro_name" value="<?=$detail_pro['pro_name']?>">
                    <input type="hidden" name="user" value="<?php if(isset($_SESSION['user'])) echo $_SESSION['user']['id'] ?>">
                    <input type="submit" name="addtocard" value="THÊM VÀO GIỎ HÀNG">
                </form>
            </div>
            <div class="bg-[#8E1111] w-[670px] font-[500] text-[40px] text-[white] h-[98px] px-[200px] py-[24px] rounded-[20px] mt-[28px]">
                <input  type="submit" value="MUA NGAY">
            </div>
        </div>
    </div>
    
        <div class="similar_pro w-5/6 mt-10 mx-auto">
            <p class="text-[22px] font-bold text-gray-700 mb-5">SẢN PHẨM TƯƠNG TỰ</p>
            <div class="grid grid-cols-5 gap-4">
                <?php foreach($similar_pro as $pro){?>
                    <div class="item text-center space-y-2">
                    <a href="index.php?act=detail_pro&pro_id=<?php echo $pro['id']?>" class="h-[300px]">
                        <img class="w-full h-[230px] mb-2 " src="./img/<?=$pro['image_link']?>" alt="">
                    </a>
                    <a href="index.php?act=detail_pro&pro_id=<?php echo $pro['id']?>"
                        class="">
                        <span class="px-3 font-[500] text-[20px] text-teal-800"><?php echo $pro['pro_name']?></span>
                    </a>
                    <p class="font-[600] text-red-500 "><?php echo $pro['price']?> <u>đ</u></p>
                </div><!-- End .item-->
            <?php }?>       
            </div>
        </div> <!-- End .similar_pro -->
        <div class="">
	<div class="text-[22px] font-bold text-gray-700 mb-5 ml-[120px] mt-[50px] ">
    	BÌNH LUẬN
    </div>
    <div class="ml-[120px] rounded">
        <form name="">
        	<input type="text" name="name" placeholder="Name..."/></br></br>
            <textarea name="comments" placeholder="nội dung bình luận..." style="width:635px; height:100px;"></textarea></br></br>
            <a href="#" onClick="commentSubmit()" class="w-[40px] h-[40px] bg-slate-700 text-white rounded">Gửi</a></br>
        </form>
    </div>
    </div>
    </div><!-- End .container-->   
   
