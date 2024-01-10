
<?php
   if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
    require "connection.php";
    if(isset($_SESSION['username'])){
        $url = '<li>'.$_SESSION["username"].'</li>'.'<li><a href = "logout.php?page=user">logout</a></li>';
    }
    else{
        $url = '<li><a href="login.php">signup/login</a></li>';
    }
?>

<head>
    <link href="../css/navbar.css" type="text/css" rel="stylesheet">
    <link href="../css/all.min.css" rel="stylesheet">
    <link href="../css/fontawesome.min.css" rel="stylesheet">
    
    <title>Abishir commerce center</title>
</head>

    <div class="nav" id="nav">
             <h1>Abshir</h1>
             <div class="links">
             <ul id="menulist"class="menu">
                <li><a href="index.php">Home</a></li>
                        <li><a href="itemcollection.php">Items</a></li>
                        <li><a href="item.php">Gallary</a></li>

a href="about.php">About</a></li>
                        <li><a href="contactus.php">Contact</a></li>
                        <?php echo $url; ?>
                </ul>
            <i class="fas fa-bars" id="l" onclick="togglemenu()"></i>
            <i class="fas fa-times" id="x" onclick="cancel()"></i> 
            </div>
        </div>
        <script type = "text/javascript" src="../js/script.js"></script>