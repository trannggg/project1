<?php
include ('connect_db/connect_db.php');
if ($_POST) {

        $_SESSION['address']['1'] = $_POST['full_name'];
        $_SESSION['address']['2']  = $_POST['phone_number'];
        $_SESSION['address']['3']  = $_POST['province'];
        $_SESSION['address']['4']  = $_POST['district'];
        $_SESSION['address']['5']  = $_POST['specific_address'];
                header("Location:./payment.php");
}