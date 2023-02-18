<?php
        require_once ('../connect_db/connect_db.php');
        $delete_id=$_GET['delete'];
        $sql_order_detail=" DELETE FROM order_detail WHERE order_id=' ".$delete_id." ' ";
        $sql_order_1=" DELETE FROM order_1 WHERE id=' ".$delete_id." ' ";
        mysqli_query($conn,$sql_order_detail);
        mysqli_query($conn,$sql_order_1);
        header('Location: manger_order.php');