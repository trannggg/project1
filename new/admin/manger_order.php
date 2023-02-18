<!DOCTYPE html>
<!--=== Coding by CodingLab | www.codinglabweb.com === -->
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!----======== CSS ======== -->
<!--  <link rel="stylesheet" href="../style3.css">-->

  <!----===== Iconscout CSS ===== -->
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
  <link rel="stylesheet" href="admin1.css">
    <link rel="stylesheet" href="admin3.css">
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
  <!--<title>Admin Dashboard Panel</title>-->
</head>
<body>
<?php
require_once('nav.php');
require_once("../connect_db/connect_db.php");


$updateOrder = (isset($_GET['updateOrder'])) ? $_GET['updateOrder'] : '';
if ($updateOrder) {
    $upID = $_GET['updateOrder'];
    $sql_up = "select * from product where id= " . $upID . "";
    $query_up = mysqli_query($conn, $sql_up);
    $result_up = mysqli_fetch_array($query_up);
} else {
    $result_up['id'] = '';
    $result_up['title'] = '';
    $result_up['color'] = '';
    $result_up['category'] = '';
    $result_up['price'] = '';
    $result_up['quantity'] = '';
    $result_up['thumbnail'] = '';
    $result_up['quantity'] = '';
    $result_up['description'] = '';
    $result_up['picture'] = '';
}


?>
<section class="dashboard">
  <div class="top">
    <i class="uil uil-bars sidebar-toggle"></i>

    <div class="search-box">
      <i class="uil uil-search"></i>
      <input type="text" placeholder="Search here...">
    </div>

    <!--<img src="images/profile.jpg" alt="">-->
  </div>
    <div class=" mb-4" style="padding-top: 70px; display: none">
        <div class="frms container" id="form-id">
                <div class="form-row">
<!--                    <div class="form-group col-md-4">-->
<!--                        <label for="code">Mã Sản Phẩm: </label>-->
<!--                        <input type="text" class="form-control" id="code" placeholder="Code" name="" value="">-->
<!--                    </div>-->
                    <div class="form-group col-md-4">
                        <label for="name">Tên nhận hàng </label>
                        
                    </div>
                    <div class="form-group col-md-4">
                        <label for="material">Số điện thoại  </label>
                        
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="publisher_name"> Địa chỉ</label>
                       
                    </div>
                    <div class="form-group col-md-4">
                        <label for="publication_date">Tổng tiền </label>
                        
                    </div>
<!--                    <div class="form-group col-md-4">-->
<!--                        <label for="amount">Sách  </label>-->
<!--                        <input type="text" class="form-control" id="amount" placeholder="Thể Loại" name="category" required="" value="">-->
<!--                    </div>-->
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="amount">Sách </label>
                        
                    </div>
                    <div class="form-group col-md-4">
                        <label for="amount">Số lượng </label>
                       
                    </div>

                </div>
                <div class="form-group col-md-4">
                    <label for="publication_date">Tổng tiền </label>
                    
                </div>
<!--                <div class="form-group col-md-3">-->
<!--                    <label for="image">Hình Sản Phẩm: </label>-->
<!--                    <input type="file" class="form-control-file btn-outline-info" id="thumbnail" name="thumbnail" required="" value="">-->
<!--                </div>-->
<!--                <div class="form-group col-md-4">-->
<!--                    <label for="amount">Mô tả </label>-->
<!--                    <textarea type="text" name="description" class="form-control" id="amount" placeholder="Mô tả" style="    width: 212%;    height: 108px;"> </textarea>-->
<!--                </div>-->
                <div class="text-center" id="actbutton">
                    <button type="submit" class="btn btn-outline-success btn-sm" id="add_new">Cập nhật đơn hàng</button>
                </div>
        </div>
    </div>
  <div class="dash-content">
    <div class="overview">
      <div class="activity">
        <div class="title">
          <i class="uil uil-clock-three"></i>
          <span class="text">Quản lý đơn hàng</span>
        </div>
          <div class="category-right-top-item">
              <select name="" id="" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value)">
                  <option value=""> Lọc đơn hàng theo tài khoản</option>
                  <option value="?filter_user=" <?php if(1){echo'selected';} ?> > Tất cả đơn hàng</option>
                  <?php
                  $filter_user = (isset($_GET['filter_user'])) ? $_GET['filter_user'] : '';
                  $sql_order="select * from customer where role_id=1";
                  $customer_query=mysqli_query($conn,$sql_order);
                  while ($row=mysqli_fetch_array($customer_query)){?>
                      <option value="?filter_user=<?php echo$row['id']; ?> " <?php if($filter_user==$row['id']){echo'selected';} ?>>  <?php echo $row['email']; ?></option>
                  <?php } ?>

              </select>

          </div>
          <style>
              .activity table td {
                  border: 1px solid rgba(0,0,0,0.1);
              }
          </style>
        <table width="100%" style="text-align: center" >
            <thead class="thead-light ">
          <tr >
                <th>Mã Order</th>
                <th>Tên nhận hàng</th>
                <th>Ngày tạo</th>
                <th>SĐT</th>
                <th>Địa chỉ</th>
                <th>Phương thức thanh toán</th>
                <th>Trạng thái</th>
                <th>Tổng tiền</th>
                <th>Chi tiết </th>
