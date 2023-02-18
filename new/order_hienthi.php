<?php if(isset($_SESSION['hienthichitietdon'])&& ($_SESSION['hienthichitietdon']==1)){ ?>
<script>
document.getElementById("userProfile").click();
document.getElementById("s_profileOrder").click();
document.getElementById("userProfile1").click();
</script>"
<?php unset($_SESSION["hienthichitietdon"]);
    header("location:javascript://history.go(-1)");
}

?>