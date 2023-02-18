<?php
include ('connect_db/connect_db.php');
$user = (isset($_SESSION['user'])) ? $_SESSION['user'] : [];
?>

<section>
    <header style="display: flex">
        <div class="logo">
            <a href="index.php"><img src="img/BK_Books.png" ></a>
        </div>
        <div class="menu">
            <li><a> Trang Chủ</a>
                <ul class="sub-menu">
                    <li> <a href=""> ABC</a></li>
                    <li> <a href=""> ABC</a></li>
                    <li> <a href=""> ABC</a></li>
                    <li> <a href=""> ABC</a></li>
                    <li> <a href=""> ABC</a></li>
                    <li> <a href=""> ABC</a></li>

                </ul>
            </li>
            <li><a> Giới Thiệu</a></li>
            <li><a> Sản Phẩm </a></li>
            <li><a> Tin Tức </a></li>
            <li><a> Liên Hệ</a></li>
        </div>
        <div class="others">
            <li> <form id="myform">
                <input type="text" placeholder="Tìm Kiếm" name="search">
                    <a onclick="document.getElementById('myform').submit()"> <i class="fa fa-search" style="font-size:20px" aria-hidden="true"></i> </li></a>
            </form>
            <?php
            if (isset($user['email'])) {
            ?>
                <li id="userProfile" data-toggle="modal" data-target="#profileModal"><a class="fa fa-user" style="font-size:20px"  aria-hidden="true" ></a> Tài Khoản </li>
            <?php } else { ?>

                <li onclick="window.location='login.php';"id="Login"><a class="fa fa-user" style="font-size:20px"  aria-hidden="true"></a> Đăng Nhập</li>
            <?php } ?>
            <li onclick="window.location='cart.php';"><a class="fa fa-shopping-basket" style="font-size:20px"  aria-hidden="true" href="#"></a> Giỏ Hàng </li>

        </div>
    </header></section>

