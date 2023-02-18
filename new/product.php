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
    <link rel="stylesheet" href="css/product.css">


</head>
<body >
<section>
    <?php
    include ('headerandlogin.php');

    ?>
<!--------product--------->
    <?php
    $son_id = (isset($_GET['id'])) ? $_GET['id'] : '';
    ?>
<section class="product" >
    <div class="container" >
        <div class="product-top row">
        </div>
        <div class="product-content row">
            <?php
            $sql_product="select * from product where id='$son_id'";
            ?>
            <?php $result=mysqli_query($conn,$sql_product );?>
            <?php $row=mysqli_fetch_array($result)?>
            <div class="product-content-left row">
                <div class="product-content-left-big-img">
<!--                    <img src="1.jpg" alt="" stype="display: block;">-->
                    <?php
                    echo "<img src='img/" . $row['thumbnail'] . "' alt='img'"."style='display: block;' ;>";
                    ?>
                </div>
<!--                                <div class="product-content-left-small-img">-->
<!--                                    <img src="1.jpg" alt="">-->
<!--                                    <img src="1.jpg" alt="">-->
<!--                                    <img src="1.jpg" alt="">-->
<!--                                    <img src="1.jpg" alt="">-->

<!--                                </div>-->
            </div>
            <div class="product-content-right">
                    <div class="product-content-right-product-name">
                        <h1><?php echo $row['title'];?></h1>
                        <p>MSSP:<?php echo $row['id'] ?></p>
                    </div>
                    <div class="product-content-right-product-auther row">
                        <p style="flex:1"><span style="font-weight: bold">Color:</span> <?php echo $row['color'] ?></p>
                     </div>
                     <div class="product-content-right-product-auther row">
<!--                    <img src="1.jpg" alt="" stype="display: block;">-->
                    <?php
                    echo "<img src='img/" . $row['picture'] . "' alt='img'"."style='display: block;' ;>";
                    ?>
                </div> 
                    <div class="product-content-right-product-auther row">
                        <p style="flex:1"><span style="font-weight: bold">Category:</span> <?php echo $row['category'] ?></p>
                    </div>

                    <div class="product-content-right-product-price">
                        <p><?php echo $row['price'] ?><sup>đ</sup></p>
                    </div>
                        <form  action="cart.php?GetID=<?php echo$row['id'] ?>" method="post">
                    <div class="product-content-right-product-quantity">
                        <a style="font-weight: bold">So luong: </a>
                        <input name="number" type="number" min="0" value="1">
                    </div>
                    <div><a style="color:#757575;">Với <?php echo $row['quantity'] ?> sản phẩm có sẵn </a></div>
                <div class="product-content-right-product-button" >
                    <a style="display: inline-block; text-decoration: none;"><button ><i class="fa fa-cart-arrow-down" aria-hidden="true"  ></i>MUA HÀNG</button></a>
                        </form>
                </div>
                <div class="product-content-right-product-item">
                    <div class="product-content-right-product-item-icon">
                        <i class="fa fa-phone" aria-hidden="true"></i><a>Hotline</a>
                    </div>
                    <div class="product-content-right-product-item-icon">
                        <i class="fa fa-commenting" aria-hidden="true"></i><a>Chat</a>
                    </div>
                    <div class="product-content-right-product-item-icon">
                        <i class="fa fa-envelope" aria-hidden="true"></i><a>Mail</a>
                    </div>
                </div>
                <div class="product-content-right-bottom">
                    <div class="product-content-right-bottom-top">
                        &#8794;
                    </div>
                    <div class="product-content-right-bottom-content-big">
                        <div class="product-content-right-bottom-content-title row">
                            <div class="product-content-right-bottom-content-title-item detail1">
                                <p> Chi tiết </p>
                            </div>
                            <div class="product-content-right-bottom-content-title-item comment1">
                                <p> Comment </p>
                            </div>
                        </div>
                        <div class="product-content-right-bottom-content">
                            <div class="product-content-right-bottom-content-detail" style="width: 80%">
                                <h5>Product Details</h5>
                                Price: <?php echo $row['price'] ?><sup>đ</sup> <br>
                                Color: <?php echo $row['color'] ?> <br>
                                Category: <?php echo $row['category'] ?> <br>
                                <h5>Description</h5>
                                <?php
                                echo $row['description'];
                                ?>
                            </div>
                            <div class="product-content-right-bottom-content-comment">
                                The end of the beginning! Doug Moench and Bill Sienkiewicz's landmark,
                                <br>critically acclaimed run comes to a close. But first Moon Knight must
                                <br>survive threats old and new -- including the madness of Mor...
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- product more-->
<section class="product-more" style="padding-left: 100px;">
    <div class="product-more-title">
        <p>Có Thể Bạn Cũng Thích</p>
    </div>
    <div class="product-content row">
        <?php
            $count_son='select id from product';
             $count_son1=mysqli_query($conn,$count_son);
             $arr_r=array();
             $i=1;
             while ($count_son2=mysqli_fetch_array($count_son1)){
                 if($count_son2['id']!=$son_id) {
                     $arr_r[$i] = $count_son2['id'];
                     $i++;
                 }
               }
               shuffle($arr_r);
                ?>
        <?php
        for ($i=1; $i<=5;$i++){
        $sql_product1="select * from product where id='$arr_r[$i]'";
        $result1=mysqli_query($conn,$sql_product1 );
        $row1= mysqli_fetch_array($result1);
            ?>
        <div class="product-more-item">
<!--            <img src="1.jpg" alt="">-->
            <a href="product.php?id=<?php echo $row1['id'] ?>"><?php echo "<img src='img/" . $row1['thumbnail'] . "' alt='img'>"; ?>  </a>
            <h1> <?php echo $row1['title'];?></h1>
            <p><?php echo $row1['price'];?><sup>đ</sup></p>
        </div>
        <?php } ?>
<!--        <div class="product-more-item">-->
<!--            <img src="1.jpg" alt="">-->
<!--            <h1> Ma Lich si colate</h1>-->
<!--            <p>790000<sup>đ</sup></p>-->
<!--        </div>-->
<!--        <div class="product-more-item">-->
<!--            <img src="1.jpg" alt="">-->
<!--            <h1> Ma Lich si colate</h1>-->
<!--            <p>790000<sup>đ</sup></p>-->
<!--        </div>-->
<!--        <div class="product-more-item">-->
<!--        <img src="1.jpg" alt="">-->
<!--        <h1> Ma Lich si colate</h1>-->
<!--        <p>790000<sup>đ</sup></p>-->
<!--        </div>-->
<!--        <div class="product-more-item">-->
<!--            <img src="1.jpg" alt="">-->
<!--            <h1> Ma Lich si colate</h1>-->
<!--            <p>790000<sup>đ</sup></p>-->
<!--        </div>-->

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
<script src="js/scrip3.js"></script>
<script src="js/product.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script src="user/home.js"></script>
    <?php require_once("order_hienthi.php");?>
</body>
</html>