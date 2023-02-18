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
    <link rel="stylesheet" href="css/cart.css">
    <link rel="stylesheet" href="css/payment.css">


</head>
<body >
<?php
include ('headerandlogin.php');
?>
    <!-- -------------payment------ -->
    <!-- -------------payment icon------ -->
    <section class="payment">
        <div class="container">
            <div class="payment-top-wrap">
                <div class="payment-top">
                    <div class="payment-top-delivery payment-top-item" >
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    </div>
                    <div class="payment-top-adress payment-top-item" >
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                    </div>
                    <div class="payment-top-payment payment-top-item" >
                        <i class="fa fa-credit-card-alt" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
        <!-- -------------payment------ -->
        <div class="container">
            <div class="payment-content row">
                <div class="payment-content-left">
                    <div class="payment-content-left-method-delivery">
                        <p style="font-weight: bold">Phơng thức giao hàng</p>
                        <div class="payment-content-left-method-delivery-item">
                            <input checked type="radio">
                            <label for=""> Giao hàng chuyển phát nhanh</label>
                        </div>
                    </div>
                    <div class="payment-content-left-method-payment">
                        <p style="font-weight: bold"> Phương thức thanh toán</p>
                        <div class="payment-content-left-method-payment-item">
                            <input checked type="radio">
                            <label for=""> Thanh toán khi nhận hàng</label>
                        </div>
                    </div>
                </div>
                <div class="payment-content-right">
                    <div class="payment-content-right-button">
                        <input type="text" placeholder="Mã giảm giá/ Quà tặng">
                        <button for=""><i class="fa fa-check" aria-hidden="true"></i></button>
                    </div>
                    <div style="font-weight: bold;margin-top: 76px;" class="row">Tổng tất cả là:
                        <a style="font-weight: bold;margin-left: 136px; "><a><?php echo $_SESSION['tong'] ?><sup>đ</sup></a></a>
                    </div>

                </div>
            </div>
            <div class="payment-content-right-payment">
<!--                <a href="cart.php" style="color:cornflowerblue"><span>&#171;</span><p style="font-size: 14px;">Quay lai gio hang</p></a>-->
                <button onclick="window.location='paymentDb.php'";>TIẾP TỤC THANH TOÁN</button>
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