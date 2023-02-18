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


</head>
<body >

    <?php
     include('headerandlogin.php');
     
    $search = (isset($_GET['search'])) ? $_GET['search'] : '';
    $trang = (isset($_GET['trang'])) ? $_GET['trang'] : '1';
    $order_by=(isset($_GET['order_by'])) ? $_GET['order_by'] : '';
    $order_by1="";
    $mau=(isset($_GET['mau'])) ? $_GET['mau'] : '';
    $theloai=(isset($_GET['theloai'])) ? $_GET['theloai'] : '';

    $locchung='';
    if($mau!='' ){
        $locchung= "and color like '$mau'";
    }
    if ($theloai!=''){
        $locchung= "and category like '$theloai'";
    }
    if ($order_by=='desc'){
        $order_by1="order by price desc";
    }
    if ($order_by=='asc'){
        $order_by1="order by price asc";
    }


//    $trang =1;
    $sql_so_son="select count(*) from product where title like '%$search%' $locchung";
    $mang_so_trang=mysqli_query($conn,$sql_so_son);
    $ketqua_so_son=mysqli_fetch_array($mang_so_trang);
    $so_son=$ketqua_so_son['count(*)'];

    $so_son_tren_1_trang=8;
    $so_trang= ceil($so_son/$so_son_tren_1_trang);
    $bo_qua=$so_son_tren_1_trang *($trang-1);
    $sql_product="select * from product where title like '%$search%' $locchung  $order_by1 limit $so_son_tren_1_trang offset $bo_qua"



?>
    
    


    <!--cartegory-->
    <section class="category" >
        <div class="container">
            <div class="list">
                    
                    <li><a href="index.php">TRANG CHỦ</a></li>
                    <li><a color="red" href="#">GIỚI THIỆU</a></li>
                    <li><a href="#">SƠN NƯỚC</a></li>
                    <li><a href="#">SƠN DẦU</a></li>
                    <li><a href="#">SƠN CHỐNG RỈ</a></li>
                    <li><a href="#">DỤNG CỤ SƠN</a></li>
                    <li><a href="#">BẢNG MÀU</a></li>
                    
            </div>
            
                    <div class="aspect-ratio-169">
                        <img src="https://images.akzonobel.com/akzonobel-flourish/dulux/uk/en/dulux-colour-of-the-year-2023/landing/entry-blocks/Dulux-Colour-Futures-Colour-of-the-Year-2023-COY-LivingRoom-Inspiration-Global-1920x1080%20KV.jpg?impolicy=.auto&imwidth=1366"/>
                    </div>
            
            <div class="row">
                <div class="category-left">
                    <ul>
                        <li class="category-left-li" id="category-left-li"><a> Lọc Sản Phẩm Theo</a></li>
                        <li class="category-left-li" id="category-left-li"><a class="category-left-li-a"> Màu <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                            <ul>
                                <li></li>
                                <select name="" class="form-control" data-placeholder="Select customer" id="customer" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value)">

                                <?php $result1 = mysqli_query($conn, "SELECT distinct color FROM product "); ?>
                                <?php while ($row=mysqli_fetch_array($result1)){
                                    ?>

                                    <option value="?trang=<?php echo$trang?>&search=<?php echo$search?>&order_by=<?php echo$order_by ?>&mau=<?php echo$row['color'] ?>"><?php echo $row['color'] ?></option>
                                <?php } ?>
                                </select>
                            </ul>
                        </li>
                        
                        <li class="category-left-li"><a>Thể Loại <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                            <ul>
                                <select name="" class="form-control" data-placeholder="Select customer" id="customer" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value)">

                                <?php $result1 = mysqli_query($conn, "SELECT distinct category FROM product "); ?>
                                <?php while ($row=mysqli_fetch_array($result1)){
                                    ?>
                                    <option value="?trang=<?php echo$trang?>&search=<?php echo$search?>&order_by=<?php echo$order_by ?>&theloai=<?php echo$row['category'] ?>"><?php echo $row['category'] ?></option>
                                <?php } ?>
                                </select>
                            </ul>
                        </li>
                    </ul>
                </div>
                        <div class="category-right">
                            <div class="row ">
                            <div class="category-right-top-item">
                                <p>Sơn Của Cửa Hàng</p>
                            </div>
<!--                            <div class="category-right-top-item">-->
<!--                                <button><span> Bo loc</span><i class="fas fa-sort-down"></i></button>-->
<!--                            </div>-->
                            <div class="category-right-top-item">
                                <select name="" id="" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value)">
                                    <option value=""> sắp xếp</option>
                                    <option value="?trang=<?php echo$trang?>&search=<?php echo$search ?>&order_by=asc&mau=<?php echo$mau ?>&theloai=<?php echo$theloai ?>"> Giá từ thấp đến cao</option>
                                    <option value="?trang=<?php echo$trang?>&search=<?php echo$search ?>&order_by=desc&mau=<?php echo$mau ?>&theloai=<?php echo$theloai ?>"> Giá từ cao đến thấp</option>
                                </select>

                            </div>
                            </div>
                            <div class="category-right-content row">
                                 <?php $result=mysqli_query($conn,$sql_product );?>
                                <?php while ($row=mysqli_fetch_array($result)){?>

                                <div class="category-right-content-item" onclick="window.location='product.php?id=<?php echo$row['id']?>';">
                                    <?php
                                    echo "<img src='img/" . $row['thumbnail'] . "' alt='img'"."style='width: 217px;height: 312px' ;>";
                                    ?>
                                    <h1> <?php echo $row['title'] ?></h1>
                                    <p><?php echo $row['price'] ?><sup>đ</sup></p>
                                </div>
                                <?php } ?>
                        </div>
                            <div class="category-right-bottom row">
                                <div class="category-right-bottom-items">
                                    <span>&#171;<span>
                                                <?php
                                                for ($i=1;$i<=$so_trang; $i++){?>
                                                    <a href="?trang=<?php echo$i?>&search=<?php echo$search?>&order_by=<?php echo$order_by ?>&mau=<?php echo$mau ?>&theloai=<?php echo$theloai ?>">
                                                        <?php echo $i?>
                                                    </a>

                                               <?php } ?>
                                            </span>&#187;</span>
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
            <div class="service">                       
                <li><a href="https://www.facebook.com/profile.php?id=100040797199081&sk=about">Chat qua Message: Nguyễn Văn Khải</a></li>
                <li><a href="#">Gmail: nguyenvankhai0707@gmail.com</a></li>                                       
            </div>
        </div>
        
    </section>

    <!-- footer section ends -->



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