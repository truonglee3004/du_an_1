<?php
 ob_start();
session_start();
include './model/pdo.php';
include './model/model_product.php';
include './model/model_catalog.php';
include './model/model_cart.php';
include './model/model_user.php';
include './view/header.php';




$nike = query_nike();
$adidas = query_adidas();
$puma = query_puma();
$spd = query_spd();
$list_cata = queryAll();
// $list_pro = queryAllproduct();
if(isset($_GET['act']) && !empty($_GET['act'])){
    $act = $_GET['act'];
    switch ($act) { 
        case 'list_pro':
            if(isset($_POST['search_by_cate'])){
                $key_word = $_POST['key_word'];
                $cate_id = $_POST['cate_id'];
            } else{
                $key_word = "";
                $cate_id = 0;
            }
            if(isset($_GET['cate_id']) && ($_GET['cate_id'] > 0)){
                $cate_id = $_GET['cate_id'];
                $key_word = "";
            }
            $list_cate = queryAll();
            $list_pro = queryAllPro($key_word, $cate_id);
            include "view/list_pro.php";
            break;
        case 'detail_pro':
            if(isset($_GET['pro_id']) && ($_GET['pro_id'] > 0)){
                $pro_id = $_GET['pro_id'];
                $detail_pro = queryOnePro($pro_id);

                $similar_pro = query_similar_pro($pro_id, $detail_pro['catalog_id']);
                include "view/detail_pro.php";
            } else{
                include "view/body.php";
            }
            $list_cata = queryAll();
            break;
        case 'signup':
            if(isset($_POST['sign_up'])){
                $email = $_POST['email'];
                $userName = $_POST['userName'];
                $password = $_POST['password'];
                $repassword = $_POST['repass'];
                $one_user = queryOneUserByEmail($email);
                if(trim($email) === "" || trim($userName) === "" || trim($password) === ""){
                    $thong_bao = "<span class='mt-3 font-[500] text-red-500'>Đăng kí tài khoản thất bại. Vui lòng nhập đầy đủ thông tin</span>";
                }
                else if($_POST['repass'] != $_POST['password']){
                    $thong_bao = "<span class='mt-3 font-[500] text-red-500'>Đăng kí tài khoản thất bại. Vui lòng nhập đúng trường nhập lại mật khẩu</span>";
                }
                else if(is_array($one_user)){
                    $thong_bao = "<span class='mt-3 font-[500] text-red-500'>Đăng kí tài khoản thất bại. Email đã được sử dụng, vui lòng sử dụng email khác</span>";
                }
                else{
                add_user($email, $userName, $password);
                // $list_user = queryAllUser();
                // setcookie("thong_bao", "Đăng kí tài khoản thành công. Vui lòng đăng nhập để mua hàng", time() + 5);
                $thong_bao = "<span class='mt-3 font-[500] text-red-500'>Đăng kí tài khoản thành công. Vui lòng đăng nhập để mua hàng</span>";
                // header("location:index.php");
                }
            }
            include "view/account/signup.php";
            break;  
        case 'signin':
            if(isset($_POST['sign_in']) && ($_POST['sign_in'])){
                @$email = $_POST['email'];
                $password = $_POST['password'];
                $one_user = queryOneUser($email, $password);
                if(is_array($one_user)){
                    $_SESSION['user'] = $one_user;
                    header("Location: index.php");
                    $thong_bao = "<span class='text-red-500'>Đăng nhập thành công</span>";
                    $_SESSION['thong_bao'] = "<span class='text-red-500'>Đăng nhập thành công</span>";
                   
                } else{
                    $thong_bao = "<span class='font-[500] text-red-500'>Tài khoản không tồn tại. Vui lòng kiểm tra lại hoặc đăng kí</span>";
                }
                
            }
            include "view/account/signin.php";
            break;
        case 'doimatkhau':
            if(isset($_POST['doimk'])){
                $email = $_POST['email'];
                $pass = $_POST['pass'];
                $repass = $_POST['repass'];
                $user_id = $_POST['user_id'];
                if(trim($pass) === ""){
                    $thong_bao = "Vui lòng điền đầy đủ thông tin";
                }else if($repass != $pass){
                    $thong_bao = "Nhập lại mật khâu không đúng";
                }
                else{
                    update_pass($user_id, $pass);
                    $_SESSION['user'] = queryOneUser($email, $pass);
                    $thong_bao = "Đôi mật khẩu thành công";
                }
            }
            include "view/account/quenmk.php";
            break; 
        case 'edit_acc':
            if(isset($_POST['update_acc'])){
                $email = $_POST['hello'];
                $userName = $_POST['userName'];
                $phone = $_POST['phone'];
                $address = $_POST['address'];
                $user_id = $_POST['user_id'];
                $password = $_POST['password'];
                edit_user($user_id, $email, $userName, $phone, $address);
                $_SESSION['user'] = queryOneUser($email, $password);
                header("Location:index.php?act=edit_acc");
            }
            
                include "view/account/edit_acc.php";
                break;   
        case 'logout':
            session_unset();
            header("Location:index.php");
            break;
                
            case 'addtocard':
                if(isset($_POST['addtocard']) && ($_POST['addtocard'])){
                    $pro_id = $_POST["id"];
                    $img = $_POST["image"];
                    $pro_price = $_POST["price"];
                    $soluong = 1;
                    $pro_name = $_POST['pro_name'];
                    $user_id = $_SESSION['user']['id'];
                    $ttien = $soluong * $pro_price;
                    $check = checkDuplicate($pro_id, $user_id);
                    if($check == true){
                        add_amout_dl($pro_id, $user_id);
                    }else
                    add_card($pro_id,$pro_price,$pro_name,$img,$user_id,$soluong,$ttien);
                }
                $list_cart = queryAllCart($_SESSION['user']['id']);
                header("Location:index.php");
                break;
            case 'delete_card':
                if(isset($_GET['card_id']) && $_GET['card_id'] > 0){
                    $card_id = $_GET['card_id'];
                    delete_cart($card_id);
                }
                else{
                    delete_all_cart($_SESSION['user']['id']);
                }
                $list_cart = queryAllCart($_SESSION['user']['id']);
                header("Location:index.php?act=viewcard");
                break;
                // header("Location:index.php?act=viewcard");
            case 'change_amount':
                if(isset($_GET['card_id']) && $_GET['card_id'] > 0){
                    $card_id = $_GET['card_id'];
                    if(isset($_GET['change']) && $_GET['change'] == "add"){
                        add_amout($card_id);
                    }else{
                        minus_amout($card_id);
                    }
                }
                $list_cart = queryAllCart($_SESSION['user']['id']);
                
            case 'viewcard':
                include "view/card/viewcard.php";
                break;
            case 'bill':
                include "view/card/bill.php";
                break;
            case 'billconfirm':
                if(isset($_POST['thanhtoan']) && ($_POST['thanhtoan'])){
                    $user_id = $_POST['user_id'];
                    $email = $_POST['email'];
                    $user_name = $_POST['userName'];
                    $phone = $_POST['phone'];
                    $address = $_POST['address'];
                    $tong = $_POST['tong'];
                    $pttt = $_POST['pttt'];
                    $date = date('h:i:sa d/m/Y');
                    $list_cart = queryAllCart($_SESSION['user']['id']);
                    if(trim($phone) === "" || trim($address) === ""){
                        $emp = "<p class='text-red-600 font-[700] px-[5px]'>Bạn cần điền đẩy đủ thông tin</p>";
                        include "view/card/bill.php";
                    }
                    else{
                    $id_order = add_bill($user_id,$email,$user_name,$phone,$address,$tong,$date,$pttt);
                    foreach($list_cart as $cart){

                        extract($cart);
                        $product = queryOnePro($pro_id);
                        if($amount > $product['amount']){
                            delete_bill($id_order);
                            $thongbao = "Sản phẩm <p class='text-red-600 font-[700] px-[5px]'>".$product['pro_name']."</p> của chúng tôi chỉ còn <p class='text-red-600 font-[700] px-[5px]'>".$product['amount']."</p> sản phẩm, quý khách vui lòng giảm số lượng sản phẩm";
                            include "view/card/bill.php";
                        }
                        else{
                        add_ctbil($user_id, $pro_id, $pro_name, $pro_price, $pro_image, $amount, $payment, $id_order);
                        update_product($pro_id, $amount);
                        header("Location:index.php?act=mybill");
                        }
                    }
                }

                }
            break;
            case 'mybill':
                $list_bill = query_bill_userid($_SESSION['user']['id']);
                include "view/card/mybill.php";
                break;
            case 'detail_bill':
                if(isset($_GET['bill_id']) && ($_GET['bill_id'] > 0)){
                    $bill_id = $_GET['bill_id'];
                    $detail_bill = queryOneBill($bill_id);    
                    include "view/card/detail_bill.php";
                } else{
                    include "view/body.php";
                }
                break;
            case 'delete_bill': 
                if(isset($_GET['bill_id']) && $_GET['bill_id'] > 0){
                    $bill_id = $_GET['bill_id'];
                    $detail_bill = queryOneBill($bill_id);
                    foreach($detail_bill as $bill){
                        extract($bill);
                        back_product($pro_id, $amount);
                    }
                    delete_bill($bill_id);
                    delete_order_item($bill_id);
                    header("Location:index.php?act=mybill");
                }
                break;
        } 

} else{
    include './view/carousel.php';
    include './view/danhmuc.php';
    include "view/body.php";
}
include "view/footer.php";
ob_flush();
?>
