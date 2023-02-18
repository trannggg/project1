<!DOCTYPE html>
<!--=== Coding by CodingLab | www.codinglabweb.com === -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!----======== CSS ======== -->
<!--    <link rel="stylesheet" href="../style.css">-->

    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="admin1.css">


    <!--<title>Admin Dashboard Panel</title>-->
</head>
<body>
<?php
require_once('nav.php');
require_once ('../connect_db/connect_db.php');
//$sql_product="select * from product order by id desc";
//$result=mysqli_query($conn,$sql_product );

$search = (isset($_GET['search'])) ? $_GET['search'] : '';
$trang = (isset($_GET['trang'])) ? $_GET['trang'] : '1';


//    $trang =1;
$sql_so_son="select count(*) from product where title like '%$search%'";
$mang_so_trang=mysqli_query($conn,$sql_so_son);
$ketqua_so_son=mysqli_fetch_array($mang_so_trang);
$so_son=$ketqua_so_son['count(*)'];

$so_son_tren_1_trang=5;
$so_trang= ceil($so_son/$so_son_tren_1_trang);
$bo_qua=$so_son_tren_1_trang *($trang-1);





$sql_product="select * from product where title like '%$search%' order by id desc limit $so_son_tren_1_trang   offset $bo_qua ";
$result=mysqli_query($conn,$sql_product );

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

    <div class="dash-content">
        <div class="overview">
            <div class="title">
                <i class="uil uil-tachometer-fast-alt"></i>
                <span class="text">Dashboard</span>
            </div>
            <?php
            $sql_total_order=" select count(id) from order_1";
            $sql_total_account="select count(id) from customer where role_id=1";
            $result_total_order=mysqli_fetch_array(mysqli_query($conn,$sql_total_order));
            $result_total_account=mysqli_fetch_array(mysqli_query($conn,$sql_total_account));



            ?>
            <div class="boxes">
                <div class="box box1">
                    <i class="uil uil-shopping-bag"></i>
                    <span class="text">Total Order</span>
                    <span class="number"><?php echo $result_total_order['count(id)'] ?></span>
                </div>
<!--                <div class="box box2">-->
<!--                    <i class="uil uil-comments"></i>-->
<!--                    <span class="text">Comments</span>-->
<!--                    <span class="number">1</span>-->
<!--                </div>-->
                <div class="box box2">
                    <i class="uil uil-user"></i>
                    <span class="text">Total Account</span>
                    <span class="number"><?php echo $result_total_account['count(id)'] ?></span>
                </div>
            </div>
        </div>

        <div class="activity">
            <div class="title">
                <i class="uil uil-clock-three"></i>
                <span class="text">Recent Activity Paint</span>
            </div>

            <div class="activity-data">
                <table width="100%">
                    <tr style="text-align: center">
                        <th> Mã</th>
                        <th> Ảnh</th>
                        <th> Tên Sơn </th>
                        <th>Màu</th>                        
                        <th>Số lượng </th>
                    </tr>

                    <?php while ($row=mysqli_fetch_array($result)){?>
                    <tr style="text-align: center">
                        <td><?php echo $row['id'] ?></td>
                        <td>
                        <?php echo "<img src='../img/" . $row['thumbnail'] . "' alt='img'"."style='width: 80px;'>";?></td>
                        <td><?php echo $row['title'] ?></td>
                        <td><?php echo $row['color'] ?></td>
                        <td><?php echo $row['quantity'] ?></td>
                    </tr>
                    <?php } ?>
                </table>

            </div>
            <div>
                <span>&#171;<span><?php
                        for ($i=1;$i<=$so_trang; $i++){?>
                            <a href="?trang=<?php echo$i?>&search=<?php echo$search ?>">
                                <?php echo $i?></a>
                        <?php } ?></span>&#187;</span>
            </div>
        </div>
    </div>
</section>
<script src="admin.js"></script>
<!--<script src="script.js"></script>-->
</body>
</html>