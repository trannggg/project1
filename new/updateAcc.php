<?php
include "connect_db/connect_db.php";

        $sql="UPDATE customer
                SET full_name = '".$_POST['p_name']."', email = '".$_POST['p_email']."', phone_number = '".$_POST['p_number']."' ,address='".$_POST['p_address']."'
                WHERE id= '".$_SESSION['user']['id']."'";
        mysqli_query($conn,$sql);
header('Location: index.php');
?>