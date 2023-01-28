<?php
    session_start();
    require "../connection.php";
    if(isset($_SESSION['admin'])){
        $url = '<li>'.$_SESSION["admin"].'</li>'.'<li><a href="../logout.php?page=admin">logout</a></li>';
    }   
    else{

    }
?>

<head>
    <link href="../../css/all.min.css" rel="stylesheet">
    <link href="../../css/fontawesome.min.css" rel="stylesheet">
    <link href="../../css/navbar.css" rel="stylesheet">
    
    <title>Abishir commerce center</title>
</head>

    <div class="nav" id="nav">
             <h1>Abshir</h1>
             <div class="links">
             <ul id="menulist"class="menu">
                <li><a href="index.php">Home</a></li>
                    <li><a href="../itemcollection.php">Items</a></li>
                    <li><a href="../contactuspage.html">Contact</a></li>
                    <?php echo $url; ?>
                </ul>
            <i class="fas fa-bars" id="l" onclick="togglemenu()"></i>
            <i class="fas fa-times" id="x" onclick="cancel()"></i>
            </div>
        </div>
        <script type = "text/javascript" src="../../js/script.js"></script>