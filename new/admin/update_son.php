<?php

require_once "../connect_db/connect_db.php";
    $son_id = $_GET['ID'];
    $son_name = $_POST['title'];
    $color = $_POST['color'];
    $picture = $_FILES['picture']['name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
//    $thumbnail = $_POST['thumbnail'];
    $description = $_POST['description'];

    $image = $_FILES['thumbnail']['name'];
////    $image_temp=$_FILES['image']['tmp_name'];
//    move_uploaded_file($image_temp , "../$image");
    if ($_SERVER['REQUEST_METHOD'] !== 'POST')
    {
        // Dữ liệu gửi lên server không bằng phương thức post
        echo "Phải Post dữ liệu";
        die;
    }

    // Kiểm tra có dữ liệu fileupload trong $_FILES không
    // Nếu không có thì dừng

    if ($image) {


        $query = " update product set title  = '".$son_name."', price='".$price."',
    quantity='".$quantity."',
    color='".$color."',
    thumbnail='".$image."',
    category='".$category."',
    description='".$description."',
    picture='".$picture."'
    where id='".$son_id."'";
        if (!isset($_FILES["thumbnail"])) {
            echo "Dữ liệu không đúng cấu trúc";
            die();
        }
        // Kiểm tra dữ liệu có bị lỗi không
        if ($_FILES["thumbnail"]['error'] != 0) {
            echo "Dữ liệu upload bị lỗi";
            die();
        }

        // Đã có dữ liệu upload, thực hiện xử lý file upload

        //Thư mục bạn sẽ lưu file upload
        $target_dir = "../img/";
        //Vị trí file lưu tạm trong server (file sẽ lưu trong uploads, với tên giống tên ban đầu)
        $target_file = $target_dir . basename($_FILES["thumbnail"]["name"]);

        $allowUpload = true;

        //Lấy phần mở rộng của file (jpg, png, ...)
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

        // Cỡ lớn nhất được upload (bytes)
        $maxfilesize = 800000;

        ////Những loại file được phép upload
        $allowtypes = array('jpg', 'png', 'jpeg', 'gif');


        if (isset($_POST["submit"])) {
            //Kiểm tra xem có phải là ảnh bằng hàm getimagesize
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if ($check !== false) {
                echo "Đây là file ảnh - " . $check["mime"] . ".";
                $allowUpload = true;
            } else {
                echo "Không phải file ảnh.";
                $allowUpload = false;
            }
        }

        // Kiểm tra nếu file đã tồn tại thì không cho phép ghi đè
        // Bạn có thể phát triển code để lưu thành một tên file khác
//            if (file_exists($target_file)) {
//                echo "Tên file đã tồn tại trên server, không được ghi đè";
//                $allowUpload = false;
//            }
        // Kiểm tra kích thước file upload cho vượt quá giới hạn cho phép
        if ($_FILES["thumbnail"]["size"] > $maxfilesize) {
            echo "Không được upload ảnh lớn hơn $maxfilesize (bytes).";
            $allowUpload = false;
        }


        // Kiểm tra kiểu file
        if (!in_array($imageFileType, $allowtypes)) {
            echo "Chỉ được upload các định dạng JPG, PNG, JPEG, GIF";
            $allowUpload = false;
        }


        if ($allowUpload) {
            // Xử lý di chuyển file tạm ra thư mục cần lưu trữ, dùng hàm move_uploaded_file
            if (move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $target_file)) {
                echo "File " . basename($_FILES["thumbnail"]["name"]) .
                    " Đã upload thành công.";

                echo "File lưu tại " . $target_file;

            } else {
                echo "Có lỗi xảy ra khi upload file.";
            }
        } else {
            echo "Không upload được file, có thể do file lớn, kiểu file không đúng ...";
        }

    }
    $result = mysqli_query($conn, $query);
    if($result){
        move_uploaded_file($_FILES["thumbnail"]["tmp_name"],"../img".$_FILES["thumbnail"]["tmp_name"]);
    }
    if($result)
    {
        header("location:manger_son.php?updateSon=".$son_id);

    }
    else
    {
        echo ' Please Check Your Query ';
    }
//else
//{
//    header("location:them.php");
//}
//
//



?>