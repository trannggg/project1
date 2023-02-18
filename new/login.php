<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
  <link rel="stylesheet" href="css/login1.css">
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>


</head>
<body>

<?php
include ('connect_db/connect_db.php');
?>

<div class="demo-wrap">
  <div class="demo-content">
  </div>
</div>
<!--<h2>Weekly Coding Challenge #1: Sign in/up Form</h2>-->
<div class="container" id="container">
  <div class="form-container sign-up-container">
    <form action="signup.php" method="post" >
      <h1>Create Account</h1>
        <?php
        if(isset( $_SESSION['err'])&& $_SESSION['err']=="err_email"){
            echo '<a style="color: red">Email đã tồn tại </a>';

        } ?>
        <?php

        if(isset( $_SESSION['err'])&&$_SESSION['err']=="re_password"){
            echo '<a style="color: red">Mật khẩu nhập lại sai </a>';
        }

        ?>
        <input type="text" placeholder="Full Name" name="fullname" />
        <input type="number" placeholder="Number phone" name="number_phone" />
        <input type="text" placeholder="Address" name="address" />

        <input type="email" placeholder="Email" name="email" />
        <input type="password" placeholder="Password" name="password"/>
        <input type="password" placeholder="Re-Password" name="rpassword"/>

      <div class="button-ok">
        <a href="index.php" ><button type="button">Cancel</button></a>
        <button type="submit">Sign Up</button>
      </div>
    </form>
  </div>
  <div class="form-container sign-in-container">
    <form action="login.php" method="post">
      <h1>Sign in</h1>
<!--      <div class="social-container">-->
<!--        <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>-->
<!--        <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>-->
<!--        <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>-->
<!--      </div>-->
<!--      <span>or use your account</span>-->
        <?php
        if ($_POST) {

            $email = $_POST['email'];
            $password = $_POST['password'];
            $result = mysqli_query($conn, "SELECT * FROM customer where email='$email' and password='$password'");
            $row = mysqli_fetch_array($result);
            if(isset($row['role_id'])){
            if ($row['role_id']==1) {
                $_SESSION['user'] = $row;
                header("Location:index.php");
            } else if ($row['role_id']==2) {
                header("Location:admin/admin.php");

            }
            }else{
                echo '<p style="color: red">Tai khoan hoac mat khau khong chinh xac </p>';
            }
        }

        ?>
      <input type="email" placeholder="Email" name="email" />
      <input type="password" placeholder="Password" name="password"/>
      <a href="#">Forgot your password?</a>
      <div class="button-ok">
        <a href="index.php"><button type="button">Cancel</button></a>
        <button type="submit">Sign In</button>
      </div>
    </form>
  </div>
  <div class="overlay-container">
    <div class="overlay">
      <div class="overlay-panel overlay-left">
        <h1>Welcome Back!</h1>
        <p>To keep connected with us please login with your personal info</p>
        <button class="ghost" id="signIn">Sign In</button>
      </div>
      <div class="overlay-panel overlay-right">
        <h1>Hello, Friend!</h1>
        <p>Enter your personal details and start journey with us</p>
        <button class="ghost" id="signUp">Sign Up</button>
      </div>
    </div>
  </div>
</div>

<?php if(isset($_SESSION['err'])){
?>
<script>
    const container = document.getElementById('container');
    container.classList.add("right-panel-active");
</script>
<?php unset ($_SESSION['err']); }  ?>
<script src="js/login.js"></script>

</body>
</html>