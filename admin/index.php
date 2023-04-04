<?php
include "../model/pdo.php";
include "../model/model_catalog.php";
include "header.php";
// Controller
if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        case 'add_cate': // Thêm danh mục
            if (isset($_POST['add_cate'])) {
                $cate_name = $_POST['ten_loai'];
                add_cate($cate_name);
                $thong_bao = "<span class='text-red-500'>Thêm Danh Mục Thành Công</span>";
                header("location:index.php?act=list_cate");
            }
            include "catalog/add_cate.php";
            break;
        case 'list_cate': // Danh sách danh mục
            $list_cate = queryAll();
            include "catalog/list_cate.php";
            break;
        case 'delete_cate': // Xóa danh mục
            if (isset($_GET['cate_id']) && $_GET['cate_id'] > 0) {
                $cate_id = $_GET['cate_id'];
                delete_cate($cate_id);
            }
            // Sau khi xóa xong thì phải select lại danh sách danh mục
            $list_cate = queryAll();
            include "catalog/list_cate.php";
            break;
        case 'edit_cate': // Lấy dữ liệu theo id rồi đổ ra 
            if (isset($_GET['cate_id']) && $_GET['cate_id'] > 0) {
                $cate_id = $_GET['cate_id'];
                $one_cate = queryOne($cate_id);
            }
            include "catalog/edit_cate.php";
            break;
        case 'update_cate': // Cập nhật danh mục
            if (isset($_POST['edit_cate'])) {
                $cate_name = $_POST['ten_loai'];
                $cate_id = $_POST['cate_id'];
                update_cate($cate_id, $cate_name);
                $thong_bao = "*Cập nhật loại hàng thành công";
            }
            $list_cate = queryAll();
            include "catalog/list_cate.php";
            break;
            // Kết thúc phần danh mục. Bắt đầu phần sản phẩm: Controller Sản phẩm                

    }
} else {
    // include "body.php";
}
