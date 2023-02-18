<?php
include "../connect_db/connect_db.php";


            $user_id=$_GET['user_id'];

            $sql="UPDATE customer
                            SET full_name = '".$_POST['p_name']."', email = '".$_POST['p_email']."', phone_number = '".$_POST['p_number']."' ,address='".$_POST['p_address']."',password='".$_POST['p_password']."'
                            WHERE id= '".$user_id."'";
            mysqli_query($conn,$sql);

header("location:manger_user.php");
?>