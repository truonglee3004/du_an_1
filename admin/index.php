<?php

include "header.php";
include "../model/pdo.php";


if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        case 'adddm':
            if (isset($_POST['themmoi']) && $_POST['themmoi']) {
                $tenloai = $_POST['tenloai'];
                $sql = "insert into catalog(cata_name) values('$tenloai') ";
                pdo_execute($sql);
                $thongbao = "Thêm thành công";
            }
            include "danhmuc/add.php";
            break;
        case 'listdm':
            $sql = "select * from catalog order by id";
            $listdanhmuc = pdo_query($sql);
            include "danhmuc/list.php";
            break;
        case 'xoadm':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $sql = "delete from catelog where id=" . $_GET['id'];
                pdo_execute($sql);
            }
            $sql = "select * from danhmuc order by id";
            $listdanhmuc = pdo_query($sql);
            include "danhmuc/list.php";
            break;
        case 'suadm':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $sql = "select * from catalog where id=" . $_GET['id'];
                $dm = pdo_query_one($sql);
            };
            include "danhmuc/update.php";
            break;
        case 'addsp':
            include "sanpham/add.php";
            break;
        case 'dskh':
            # code...
            break;

        case 'dsbl':
            # code...
            break;

        case 'thongke':
            # code...
            break;
        default:
            include "home.php";
            break;
    }
} else {
    include "home.php";
}
include "footer.php";
