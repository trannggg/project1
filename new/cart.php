<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
<!--    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>-->
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


</head>
<body >

<!-- adddddddddddddddddd -->
<?php
                include ('headerandlogin.php');
                if (!isset($_SESSION['user'])){
                    echo "<script> alert('Vui lòng đăng nhập để vào giỏ hàng'); </script><script> window.location.href='index.php'; </script>";
                }else {

                    //làm rỗng giỏ hàng
                    //    if(isset($_GET['delcart'])&&($_GET['delcart']==1)) unset($_SESSION['giohang']);
                    //xóa sp trong giỏ hàng
                    if (isset($_GET['delid']) && ($_GET['delid'] >= 0)) {
                        array_splice($_SESSION['giohang'], $_GET['delid'], 1);
                    }
                    $cart_id = isset($_GET['GetID']) ? $_GET['GetID'] : "";
                    $user = (isset($_SESSION['user'])) ? $_SESSION['user'] : [];
                    if (!isset($_SESSION['giohang'])) {
                        $_SESSION['giohang'] = [];
                    }
                    if (isset($cart_id)) {
                        $son_id = $cart_id;
                        $query = " select * from product where id='" . $son_id . "'";
                        $result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_array($result)) {
                            $son_id = $row['id'];
                            $son_name = $row['title'];
                            $price = $row['price'];
                            $quantity = (int)$_POST['number'];
                            if ($quantity> $row['quantity'] ){
                                echo "<script> window.location.href='product.php?id=$son_id';
                                               alert('sản phẩm còn lại không đủ để thêm vào giỏ hàng');
                                            </script>";

                            }else {
                                $image = $row['thumbnail'];
                                //        kiem tra sp co trong gio hang

                                $f1 = 0; // kiem tra sp co trung trong gio hang khong
                                for ($i = 0; $i < sizeof($_SESSION['giohang']); $i++) {
                                    if ($_SESSION['giohang'][$i][4] == $son_id) {
                                        $f1 = 1;
                                        $quantitynew = $quantity + $_SESSION['giohang'][$i][3];
                                        $_SESSION['giohang'][$i][3] = $quantitynew;
                                        break;

                                    }
                                }
                                // neu khong co thi them moi
                                if ($f1 == 0) {

                                    //them sp moi vao gio hang
                                    $sp = [$image, $son_name, $price, $quantity, $son_id, $son_name];
                                    $_SESSION['giohang'][] = $sp;
                                }


                            }

                        }
                    }
                }



?>


<!-- -------------cart------ -->
<section class="cart">
    <div class="container">
        <div class="cart-top-wrap">
            <div class="cart-top">
                <div class="cart-top-cart cart-top-item" >
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                </div>
                <div class="cart-top-adress cart-top-item" >
                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                </div>
                <div class="cart-top-payment cart-top-item" >
                    <i class="fa fa-credit-card-alt" aria-hidden="true"></i>
                </div>
            </div>
        </div>

        </div>
    <div class="container">
        <div class="cart-content row">
            <div class="cart-content-left">
                <table>
                    <tr>
                        <th>Sơn</th>
                        <th>Tên sơn</th>
                        <th>Số lượng</th>
                        <th>thành tiền</th>
                        <th>Xóa</th>
                    </tr>
                    <?php


                    $tong = 0;

                    $tong_sp=0;
                    if(isset($_SESSION['giohang'])&&(is_array($_SESSION['giohang']))){
                    for ($i=0;$i < sizeof($_SESSION['giohang']);$i++){
                        $tong_sp= (int)$_SESSION['giohang'][$i][3] + $tong_sp;
                    $tt =  (int)$_SESSION['giohang'][$i][2]* (int)$_SESSION['giohang'][$i][3];
                    $GLOBALS['tong']=$GLOBALS['tong']+$tt;
                    ?>
                    <tr>
                        <td>
                            <?php echo "<img class='img' src='img/" . $_SESSION['giohang'][$i][0] . "' alt='img'>"; ?>
<!--                            <img src="1.jpg" alt="">-->
                        </td>
                        <td><a><?php echo $_SESSION['giohang'][$i][1] ?></a></td>
                        <td>
                            <form name="update" method="post" action="updateQty.php?ID='<?php echo $_SESSION['giohang'][$i][4] ?>'">
                            <input  name="updateQty<?php echo$i?>a" type="number" min="1" value="<?php echo $_SESSION['giohang'][$i][3] ?>">
                                <?php $sql_check_qty="select quantity from product where id='".$_SESSION['giohang'][$i][4]."'";
                                        $query_check_qty= mysqli_query($conn,$sql_check_qty);
                                        $arr_check_qty=mysqli_fetch_array($query_check_qty);
                                        if (isset($_SESSION['check_giohang'][$i])){
                                        unset($_SESSION['check_giohang'][$i]);
                                        ?>
                            <p style="color: red">Số lượng còn lại: <?php echo $arr_check_qty['quantity'] ?> </p></td>
                            <?php } ?>
                        <td><a><?php echo $_SESSION['giohang'][$i][2] ?></a></td>
                        <td><span onclick="window.location='cart.php?delid=<?php echo $i ?>'" >X</span></td>
                    </tr>

                    <?php

                        }
                    }
                    $_SESSION['tong_sp']=$tong_sp;
                    $_SESSION['tong'] =$tong;
                    ?>
                </table>
                <div class="button-update">
                    <button type="submit" onclick="myFunction()" >Cập nhật</button>
                </div>
                </form>
            </div>



            <div class="cart-content-right">
                <table>
                    <tr>
                        <th colspan="2">TỔNG TIỀN GIỎ HÀNG</th>
                    </tr>
                    <tr>
                        <td>TỔNG SẢN PHẨM</td>
                        <td><?php echo $_SESSION['tong_sp'] ?></td>
                    </tr>
                    <tr>
                        <td>TỔNG TIỀN HÀNG</td>
                        <td><p><?php echo $_SESSION['tong'] ?></p></td>
                    </tr>
                    <tr>
                        <td>TẠM TÍNH</td>
                        <td><p style="color: black; font-weight: bold"><?php echo $_SESSION['tong'] ?></p></td>
                    </tr>
                </table>
                <div class="cart-content-right-button">
                    <button onclick="window.location='index.php';">TIẾP TỤC MUA SẮM</button>
                    <button onclick="window.location='delivery.php';">THANH TOÁN</button>
                </div>
            </div>
        </div>
    </div>
    </div>

</section>


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