<?php
include "connect_db/connect_db.php";

    for ($i=0;$i < sizeof($_SESSION['giohang']);$i++) {
        $sql_qty="select quantity from product where id='".$_SESSION['giohang'][$i][4]."'";
        $query_qty= mysqli_query($conn,$sql_qty);
        $arr_qty=mysqli_fetch_array($query_qty);

        if($arr_qty['quantity']>=$_POST['updateQty'.$i.'a' ]){
            $_SESSION['giohang'][$i][3]=$_POST['updateQty'.$i.'a' ];
            unset($_SESSION['check_giohang'][$i]);
        }else{
            $_SESSION['check_giohang'][$i]='1';
        }

    }
    header('Location: cart.php#container');

?>