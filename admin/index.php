<?php
    include "../model/pdo.php";
    include "../model/model_catalog.php";
    include "../model/model_user.php";
    include "../model/model_cart.php";
    include "../model/model_product.php";
    include "../model/model_thongke.php";
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
                    $amount = $_POST['soluong'];
                    $giam_gia = $_POST['giam_gia'];
                    $pro_desc = $_POST['mo_ta'];
                    $chat_lieu = $_POST['size'];
                    $cate_id = $_POST['category'];
                    $target_file = "../img/". $_FILES['hinh_anh']['name'];
                    if(empty($pro_name)){ // Kiểm tra tên sản phẩm có để trống hay không
                        $error['empty_pro_name'] = "<span class='text-red-600'>*Không để trống tên sản phẩm</span>";
                    }
                    if(empty($pro_price)){ // Kiểm tra giá sản phẩm có để trống hay không
                        $error['empty_pro_price'] = "<span class='text-red-600'>*Không để trống giá sản phẩm</span>";
                    }
                    if(empty($error)){
                        move_uploaded_file($_FILES['hinh_anh']['tmp_name'],$target_file);
                        add_pro($pro_name, $pro_price,$amount, $target_file, $pro_desc, $giamgia, $chat_lieu, $cate_id);
                        $thong_bao = "<span class = 'text-red-500'>Thêm sản phẩm thành công </span>";
                        header("location:index.php?act=list_pro");
                        
                    }
                }
                $list_cate = queryAll();
                include "product/add_pro.php";
                break;
            case 'edit_pro': // Chỉnh sửa sản phẩm
                if(isset($_GET['pro_id'])){
                    $pro_id = $_GET['pro_id'];
                    $one_pro = queryOnePro($pro_id);
                }
                $list_cate = queryAll();
                include "product/edit_pro.php";
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
                    $amount = $_POST['soluong'];
                    $discount = $_POST['giam_gia'];
                    $pro_desc = $_POST['mo_ta'];
                    $chat_lieu = $_POST['chat_lieu'];
                    $cate_id = $_POST['category'];

                    $target_dir = "";
                    $target_file = $target_dir . $_FILES['hinh_anh']['name'];
                    if(empty($pro_name)){ // Kiểm tra tên sản phẩm có để trống hay không
                        $error['empty_pro_name'] = "<span class='text-red-600'>*Không cập nhật tên sản phẩm trống</span>";
                    }
                    if(empty($pro_price)){ // Kiểm tra giá sản phẩm có để trống hay không
                        $error['empty_pro_price'] = "<span class='text-red-600'>*Không cập nhật giá sản phẩm trống</span>";
                    }
                    if(empty($error)){
                        move_uploaded_file($_FILES['hinh_anh']['tmp_name'],$target_file);
                        update_pro($pro_id, $pro_name, $pro_price,$amount, $discount, $target_file, $pro_desc, $chat_lieu, $cate_id);
                        $thong_bao = "Cập nhật sản phẩm thành công";
                    } 
                }
                $list_cate = queryAll();
                $list_pro = queryAllPro("", 0);
                // $list_pro = queryAllPro();
                include "product/list_pro.php";
                break;
            case 'delete_pro':
                if(isset($_GET['pro_id']) && $_GET['pro_id'] > 0){
                    $pro_id = $_GET['pro_id'];
                    delete_pro($pro_id);
                }
                $list_cate = queryAll();
                $list_pro = queryAllPro("",0);
                include "product/list_pro.php";
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
            case 'list_user': // Danh sách danh mục
                $list_user = queryAllUser();
                include "user/list_user.php";
                break;
            case 'delete_user': // Xóa danh mục
                if(isset($_GET['user_id']) && $_GET['user_id'] > 0){
                    $user = $_GET['user_id'];
                    delete_user($user);
                }
// Sau khi xóa xong thì phải select lại danh sách danh mục
                $list_user = queryAllUser();
                include "user/list_user.php";
                break;
            case 'edit_user': // Lấy dữ liệu theo id rồi đổ ra 
                if(isset($_GET['user_id']) && $_GET['user_id'] > 0){
                    $user_id = $_GET['user_id'];
                    $one_user = queryOneUserByID($user_id);
                }
                include "user/edit_user.php";
                break;    
            case 'update_user': // Cập nhật danh mục
                if(isset($_POST['edit_user'])){
                    $user_id = $_POST['user_id'];
                    $user_name = $_POST['user_name'];
                    $user_email = $_POST['user_email'];
                    $user_phone = $_POST['user_phone'];
                    $address = $_POST['address'];
                    update_user($user_id, $user_name,$user_email,$user_phone,$address);
                    $thong_bao = "*Cập nhật loại hàng thành công"; 
                }
                $list_user = queryAllUser();
                include "user/list_user.php";
                break;    
            case 'list_order': // Danh sách danh mục
                $list_order = queryAllOrder();
                include "order/list_order.php";
                break;
            case 'delete_order': // Xóa danh mục
                if(isset($_GET['order_id']) && $_GET['order_id'] > 0){
                    $order_id = $_GET['order_id'];
                    delete_bill($order_id);
                    delete_order_item($order_id);
                }
// Sau khi xóa xong thì phải select lại danh sách danh mục
                $list_order = queryAllOrder();
                include "order/list_order.php";
                break;
            case 'edit_order': // Lấy dữ liệu theo id rồi đổ ra 
                if(isset($_GET['order_id']) && $_GET['order_id'] > 0){
                    $order_id = $_GET['order_id'];
                    $one_order = queryOneOrderByID($order_id);
                }
                include "order/edit_order.php";
                break;    
            case 'update_order': // Cập nhật danh mục
                if(isset($_POST['edit_user'])){
                    $order_id = $_POST['order_id'];
                    $status = $_POST['status'];
                    update_order($order_id,$status);
                    $thong_bao = "*Cập nhật loại hàng thành công"; 
                }
                $list_order = queryAllOrder();;
                include "order/list_order.php";
                break;
            case 'detail_order': // Lấy dữ liệu theo id rồi đổ ra 
                if(isset($_GET['order_id']) && $_GET['order_id'] > 0){
                    $order_id = $_GET['order_id'];
                    $one_order = queryOneBIll($order_id);
                }
                include "order/order_item.php";
                break;  
            case 'thongke':
                $thongke = thongke();
                include "thongke/bieudo.php";
                break;    
            default:
                include "body.php";
                break;
        }
    } else{
        include "body.php";
    }
    
    
?>