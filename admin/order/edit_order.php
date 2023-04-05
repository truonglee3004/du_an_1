<?php 
    // show_array($list_cate)
?>

<section class="product w-full mt-5 leading-8">
    <p class="p-3 text-[28px] border bg-[#EEE] rounded-md mb-5">
                    CẬP NHẬT ĐƠN HÀNG <?=$one_order['order_id']?>
                </p>
        <form action="index.php?act=update_order" method="post" enctype="multipart/form-data">
            <div class="grid grid-cols-2 gap-x-8 gap-y-2">
                <div>
                    <label for="category">Trạng Thái Đơn Hàng </label>
                    <select name="status" id="category" class="w-full px-3 border rounded-[4px] h-[40px]">
                        <option value="0">Đơn hàng mới</option>
                        <option value="1">Đang xử lý</option>
                        <option value="2">Đang giao hàng</option>
                        <option value="3">Hoàn Tất</option>
                    </select>
                </div>
            </div>
            <input type="hidden" name="order_id" value="<?php echo $one_order['order_id']?>"> <!-- Lấy id của sản phẩm-->
            <input class=" border px-3 py-1  mt-3 rounded-[4px] bg-[#FFC0CB] hover:font-[500]"
                   type="submit" value="Cập nhật" name="edit_user">
        </form>

</section>