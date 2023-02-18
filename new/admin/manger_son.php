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
$sql_product="select * from product order by id desc";
$result=mysqli_query($conn,$sql_product );
?>

<section class="dashboard">
    <div class="top">
        <i class="uil uil-bars sidebar-toggle"></i>

        <div class="search-box">
            <i class="uil uil-search"></i>
            <input type="text" placeholder="Search here...">
        </div>

    </div>

    <?php
    $update_son = (isset($_GET['updateSon'])) ? $_GET['updateSon'] : '';
    if($update_son) {
        $upID = $_GET['updateSon'];
        $sql_up = "select * from product where id= " . $upID . "";
        $query_up = mysqli_query($conn, $sql_up);
        $result_up = mysqli_fetch_array($query_up);
    }else{
        $result_up['id']='';
        $result_up['title']='';
        $result_up['color']='';
        $result_up['picture']='';
        $result_up['category']='';
        $result_up['price']='';
        $result_up['quantity']='';
        $result_up['thumbnail']='';
        $result_up['quantity']='';
        $result_up['description']='';

    }

    ?>
    <div class="dash-content">
        <div class="overview">
            <!-- add son -->
            <div class=" mb-4" style="padding-top: 20px">
                <div class="frms container" id="form-id">
                    <form method="post"  <?php if($update_son) { ?>action="update_son.php?ID=<?php echo $result_up['id'] ?>"<?php }else{ ?>action="add_son.php" <?php } ?> enctype="multipart/form-data" >
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="code">Mã Sản Phẩm: </label>
                            <input type="text" class="form-control" id="code" placeholder="Code" name="" value="<?php echo $result_up['id']; ?>" disabled>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="name">Tên Sơn: </label>
                            <input type="text" class="form-control" id="name" placeholder="Tên sơn" name="title" required="" value="<?php echo $result_up['title']; ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="material">Màu sắc: </label>
                            <input type="text" class="form-control" id="material" placeholder="Tác giả" name="color" required="" value="<?php echo $result_up['color']; ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="publisher_name">Ảnh màu: </label>
                            <input type="file" class="form-control" id="picture" placeholder="Ảnh màu" name="picture" required="" value="<?php echo $result_up['picture']; ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="amount">Thể loại: </label>
                            <input type="text" class="form-control" id="amount" placeholder="Thể Loại" name="category" required="" value="<?php echo $result_up['category']; ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="amount">Số Lượng: </label>
                            <input type="number" class="form-control" id="amount" placeholder="Số lượng" name="quantity" required="" value="<?php echo $result_up['quantity']; ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="amount">Giá tiền </label>
                            <input type="number" class="form-control" id="amount" placeholder="Giá tiền" name="price" required="" value="<?php echo $result_up['price']; ?>">
                        </div>

                    </div>
                    <div class="form-group col-md-3">
                        <label for="image">Hình Sản Phẩm: </label>
                        <input type="file" class="form-control-file btn-outline-info" id="thumbnail" name="thumbnail" <?php if(!$update_son) { ?> required="" <?php } ?> value="<?php echo $result_up['thumbnail']; ?>">
                    </div>
                    <div class="form-group col-md-4" >
                        <label for="amount">Mô tả </label>
                        <textarea type="text" name="description" class="form-control" id="amount" placeholder="Mô tả" style="    width: 320%;    height: 108px;"><?php echo $result_up['description']; ?> </textarea>
                    </div>
                    <div class="text-center" id="actbutton">
                        <?php if($update_son) { ?>
                            <a href="manger_son.php"><button type="button" class="btn btn-outline-info btn-sm" id="update">Thoát</button></a>
                            <button type="submit" class="btn btn-outline-success btn-sm" id="update">Cập Nhật sản phẩm</button>

                        <?php }else{ ?>
                        <button type="submit" class="btn btn-outline-success btn-sm" id="add_new">Thêm sản phẩm</button>
                        <?php } ?>
                    </div>
                    </form>
                </div>
            </div>
            <!-- end add son -->
        <div class="activity" style="    font-size: 13px;">
            <div class="title">
                <i class="uil uil-clock-three"></i>
                <span class="text">Quản lý sơn</span>
            </div>
            <table width="100%">
                <tr style="text-align: center">
                    <th>Mã</th>
                    <th>Ảnh</th>
                    <th style="width: 156px;">Tên Sơn </th>
                    <th>Thể loại</th>
                    <th>Màu</th>
                    <th>Số lượng </th>
                    <th>Giá</th>
                    <th style="width: 270px;">Mô Tả</th>
                    <th>Tính năng</th>
<!--                    <th>Xóa</th>-->
                </tr>
                <?php while ($row=mysqli_fetch_array($result)){?>
                    <tr style="text-align: center">
                        <td><?php echo $row['id'] ?></td>
                        <td>
                            <?php echo "<img src='../img/" . $row['thumbnail'] . "' alt='img'"."style='width: 80px;'>";?></td>
                        <td><?php echo $row['title'] ?></td>
                        <td><?php echo $row['category'] ?></td>
                        <td><?php echo $row['color'] ?></td>
                        <td><?php echo $row['quantity'] ?></td>
                        <td><?php echo $row['price'] ?></td>
                        <td style="    text-overflow: ellipsis;
                                        display: -webkit-box;
                                        -webkit-line-clamp: 3;
                                        -webkit-box-orient: vertical;overflow: hidden;margin-top: 30px;">
                            <?php echo $row['description'] ?></td>
                      
                        <td>
                            <a href="delete_son.php?id=<?php echo $row["id"]; ?>" onclick="return confirm('bạn có chắc muốn xoá sơn này ?')" >
                            <button class="btn btn-primary btn-sm trash" title="Xóa" ><i
                                        class="fas fa-trash-alt" style="color: white"></i>
                            </button>
                            </a>
                            
                            <a href="manger_son.php?updateSon=<?php echo$row['id'] ?>">
                            <button class="btn btn-primary btn-sm edit" title="Sửa" id="show-emp" data-toggle="modal"
                                    data-target="#ModalUP"><i class="fas fa-edit"></i>
                            </button>
                            </a>
                        </td>
                    </tr>
                <?php } ?>


            </table>
        </div>
    </div>
</section>
<script src="admin.js"></script>
<!--<script src="script.js"></script>-->
</body>
</html>