<!--    login-->
<!--    <button id="userProfile" data-toggle="modal" data-target="#profileModal" style="margin-top: 128px">-->
<!--        <i class="fas fa-user-tie fa-lg"> | <small>Tài khoản</small></i>-->
<!--    </button>-->
<?php if (isset($user['email'])) { ?>
<div class="modal fade"  id="profileModal" tabindex="-1" role="dialog" aria-labelledby="profileModalLabel" aria-hidden="true">
    <div
        class="modal-dialog modal-dialog-scrollable modal-xl"
        role="document"
    >
        <div class="modal-content">
            <div class="modal-body">
                <!-- ========================================= Profile Content ============================================== -->
                <?php
                if (isset($user['email'])) {
                    $sql_acc = "select * from customer where id =  " . $_SESSION['user']['id'] . "";
                    $result_acc = mysqli_query($conn, "$sql_acc");
                    $row_acc = mysqli_fetch_array($result_acc);
                    //                            var_dump($row_acc['full_name']);
                    //                            die();
                }
                ?>
                <div class="user-profile mt-4 mb-4">
                    <div class="container">
                        <div class="row text-dark">
                            <!-- Menu Left -->
                            <div class="col-3 menu-left">
                                <div class="row profiles">
                                    <div class="col-4 text-center text-success bg-light">
                                        <i class="fas fa-user-circle fa-4x mt-1"></i>
                                    </div>
                                    <div class="col-8">
                                        <p>Tài khoản của</p>
                                        <a style="text-transform: uppercase"><?php echo $row_acc['full_name']?></h6></a>
                                    </div>
                                </div>
                                <div class="menu-drop p-3">
                                    <ul style="list-style-type: none">
                                        <li
                                            class="liactive menu-drop__pointer"
                                            id="s_profileInfo"
                                        >
                                            <i class="fas fa-user"></i>
                                            Thông tin tài khoản
                                        </li>
                                        <li class=" menu-drop__pointer" id="s_profileOrder" >
                                            <i class="fas fa-tasks"></i>
                                            Quản lý đơn hàng
                                        </li>
                                        <!--                                            <li class="menu-drop__pointer">-->
                                        <!--                                                <i class="fas fa-bell"></i>-->
                                        <!--                                                Thông báo của tôi-->
                                        <!--                                            </li>-->
                                        <!--                                            <li class="menu-drop__pointer">-->
                                        <!--                                                <i class="fas fa-grin-hearts"></i>-->
                                        <!--                                                Sản phẩm yêu thích-->
                                        <!--                                            </li>-->
<!--                                        <li class="menu-drop__pointer">-->
<!--                                            <i class="fas fa-comments"></i>-->
<!--                                            Nhận xét của tôi-->
<!--                                        </li>-->
                                    </ul>

                                </div>
                            </div>
                            <!-- Menu Right -->
                            <div class="col-9 content-right">
                                <!-- ACCOUNT INFO -->
                                <div id="account-info">
                                    <form method="post" action="updateAcc.php" >
                                    <h5>Thông tin tài khoản</h5>
                                    <div class="account-profile p-3 bg-light">
                                        <div class="form-group row">
                                                <label for="p_name" class="col-sm-2 col-form-label"
                                                >Họ và tên</label
                                                >
                                            <div class="col-sm-5">
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    id="p_name"
                                                    name="p_name"
                                                    value="<?=$row_acc['full_name']?>"
                                                />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="p_number" class="col-sm-2 col-form-label"
                                            >Số điện thoại</label
                                            >
                                            <div class="col-sm-5">
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    id="p_number"
                                                    name="p_number"
                                                    value="<?=$row_acc['phone_number']?>"
                                                />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="p_email" class="col-sm-2 col-form-label"
                                            >Email</label
                                            >
                                            <div class="col-sm-5">
                                                <input
                                                    type="email"
                                                    class="form-control"
                                                    id="p_email"
                                                    name="p_email"
                                                    value="<?=$row_acc['email']?>"
                                                />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="p_address" class="col-sm-2 col-form-label"
                                            >Địa chỉ</label
                                            >
                                            <div class="col-sm-5">
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    id="p_address"
                                                    name="p_address"
                                                    value="<?=$row_acc['address']?>"
                                                />
                                            </div>
                                        </div>
                                        <div class="col-sm-5 text-center">
                                            <button
                                                type="submit"
                                                class="btn btn-warning btn-sm"
                                                id="updateProfile"
                                            >
                                                Cập nhật
                                            </button>
                                            <a href="unset_session.php">
                                            <button
                                                type="button"
                                                class="btn btn-danger btn-sm"
                                                id="logout"
                                                >
                                                Đăng Xuất
                                            </button>
                                            </a>

                                        </div>
                                    </div>
                                    </form>
                                </div>

                                <!-- ORDER INFO -->
                                <div id="order-info" style="display: none">
                                    <h5>Đơn hàng của tôi</h5>
                                    <div class="account-order">
                                        <table class="table">
                                            <thead class="thead-light ">
                                            <tr>
                                                <th scope="col">Mã đơn</th>
                                                <th scope="col">Ngày mua</th>
                                                <th scope="col ">Sản phẩm</th>
                                                <th scope="col">Tổng tiền</th>
                                                <th scope="col">Trạng thái đơn hàng</th>
                                                <th  scope="col"> Chi tiết</th>
                                            </tr>
                                            <?php
                                            $check=0;
                                            $sql_order = "select * from order_1 where user_id =  " . $_SESSION['user']['id'] . "";
                                            $result_order = mysqli_query($conn, "$sql_order");
                                            ?>

                                            <?php while ($row_order = mysqli_fetch_array($result_order)) { ?>
                                            <tr>
                                                <td><a id="userProfile1" data-toggle="modal" data-target="#order"><h6 id="p_nameTitle" > <?php echo $row_order['id'] ?> </h6></a>
                                                    <input type="hidden" name="bienphp" id="bienphp" value="" >
                                                </td>
                                                <td><?php echo $row_order['order_date'] ?></td>
                                                <td>
                                                    <?php $sql1 = " select * from product where id in (select product_id from order_detail
                                                                        where order_id =  " .$row_order['id'].")";
                                                    $result1 = mysqli_query($conn, "$sql1");

                                                    while ($row1 = mysqli_fetch_array($result1)) { ?>
                                                    <div> <?php echo $row1['title']; ?></div>
                                                    <?php } ?>


                                                </td>
                                                <td> <?php echo $row_order['total_money']?><sup>đ</sup></td>
                                                <td> <?php if($row_order['status'] == 0 ) { ?>
                                                        <div > Chờ </div>
                                                        <?php }elseif ($row_order['status'] == 1 ){ ?>
                                                        <div> Chấp Nhận </div>
                                                        <?php }elseif ($row_order['status'] == 2 ){ ?>
                                                        <div> Hoàn Thành </div>
                                                        <?php }else{ ?>
                                                        <div> Hủy</div>
                                                        <?php }?>

                                                    </td>
                                                <td> <a
                                                        <?php if (isset($_GET['id'])) {?>

                                                        href= "?id=<?php echo$_GET['id']?>&order_1_id=<?php echo $row_order['id'];?>"> <button class="btn btn-primary btn-sm trash" title="Xóa" ><i class="fa fa-eye" aria-hidden="true"></i></i>
                                                        </button>
                                                        </button>

                                                    </a> </td>
                                                            <?php }else {?>

                                                        href= "?order_1_id=<?php echo $row_order['id'];?>"> <button class="btn btn-primary btn-sm trash" title="Xóa" ><i class="fa fa-eye" aria-hidden="true"></i></i>
                                                                </button>

                                                                </a> </td>
                                                        <?php } ?>
                                            </tr>
                                                <?php } ?>
                                            </thead>
                                            <tbody id="profileTbody">
                                            <!-- Insert Data -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End -->
            </div>
        </div>
    </div>
