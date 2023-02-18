<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="test.css">

    <!--boostrap-->
    <link
            rel="stylesheet"
            href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    />
    <!-- ================================================================================================== -->
    <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css"
    />
    <!-- ================================================================================================== -->
    <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
    />
    <!-- ================================================================================================== -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="css/delivery.css">


</head>
<body >
<?php
include ('headerandlogin.php');
?>

<!-- -------------delivery icon------ -->
<section class="delivery">
    <div class="container">
        <div class="delivery-top-wrap">
            <div class="delivery-top">
                <div class="delivery-top-delivery delivery-top-item" >
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                </div>
                <div class="delivery-top-adress delivery-top-item" >
                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                </div>
                <div class="delivery-top-payment delivery-top-item" >
                    <i class="fa fa-credit-card-alt" aria-hidden="true"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- -------------Delivery------ -->
    <?php
    if (!isset($_SESSION['address'])) {
        $_SESSION['address'] = [];
        $_SESSION['address']['1']= $row_acc['full_name'];
        $_SESSION['address']['2']= $row_acc['phone_number'];
        $_SESSION['address']['3']='';
        $_SESSION['address']['4'] = '';
        $_SESSION['address']['5'] = '';
    }

    ?>
    <div class="container">
        <div class="delivery-content row">
            <div class="delivery-content-left">
                <form action="./getAddress.php" method="post">
                <p>Vui lòng chọn địa chỉ giao hàng </p>
                <div class="delivery-content-left-input-top row" >
                    <div class="delivery-content-left-input-top-item">
                        <label  for="">Họ và Tên<span style="color:red;"></span></label>
                        <input type="text" name="full_name" value="<?php echo $_SESSION['address']['1']; ?>" required oninvalid="this.setCustomValidity('Hãy nhập tên!')" onchange="this.setCustomValidity('')" type="text">
                    </div>
                    <div class="delivery-content-left-input-top-item">
                        <label  for="">Điện thoại<span style="color:red;"></span></label>
                        <input type="number" name="phone_number" value="<?php echo  $_SESSION['address']['2']; ?>" required oninvalid="this.setCustomValidity('Hãy nhập số điện thoại!')" onchange="this.setCustomValidity('')" type="number">
                    </div>
                    <div class="delivery-content-left-input-top-item">
                        <label  for="">Tỉnh/Tp<span style="color:red;"></span></label>
                        <input type="text" name="province" value="<?php echo  $_SESSION['address']['3']; ?>" required oninvalid="this.setCustomValidity('Hãy nhập tỉnh nhập tỉnh/thành phố!')" onchange="this.setCustomValidity('')" type="text">
                    </div>
                    <div class="delivery-content-left-input-top-item">
                        <label  for="">Quận/Huyện<span style="color:red;"></span></label>
                        <input type="text" name="district" value="<?php echo  $_SESSION['address']['4']; ?>" required oninvalid="this.setCustomValidity('Hãy nhập quận/huyện !')" onchange="this.setCustomValidity('')" type="text">
                    </div>
                </div>
                <div class="delivery-content-left-input-bottom">
                    <label  for="">Địa chỉ cụ thể<span style="color:red;"></span></label>
                    <input type="text" name="specific_address" value="<?php echo  $_SESSION['address']['5']; ?>" required oninvalid="this.setCustomValidity('Hãy điền địa chỉ cụ thể!')" onchange="this.setCustomValidity('')" type="text">
                </div>
                <div class="delivery-content-left-button row">
                    <a href="cart.php" style="color:cornflowerblue"><span>&#171;</span><p style="font-size: 14px;">Quay lai gio hang</p></a>
                    <button type="submit" ><p style="font-weight: bold">THANH TOÁN VÀ GIAO HÀNG</p></button>
                </div>
                </form>

            </div>

            <div class="delivery-content-right">
                <table>

                    <tr>
                        <th>Tên Sơn</th>
                        <th> Số lượng </th>
                        <th>Thành tiền</th>
                    </tr>
                    <?php
                    $tong = 0;
                    if(isset($_SESSION['giohang'])&&(is_array($_SESSION['giohang']))){
                        for ($i=0;$i < sizeof($_SESSION['giohang']);$i++){
                            ?>
                    <tr>
                        <td> <?php echo $_SESSION['giohang'][$i][1] ?></td>
                        <td><?php echo $_SESSION['giohang'][$i][3] ?></td>
                        <td><p><?php echo $_SESSION['giohang'][$i][2] ?><sup>đ</sup></p></td>

                    </tr>
                    <?php  }
                    }
                    ?>
                    <tr>
                        <td style="font-weight: bold" colspan="2">Tổng</td>
                        <td style="font-weight: bold"><p><?php echo $_SESSION['tong'] ?><sup>đ</sup></p></td>
                    </tr>

                </table>

            </div>
        </div>
    </div>

</section>

<!-- -------------footer------ -->
<section class="footer">

    <div class="box-container">

        <!--            <div class="box">-->
        <!--                <h3>contact info</h3>-->
        <!--                <a href="#"> <i class="fas fa-phone"></i> +123-456-7890 </a>-->
        <!--                <a href="#"> <i class="fas fa-phone"></i> +111-222-3333 </a>-->
        <!--                <a href="#"> <i class="fas fa-envelope"></i> shaikhanas@gmail.com </a>-->
        <!--                <img src="image/worldmap.png" class="map" alt="">-->
        <!--            </div>-->

        <!--        </div>-->

        <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
            <a href="#" class="fab fa-pinterest"></a>
        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script src="user/home.js"></script>
<script src="js/scrip3.js"></script>
<?php require_once("order_hienthi.php");?>
</body>
</html>