<?php
declare(strict_types=1);
session_start();
?>

<link href="../css/card.css" type="text/css" rel="stylesheet">

<?php
include "connection.php";
include "navbar.php";

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Array to store selected item types
    $selectedItemTypes = [];

    // Check if car checkbox is selected
    if (isset($_POST['car']) && $_POST['car'] === 'on') {
        $selectedItemTypes[] = 'car';
    }

    // Check if house checkbox is selected
    if (isset($_POST['house']) && $_POST['house'] === 'on') {
        $selectedItemTypes[] = 'house';
    }

    // Check if office checkbox is selected
    if (isset($_POST['office']) && $_POST['office'] === 'on') {
        $selectedItemTypes[] = 'office';
    }

    // Generate SQL query based on selected item types
    $itemTypeCondition = implode("', '", $selectedItemTypes);
    $itemTypeCondition = "('" . $itemTypeCondition . "')";

    if (!empty($selectedItemTypes)) {
        $itemTypeCondition = implode("', '", $selectedItemTypes);
        $itemTypeCondition = "('" . $itemTypeCondition . "')";

        $get_data = "SELECT item_name, item_type, price, item_description, img_name, sell_type, qty
                     FROM customerPost
                     WHERE available > 0 AND item_type IN $itemTypeCondition";
    } else {
        // Default query without filtering if no checkboxes are selected
        $get_data = "SELECT item_name, item_type, price, item_description, img_name, sell_type, qty
                     FROM customerPost
                     WHERE available > 0";
    }
} else {
    // Default query without filtering
    $get_data = "SELECT item_name, item_type, price, item_description, img_name, sell_type, qty
                 FROM customerPost
                 WHERE available > 0";
}

$car_names = mysqli_query($conn, $get_data);

// Display checkboxes for filtering
echo '<form method="post" action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '">
      <label><input type="checkbox" name="car"> Car</label>
      <label><input type="checkbox" name="house"> House</label>
      <label><input type="checkbox" name="office"> Office</label>
      <button type="submit">Filter</button>
      </form>';

echo '<div class="cartwrap">';
while ($item = mysqli_fetch_assoc($car_names)) {
    echo '<div class="cart">
              <img id="img" src="' . $item["img_name"] . '">
              <h3>' . $item["item_name"] . '</h3>
              <strong>price $' . $item["price"] . '</strong>
              <p>' . $item["item_description"] . '</p>
              <strong> For ' . $item["sell_type"] . '</strong>';
    echo 'Quantity ' . $item["qty"];
    echo '<a href="product.php?name=' . $item['item_name'] . '">
              <button class="glow-on-hover" onclick="pop()" name="btn">Order Now</button>
          </a>
          </div>';
}
echo '</div>';
include "footer.php";
?>
