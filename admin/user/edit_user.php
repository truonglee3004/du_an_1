<?php 
    // show_array($list_cate)
?>

<section class="product w-full mt-5 leading-8">
    <p class="p-3 text-[28px] border bg-[#EEE] rounded-md mb-5">
                    Sửa Thông Tin Khách Hàng
                </p>
        <form action="index.php?act=update_user" method="post" enctype="multipart/form-data">
            <div class="grid grid-cols-2 gap-x-8 gap-y-2">
                <div class="">
                    <label>ID</label>
                    <input class="border w-full rounded-[4px] px-3 h-[40px]"
                           type="text" disabled name="ma_san_pham" id="ma_san_pham"
                           placeholder="Auto number" value="<?php echo $one_user['id']?>">
                </div>
                <div>
                    <label for="don_gia">Tên KH</label>
                    <input class="border w-full rounded-[4px] px-3 h-[40px]" value="<?php echo $one_user['user_name']?>"
                           type="text"  name="user_name" id="don_gia"
                           placeholder="Vui lòng nhập giá sản phẩm..">
                    <?php echo isset($error['empty_donGia'])?$error['empty_donGia'] :"" ?>
                </div>

                <div>
                    <label for="ten_san_pham">EMAIL</label>
                    <input class="border w-full rounded-[4px] px-3 h-[40px]" value="<?php echo $one_user['user_email']?>"
                           type="text"  name="user_email" id="ten_san_pham"
                           placeholder="Vui lòng nhập tên sản phẩm..">
                    <?php echo isset($error['empty_name'])?$error['empty_name'] :"" ?>
                </div>
                <div>
                    <label for="giam_gia">SỐ Điện Thoại</label>
                    <input class="border w-full rounded-[4px] px-3 h-[40px]"
                           type="text"  name="user_phone" id="giam_gia"
                           placeholder="Vui lòng nhập giảm giá.." value="<?php echo $one_user['user_phone']?>">
                </div>
                <div>
                    <label for="chat_lieu">Địa Chỉ</label>
                    <input class="border w-full rounded-[4px] px-3 h-[40px]"
                           type="text" name="address" id="chat_lieu" value="<?php echo $one_user['address']?>"
                           placeholder="Chất liệu sản phẩm">
                </div>
            </div>
            <input type="hidden" name="user_id" value="<?php echo $one_user['id']?>"> <!-- Lấy id của sản phẩm-->
            <input class=" border px-3 py-1  mt-3 rounded-[4px] bg-[#FFC0CB] hover:font-[500]"
                   type="submit" value="Cập nhật" name="edit_user">
            <input class=" border px-3 py-1 mt-3 rounded-[4px] bg-[#FFC0CB] hover:font-[500]"
                   type="reset" value="Nhập lại" name="nhap_lai">
            <a href="index_admin.php?act=list_pro"
               class=" border px-3 py-[10.5px] mt-3 rounded-[4px] bg-[#FFC0CB] hover:font-[500]">
                Danh Sách Sản Phẩm
            </a>
            <a href="index_admin.php?act=add_cate"
               class=" border px-3 py-[10.5px] ml-1 mt-3 rounded-[4px] bg-[#FFC0CB] hover:font-[500]">
                Thêm mới danh mục
            </a>
        </form>

</section>