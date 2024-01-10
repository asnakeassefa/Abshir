<?php
declare(strict_types=1);
session_start();
?>

<style>
    /* Add some styling for better appearance */
    form {
        margin-top: 20px;
        text-align: center; 
    }

    label {
        margin-bottom: 5px;
        
    }

    input[type="number"] {
        width: 80px;
        padding: 5px;
        margin-bottom: 10px;
    }

    /* Other styles remain unchanged */
</style>

<link href="../css/card.css" type="text/css" rel="stylesheet">

<?php
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
} else {
    include "connection.php";
    include "navbar.php";

    echo '<form method="get" action="">';
    echo '<label for="minPrice">Min Price:</label>';
    echo '<input type="number" name="minPrice" id="minPrice" value="0" step="0.01">';
    echo '<label for="maxPrice">Max Price:</label>';
    echo '<input type="number" name="maxPrice" id="maxPrice" value="9999" step="0.01">';
    echo '<input type="submit" value="Filter">';
    echo '</form>';

    $get_data = "SELECT item_name, item_type, price, item_description, img_name, sell_type, qty FROM item WHERE available > 0";

    if (isset($_GET['minPrice']) && isset($_GET['maxPrice'])) {
        $minPrice = (float)$_GET['minPrice'];
        $maxPrice = (float)$_GET['maxPrice'];

        $get_data .= " AND price BETWEEN $minPrice AND $maxPrice";
    }

    $car_names = mysqli_query($conn, $get_data);

    echo '<div class="cartwrap">';
    while ($item = mysqli_fetch_assoc($car_names)) {
        echo '<div class="cart">
            <img id="img" src="'.$item["img_name"].'">
            <h3>'.$item["item_name"].'</h3>
            <strong>price $'.$item["price"].'</strong>
            <p>'.$item["item_description"].'</p>
            <strong> For '.$item["sell_type"].'</strong>';
        echo 'Quantity '.$item["qty"];
        echo '<a href="product.php?name='.$item['item_name'].'">
            <button class="glow-on-hover" onclick="pop()" name="btn">Order Now</button>
            </a>
            </div>';
    }
    echo '</div>';
}

include "footer.php";
?>
