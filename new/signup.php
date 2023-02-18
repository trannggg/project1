<?php
        require_once('connect_db/connect_db.php');
        $full_name=$_POST['fullname'];
        $number_phone=$_POST['number_phone'];
        $address=$_POST['address'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $rpassword=$_POST['rpassword'];

        $sql = "SELECT email FROM customer where email='$email'";
        $row = mysqli_fetch_array(mysqli_query($conn, $sql));

        if ($row) {
            $_SESSION['err'] = 'err_email';
            echo "
                        <script type='text/javascript'>
                           window.alert('da ton tai email!');
                           window.location.href='login.php';
                        </script>
                ";
        }else {
            if ($password != $rpassword) {

                $_SESSION['err'] = 're_password';
                echo "
                        <script type='text/javascript'>
                             window.alert('lỗi nhap lai pass!');
                             window.location.href='login.php';
                        </script>
                ";


            } else {
                $sql = "INSERT INTO customer(full_name,phone_number,address,email,password,role_id) VALUES ('$full_name','$number_phone','$address','$email','$password','1')";
                mysqli_query($conn, $sql);
                echo "
                        <script type='text/javascript'>
                            window.alert('Bạn đã đăng ký tài khoản thành công!');
                            window.location.href='login.php';
                        </script>
                ";

            }
        }