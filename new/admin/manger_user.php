<!DOCTYPE html>
<!--=== Coding by CodingLab | www.codinglabweb.com === -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!----======== CSS ======== -->
<!--    <link rel="stylesheet" href="../style3.css">-->


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
require_once ('../connect_db/connect_db.php');
?>

<section class="dashboard">
    <div class="top">
        <i class="uil uil-bars sidebar-toggle"></i>

        <div class="search-box">
            <i class="uil uil-search"></i>
            <input type="text" placeholder="Search here...">
        </div>

    </div>
    <div class="dash-content">
        <div class="overview">
            <table class="table table-hover table-bordered js-copytextarea" cellpadding="0" cellspacing="0" border="0"
                   id="sampleTable">
                <thead>

                <tr>
<!--                    <th width="10"><input type="checkbox" id="all"></th>-->
                    <th>ID</th>
                    <th width="150">Họ và tên</th>
<!--                    <th width="20">Ảnh thẻ</th>-->
                    <th width="300">Địa chỉ</th>
<!--                    <th>Ngày sinh</th>-->
                    <th>SĐT</th>
                    <th>Email</th>
                    <th>Mật Khẩu</th>
                    <th width="100">Tính năng</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $sql_order="select * from customer where role_id=1";
                $customer_query=mysqli_query($conn,$sql_order);
                while ($row=mysqli_fetch_array($customer_query)){?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['full_name']; ?></td>
<!--                    <td><img class="img-card-person" src="/img-anhthe/1.jpg" alt=""></td>-->
                    <td><?php echo $row['address']; ?></td>
<!--                    <td>12/02/1999</td>-->
                    <td><?php echo $row['phone_number']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['password']; ?></td>
                    <td class="table-td-center"><button class="btn btn-primary btn-sm trash" type="button" title="Xóa"
                                                        onclick="myFunction(this)"><i class="fas fa-trash-alt"></i>
                        </button>
                        <a href="?user_id=<?php echo $row['id']; ?>">
                        <button class="btn btn-primary btn-sm edit" type="button"  ><i class="fas fa-edit"></i>
                        </button>

                        </a>
                        <button class="btn btn-primary btn-sm edit" type="button"  id="show-emp1"
                                data-toggle="modal" data-target="#profileModal" style="display: none"><i class="fas fa-edit"></i>
                        </button>
                    </td>
                </tr>
                <?php } ?>

                </tbody>
            </table>
        </div>

</section>
<div class="modal fade"  id="profileModal" tabindex="-1" role="dialog" aria-labelledby="profileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <?php $user_id=$_GET['user_id']; ?>
            <form method="post" action="updateAcc.php?user_id=<?php echo$user_id ?>" enctype="multipart/form-data" >
            <div class="modal-body">
                <div class="row">
                    <div class="form-group  col-md-12">
              <span class="thong-tin-thanh-toan">
                <h5>Chỉnh sửa thông tin tài khoản</h5>
              </span>
                    </div>
                </div>
                <?php
                $sql_user1="select * from customer where role_id=1 and id = $user_id";
                $customer_query=mysqli_query($conn,$sql_user1);
                $row_user1=mysqli_fetch_array($customer_query)?>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="control-label">ID</label>
                        <input class="form-control" type="text"  required value="<?php echo $row_user1['id']; ?>" disabled>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label">Họ và tên</label>
                        <input class="form-control" type="text" id="p_name" name="p_name" required value="<?php echo $row_user1['full_name']; ?>">
                    </div>
                    <div class="form-group  col-md-6">
                        <label class="control-label">Số điện thoại</label>
                        <input class="form-control" type="number" id="p_number" name="p_number" required value="<?php echo $row_user1['phone_number']; ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label">Địa chỉ</label>
                        <input class="form-control" type="text" id="p_address" name="p_address" required value="<?php echo $row_user1['address']; ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label">Địa chỉ email</label>
                        <input class="form-control" type="text" id="p_email" name="p_email" required value="<?php echo $row_user1['email']; ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="control-label">Mật Khẩu</label>
                        <input class="form-control" type="text" id="p_password" name="p_password" required value="<?php echo $row_user1['password']; ?>">
                    </div>
                </div>
<!--                <BR>-->
<!--                <a href="#" style="    float: right;-->
<!--        font-weight: 600;-->
<!--        color: #ea0000;">Chỉnh sửa nâng cao</a>-->
<!--                <BR>-->
                <BR>
                <button class="btn btn-outline-success" type="submit">Lưu lại</button>
                <a class="btn btn-outline-info" data-dismiss="modal" href="#">Hủy bỏ</a>
                <BR>
            </div>
            <div class="modal-footer">
            </div>
            </form>
        </div>
    </div>
</div>


<script src="admin.js"></script>
<!--<script src="script.js"></script>-->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<?php require_once("user_hienthi.php");?>
</body>
</html>