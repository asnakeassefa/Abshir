<link href="../css/card.css" type="text/css" rel="stylesheet">

<?php
include "connection.php";
include "navbar.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_REQUEST["search"])) {
    $search = strtolower($_REQUEST["search"]);
    $query = "SELECT * from item where lower(item_name) like '%$search%'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        while ($data = mysqli_fetch_assoc($result)) {
            $item_id = $data['item_id'];
            $price = $data['price'];

            echo '<div class="product">';
            echo '<img id="img" src=' . $data['img_name'] . '>';
            echo 'Item Name : ';
            echo $data['item_name'];
            echo '<br> Item Type : ';
            echo $data['item_type'];
            echo '<br> Description : ';
            echo $data['item_description'];
            echo "<form method=\"post\">
                <button class=\"glow-on-hover\" onclick=\"pop()\" name=\"btn1\" value=\"$item_id\">Order Now</button>
                </form>";
            echo '</div>';
        }
    } else {
        echo '<div class="notfound">';
        echo '<h1>Search is not found!...</h1>';
        echo '</div>';
    }
}

include "footer.php";
?>