</div>




<!-- order detail-->
<div class="modal fade"  id="order" tabindex="-1" role="dialog" aria-labelledby="profileModalLabel" aria-hidden="true">
    <div
            class="modal-dialog modal-dialog-scrollable modal-xl"
            role="document"
    >
        <div class="modal-content">
            <div class="modal-body">
                <!-- ========================================= Profile Content ============================================== -->
                <div class="user-profile mt-4 mb-4">
                    <div class="container">
                        <div class="text-dark">

<!--                            --><?php
                            $order_1_id = (isset($_GET['order_1_id'])) ? $_GET['order_1_id'] : '';
                            if ($order_1_id){
                                $_SESSION['hienthichitietdon']='1';
                            }
//
                              ?>
                            <!-- Menu Right -->
                            <div class="">
                                <!-- ORDER INFO -->
                                <div id="order-info">
                                    <h5>Đơn hàng của tôi</h5>
                                    <div class="account-order">
                                        <table class="table">
                                            <thead class="thead-light">
                                            <tr>
                                                <th scope="col">Mã đơn</th>
                                                <th scope="col">Ngày mua</th>
                                                <th scope="col">Địa chỉ</th>
                                                <th scope="col">Sản phẩm</th>
                                                <th scope="col">Tổng tiền</th>
                                                <th scope="col">Trạng thái</th>
                                            </tr>

                                            <?php $sql_order_1 = "select * from order_1
                                                                        where id =  '".$order_1_id."' ";
                                            $row_order_1=mysqli_fetch_array(mysqli_query($conn,$sql_order_1))
                                            ?>

                                            <tr>
                                                <td><?php echo $order_1_id ?></td>
                                                <td><?php echo date('d/m/Y',strtotime($row_order_1['order_date'])) ?></td>
                                                <td> <?php echo $row_order_1['address'].'-sdt:'.$row_order_1['phone_number'] ?> </td>
                                                <td>
                                               <?php
                                               $sql_product = "select product_id,quantity,price,total_money from order_detail
                                                                        where order_id =  '".$order_1_id."' ";
//
                                                    $a=mysqli_query($conn, "$sql_product");
                                                   while ($row_product=mysqli_fetch_array($a)){
                                                       $product_id=$row_product['product_id'];
                                                       $sql_product_detail="select * from product where id = $product_id ";
                                                       $row_product_detail=mysqli_fetch_array(mysqli_query($conn,$sql_product_detail))
                                                                ?>

                                                       <div> <?php echo $row_product_detail['title'].' -sl: '.$row_product['quantity'].' - '.$row_product['price'];?><sup>đ</sup></div>
                                                    <?php } ?>
                                                </td>
                                                <td> <?php echo $row_order_1['total_money'] ?><sup>đ</sup> </td>
                                                <td> <?php if($row_order_1['status'] == 0 ) { ?>
                                                    <div > Chờ </div>
                                                    <?php }elseif ($row_order_1['status'] == 1 ){ ?>
                                                        <div> Chấp nhận</div>
                                                    <?php }elseif ($row_order_1['status'] == 2 ){ ?>
                                                        <div> Hoàn Thành </div>
                                                    <?php }else{ ?>
                                                        <div> Hủy </div>
                                                    <?php }?></td>
                                            </tr>
                                            </thead>
                                            <tbody id="profileTbody">
                                            <!-- Insert Data -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End -->
            </div>
        </div>
    </div>
</div>
    <script src="https://code.jquery.com/jquery-latest.js"></script>

<?php } ?>
<!-- end login-->