<!--                <th>Sửa</th>-->
                <th>Tính Năng</th>
          </tr>
            <?php

            $status = (isset($_GET['status'])) ? $_GET['status'] : '';
            if(isset($_GET['status'])) {
                if ($status == 0) {
                    $sql_status = " update order_1 set status = '0' where id='".$_GET['ID']."' ";
                } elseif ($status == 1) {
                    $sql_status = " update order_1 set status = '1' where id='".$_GET['ID']."' ";
                }elseif( $status == 2){
                    $sql_status = " update order_1 set status = '2' where id='".$_GET['ID']."' ";
                }else{
                    $sql_status = " update order_1 set status = '3' where id='".$_GET['ID']."' ";
                }
                mysqli_query($conn,$sql_status);
            }
            ?>

            <?php

            $sql_filter_user="select * from order_1 where user_id like '%$filter_user'";
            $filter_user_query=mysqli_query($conn,$sql_filter_user);
            while ($row=mysqli_fetch_array($filter_user_query)){?>
            <tr>
                <td> <?php echo $row['id'] ?></td>
                <td> <?php echo $row['full_name'] ?></td>
                <td> <?php echo date('d/m/Y',strtotime($row['order_date'])) ?></td>
                <td> <?php echo $row['phone_number'] ?></td>
                <td> <?php echo $row['address'].'-sdt:'.$row['phone_number'] ?> </td>
                <td> COD</td>
                <?php

                ?>
                <td>  <select class="form-control" name="" id="" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value)" >
                        <option value="?status=0&ID=<?php echo $row['id']; ?>&filter_user=<?php echo$filter_user ?>" <?php if( $row['status']==0 ){ echo "selected"; } ?>> <div> Chờ </div> </option>
                        <option value="?status=1&ID=<?php echo $row['id']; ?>&filter_user=<?php echo$filter_user ?>" <?php if($row['status']==1){ echo "selected"; } ?> > <div> Chấp Nhận </div></option>
                        <option value="?status=2&ID=<?php echo $row['id']; ?>&filter_user=<?php echo$filter_user ?>" <?php if($row['status']==2){ echo "selected"; } ?> ><div> Hoàn Thành </div></option>
                        <option value="?status=3&ID=<?php echo $row['id']; ?>&filter_user=<?php echo$filter_user ?>"<?php if($row['status']==3){ echo "selected"; } ?> ><div> Hủy </div></option>

                    </select>
                </td>
                <td>
                    <a><?php echo $row['total_money'] ?><sup>đ</sup></a>
                </td>
                <td>
                    <table style="width: 345px;">
<!--                        <tr>-->
<!--                            <th> Sach </th>-->
<!--                            <th>So Luong</th>-->
<!---->
<!--                        </tr>-->
                    <?php $sql_product ="SELECT product_id , quantity FROM order_detail WHERE order_id = ".$row['id']." ";
                        $product_query=mysqli_query($conn,$sql_product);
                        while ($row1=mysqli_fetch_array($product_query)){
                                $sql_product1 ="SELECT title FROM product WHERE id = ".$row1['product_id']." ";

                                $product_query1=mysqli_query($conn,$sql_product1);
                                $row2=mysqli_fetch_array($product_query1);
                                ?>

                                <tr>
                                    <td><?php echo $row2['title'].' - soluong: '.$row1['quantity']  ?></td>
<!--                                    --><?php //echo $row1['quantity'] ?>

                                </tr>

                            <?php } ?>
                    </table>
                 </td>
<!--                <td><a href="manger_order.php?updateOrder=--><?php //echo$row['id'] ?><!--">S</a></td>-->
                <td>
<!--                    <a href="delete_order.php?delete=--><?php //echo $row['id']  ?><!--"  onclick="return confirm('bạn có chắc muốn xoá đơn này ?')">X</a>-->

                    <a href="delete_order.php?delete=<?php echo $row['id']  ?>" onclick="return confirm('bạn có chắc muốn xoá đơn hàng này ?')" >
                        <button class="btn btn-primary btn-sm trash" title="Xóa" ><i
                                class="fas fa-trash-alt" style="color: white"></i>
                        </button>
                    </a>
                </td>

            </tr>
            <?php } ?>

            </thead>
        </table>
      </div>
    </div>
</section>
<script src="admin.js"></script>

<!--<script src="script.js"></script>-->
</body>
</html>