<?php
include "connect_db/connect_db.php";

    $user = (isset($_SESSION['user'])) ? $_SESSION['user'] : [];
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $date = date('Y-m-d');
//    var_dump($user);
    $address1=$_SESSION['address']['5'].' '.$_SESSION['address']['4'] .' '.$_SESSION['address']['3'];



    $sql_oder_i = "INSERT INTO order_1 (user_id, full_name, email, phone_number, address, order_date, status, total_money)
    VALUES ('".$_SESSION['user']['id']."', '".$_SESSION['address']['1']."', '".$_SESSION['user']['email']."', '".$_SESSION['address']['2']."', '".$address1."', '".$date."', '0', '".$_SESSION['tong']."')";
    $result = mysqli_query($conn, $sql_oder_i);

    $sql1 = "SELECT MAX(id) FROM order_1;";
    $order_id = mysqli_query($conn, $sql1);
    $order_id1 = mysqli_fetch_array($order_id);
    $id=$order_id1['MAX(id)'];

    for ($i = 0; $i < sizeof($_SESSION['giohang']); $i++) {
        $sql_order_book = "insert into order_detail (order_id,product_id,price,quantity,total_money)
        values('" . $id . "','" . $_SESSION['giohang'][$i][4] . "','" .  $_SESSION['giohang'][$i][2] . "','" .  $_SESSION['giohang'][$i][3] . "','" .  $_SESSION['tong'] . "')";
        $order_book = mysqli_query($conn, $sql_order_book);
    }
//    $_SESSION['tb'] = 1;
    for ($i = 0; $i < sizeof($_SESSION['giohang']); $i++) {
        $sql_bandau="select * from product where id='".$_SESSION['giohang'][$i][4]."'";
//        echo $_SESSION['giohang'][$i][4];
//        var_dump($sql_bandau);
        $sl = mysqli_query($conn, $sql_bandau);
        $sl1 = mysqli_fetch_array($sl);

        $sql_giam_son="update product set quantity ='".$sl1['quantity']-$_SESSION['giohang'][$i][3]."' where id='".$_SESSION['giohang'][$i][4]."' ";
        $sl_new= mysqli_query($conn, $sql_giam_son);
    }
    unset ($_SESSION['giohang']);
    unset($_SESSION['tong']);
    unset($_SESSION['tong_sp']);
    unset($_SESSION['address']);
    header("Location:index.php");