<?php if(isset($_GET['user_id'])){
    $_SESSION['hienthichitietuser']=1?>
<?php  }?>
<?php if(isset($_SESSION['hienthichitietuser'])&& ($_SESSION['hienthichitietuser']==1)){ ?>
<script>
document.getElementById("show-emp1").click();
</script>"
<?php unset($_SESSION["hienthichitietuser"]);
    header("location:javascript://history.go(-1)");
}

?>