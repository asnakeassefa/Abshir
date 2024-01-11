
<?php session_start();

if(!isset($_SESSION['admin'])){
    header("Location: adminlogin.php");
}
?>

<body>
    
<?php
    include "../connection.php";
    include "adminnav.php";
?>
<link href="../../css/bulma.min.css" type="text/css" rel="stylesheet">
<link href="../../css/style.css" type="text/css" rel="stylesheet">
<link href="../../css/itemStyle.css" type="text/css" rel="stylesheet">
<link href="../../css/admin.css" type="text/css" rel="stylesheet">

<div class=report>
    <div class="sidebar">
        <ul>
            <li><a href="?page=dashboard">DASHBOARD</a></li>
            <li><a href="?page=add_item">ADD AN ITEM</a></li>
            <li><a href="?page=remove_user">REMOVE USER</a></li>
            <li><a href="?page=remove_item">REMOVE ITEM</a></li>
            <li><a href="?page=add_admin">ADD AN ADMIN</a></li>
            <li><a href="?page=update">UPDATE ITEM</a></li>
            <li><a href="?page=logout">logout</a></li>
        </ul>
    </div>

    <?php
        if ($_REQUEST['page'] == 'dashboard' || !isset($_REQUEST['page']))
            include "statuser.php";
        else if ($_REQUEST['page'] == 'add_item')
            include "../input.php";
        else if ($_REQUEST['page'] == 'remove_user')
            include "removeuser.php";
        else if ($_REQUEST['page'] == 'remove_item')
            include "removeitem.php";
        elseif ($_REQUEST['page'] == 'add_admin')
            include "adminadd.php";
        elseif ($_REQUEST['page'] == 'update')
            include "update.php";
        elseif ($_REQUEST['page'] == 'logout')
            {
                unset($_SESSION['admin']);
                header("Location:adminlogin.php");
            }
    ?>
</div>
<script type = "text/javascript" src="../js/script.js"></script>

</body>
</html>