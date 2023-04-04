<?php
 ob_start();
session_start();
include './model/pdo.php';
include './model/model_product.php';
include './model/model_catalog.php';
include './model/model_user.php';
include './view/header.php';




$nike = query_nike();
$adidas = query_adidas();
$puma = query_puma();
$list_cata = queryAll();
if(isset($_GET['act']) && !empty($_GET['act'])){
    $act = $_GET['act'];
    switch ($act) { 
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
                add_user($email, $userName, $password);
                // $list_user = queryAllUser();
                // setcookie("thong_bao", "Đăng kí tài khoản thành công. Vui lòng đăng nhập để mua hàng", time() + 5);
                $thong_bao = "<span class='mt-3 font-[500] text-red-500'>Đăng kí tài khoản thành công. Vui lòng đăng nhập để mua hàng</span>";
                // header("location:index.php");
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
                    delete_all_cart($_SESSION['users']['user_id']);
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
                        $id_order = add_bill($user_id,$email,$user_name,$phone,$address,$tong,$date,$pttt);
                        foreach($list_cart as $cart){
                            extract($cart);
                            add_ctbil($user_id, $pro_id, $pro_name, $pro_price, $pro_image, $amount, $payment, $id_order);
                        }
                    }
                break;
                break;
                
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
                    $id_order = add_bill($user_id,$email,$user_name,$phone,$address,$tong,$date,$pttt);
                    foreach($list_cart as $cart){
                        extract($cart);
                        add_ctbil($user_id, $pro_id, $pro_name, $pro_price, $pro_image, $amount, $payment, $id_order);
                    }
                    header("Location:index.php?act=mybill");
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
        } 

} else{
    include './view/carousel.php';
    include './view/danhmuc.php';
    include "view/body.php";
}
include "view/footer.php";
ob_flush();
?>
