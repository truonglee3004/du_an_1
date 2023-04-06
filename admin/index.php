<?php
    include "../model/pdo.php";
    include "../model/model_catalog.php";
    include "../model/model_product.php";
    include "header.php";
// Controller
    if(isset($_GET['act'])){
        $act = $_GET['act'];
        switch ($act) {
            case 'add_cate': // Thêm danh mục
                if(isset($_POST['add_cate'])){
                    $cate_name = $_POST['ten_loai'];
                    add_cate($cate_name);
                    $thong_bao = "<span class='text-red-500'>Thêm Danh Mục Thành Công</span>";
                    header("location:index_admin.php?act=list_cate");
                }
                include "catalog/add_cate.php";
                break;
            case 'list_cate': // Danh sách danh mục
                $list_cate = queryAll();
                include "catalog/list_cate.php";
                break;
            case 'delete_cate': // Xóa danh mục
                if(isset($_GET['cate_id']) && $_GET['cate_id'] > 0){
                    $cate_id = $_GET['cate_id'];
                    delete_cate($cate_id);
                }
// Sau khi xóa xong thì phải select lại danh sách danh mục
                $list_cate = queryAll();
                include "catalog/list_cate.php";
                break;
            case 'edit_cate': // Lấy dữ liệu theo id rồi đổ ra 
                if(isset($_GET['cate_id']) && $_GET['cate_id'] > 0){
                    $cate_id = $_GET['cate_id'];
                    $one_cate = queryOne($cate_id);
                }
                include "catalog/edit_cate.php";
                break;    
            case 'update_cate': // Cập nhật danh mục
                if(isset($_POST['edit_cate'])){
                    $cate_name = $_POST['ten_loai'];
                    $cate_id = $_POST['cate_id'];
                    update_cate($cate_id, $cate_name);
                    $thong_bao = "*Cập nhật loại hàng thành công"; 
                }
                $list_cate = queryAll();
                include "catalog/list_cate.php";
                break;    
// Kết thúc phần danh mục. Bắt đầu phần sản phẩm: Controller Sản phẩm                
            case 'add_pro': // Thêm Sản phẩm
                $error = [];
                if(isset($_POST['add_pro'])){
                    $pro_name = $_POST['ten_san_pham'];
                    $pro_price = $_POST['don_gia'];
                    // $giam_gia = $_POST['giam_gia'];
                    $pro_desc = $_POST['mo_ta'];
                    $chat_lieu = $_POST['chat_lieu'];
                    $cate_id = $_POST['category'];

                    $target_file = "../upload/". $_FILES['hinh_anh']['name'];
                    if(empty($pro_name)){ // Kiểm tra tên sản phẩm có để trống hay không
                        $error['empty_pro_name'] = "<span class='text-red-600'>*Không để trống tên sản phẩm</span>";
                    }
                    if(empty($pro_price)){ // Kiểm tra giá sản phẩm có để trống hay không
                        $error['empty_pro_price'] = "<span class='text-red-600'>*Không để trống giá sản phẩm</span>";
                    }
                    if(empty($error)){
                        move_uploaded_file($_FILES['hinh_anh']['tmp_name'],$target_file);
                        add_pro($pro_name, $pro_price, $target_file, $pro_desc, $chat_lieu, $cate_id);
                        $thong_bao = "<span class = 'text-red-500'>Thêm sản phẩm thành công </span>";
                        header("location:index_admin.php?act=list_pro");
                        
                    }
                }
                $list_cate = queryAll();
                include "products/add_pro.php";
                break;
            case 'edit_pro': // Chỉnh sửa sản phẩm
                if(isset($_GET['pro_id'])){
                    $pro_id = $_GET['pro_id'];
                    $one_pro = queryOnePro($pro_id);
                }
                $list_cate = queryAll();
                include "products/edit_pro.php";
                break;
            case 'list_pro': // Danh sách sản phẩm
                if(isset($_POST['search_by_cate'])){
                    $key_word = $_POST['key_word'];
                    $cate_id = $_POST['cate_id'];
                } else{
                    $key_word = "";
                    $cate_id = 0;
                }
                $list_cate = queryAll();
                $list_pro = queryAllPro($key_word, $cate_id);
                include "product/list_pro.php";
                break;    
//            case 'add_customer':
//                include "category/add_cate.php";
//                break;
            case 'update_pro':
                if(isset($_POST['edit_pro'])){
                    $pro_id = $_POST['pro_id'];
                    $pro_name = $_POST['ten_san_pham'];
                    $pro_price = $_POST['don_gia'];
                    // $giam_gia = $_POST['giam_gia'];
                    $pro_desc = $_POST['mo_ta'];
                    $chat_lieu = $_POST['chat_lieu'];
                    $cate_id = $_POST['category'];
                    $target_dir = "../upload/";
                    $target_file = $target_dir . $_FILES['hinh_anh']['name'];
                    if(empty($pro_name)){ // Kiểm tra tên sản phẩm có để trống hay không
                        $error['empty_pro_name'] = "<span class='text-red-600'>*Không cập nhật tên sản phẩm trống</span>";
                    }
                    if(empty($pro_price)){ // Kiểm tra giá sản phẩm có để trống hay không
                        $error['empty_pro_price'] = "<span class='text-red-600'>*Không cập nhật giá sản phẩm trống</span>";
                    }
                    if(empty($error)){
                        move_uploaded_file($_FILES['hinh_anh']['tmp_name'],$target_file);
                        update_pro($pro_id, $pro_name, $pro_price, $target_file, $pro_desc, $chat_lieu, $cate_id);
                        $thong_bao = "Cập nhật sản phẩm thành công";
                    } 
                }
                $list_cate = queryAll();
                $list_pro = queryAllPro("", 0);
                // $list_pro = queryAllPro();
                include "products/list_pro.php";
                break;
            case 'delete_pro':
                if(isset($_GET['pro_id']) && $_GET['pro_id'] > 0){
                    $pro_id = $_GET['pro_id'];
                    delete_pro($pro_id);
                }
                $list_cate = queryAll();
                $list_pro = queryAllPro("",0);
                include "products/list_pro.php";
                break;
            case 'commnet': // Danh sách danh mục
                $list_binhluan = queryAllbl(0);
                include "binhluan/list_binhluan.php";
                break;
            case 'delete_binhluan':
                if(isset($_GET['id_bl']) && $_GET['id_bl'] > 0){
                    $id_bl = $_GET['id_bl'];
                    delete_binhluan($id_bl);
                }
                $list_binhluan = queryAllbl(0);
                include "binhluan/list_binhluan.php";
                break;
            default:
                include "body.php";
                break;
        }
    } else{
        include "body.php";
    }
    
    
?>