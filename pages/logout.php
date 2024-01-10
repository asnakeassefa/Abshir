
<?php
session_start();
if ($_REQUEST['page']=='admin'){
    unset($_SESSION['admin']);
    header("Location:admin/adminlogin.php");
}
else if ($_REQUEST['page']=='user'){
    unset($_SESSION['username']);
    header("Location:index.php");
}
?>