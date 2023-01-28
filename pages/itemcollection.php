<?php
declare( strict_types=1 );
session_start();
?>

<link href="../css/card.css" type="text/css" rel="stylesheet">

<?php

if(!isset($_SESSION['username'])){
    header("Location: login.php");
}

else{
    include "connection.php";
    include "navbar.php";

$get_data = "SELECT item_name,item_type,price,item_description,img_name,sell_type,qty FROM item where available>0";
$car_names =mysqli_query($conn,$get_data);

echo '<div class="cartwrap">';
while($item =mysqli_fetch_assoc($car_names))
{
   echo '<div class="cart">
   <img id = "img" src="'.$item["img_name"].'">
   <h3>'.$item["item_name"].'</h3>
   <strong>price $'.$item["price"].'</strong>
    <p>'.$item["item_description"].'</p>
    <strong> For '.$item["sell_type"].'</strong>';
    echo 'Quantity '.$item["qty"];
    echo '<a href="product.php?name='.$item['item_name'].'">
    <button class="glow-on-hover" onclick="pop()" name = "btn">Order Now</button>
    </a>
    </div>';
}
echo '</div>';
}
include "footer.php";
?>

