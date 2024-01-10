
    <link href="../css/itemStyle.css" type="text/css" rel="stylesheet">
    <link href="../css/card.css" type="text/css" rel="stylesheet">
    <link href="../css/all.min.css" rel="stylesheet">
    <link href="../css/fontawesome.min.css" rel="stylesheet">

    <div class="popup" id="pop">
        <p>Thank you<br>you orderd successfully!</p>
        <i class="fas fa-times" onclick="popdown()"></i>
    </div>

<?php
include "connection.php";
include "navbar.php";
    
    $btn = $_REQUEST["name"];
    $query = "SELECT * from item where item_name='$btn'";
    echo '<div class="offices">
        <div class="office3">';
    $data = mysqli_fetch_assoc(mysqli_query($conn,$query));
    $item_id = $data['item_id'];
    $price = $data['price'];
    echo '<div class = "office">';
    echo '<img id = "img" src='.$data['img_name'].'>';
    echo '<h3>'.$data['item_name'].'</h3>';
    echo '<h3>'.$data['item_type'].'</h3>';
    echo '<p>'.$data['item_description'].'</p>';
    echo "<form method = \"post\">
    <button class=\"glow-on-hover\" onclick=\"pop();\" name = \"btn1\" value = \"true\">Order Now</button>
    </form>";
    echo '</div>';
    echo ' </div>
    </div>';

    if($_SERVER["REQUEST_METHOD"] == "POST" and $_REQUEST["btn1"]){
        echo "TEST: ". $item_id . ' ' . $price;
        $sell = "INSERT INTO sell (item_id,sell) VALUES($item_id,$price)";
        mysqli_query($conn,$sell);
        $ava = (int)$data["qty"]-1;
        echo $ava;
        $query = "UPDATE item SET qty=$ava where item_name='$btn'";
        if(mysqli_query($conn,$query)){
            echo '<script type="text/javascript">',
            'pop();',
            '</script>';
        }
        if($ava == 0){
            $query = "UPDATE item set available = 0 where item_name='$btn'";
            mysqli_query($conn,$query);
        }
    }
// }
include "footer.php";
?>

<script type = "text/javascript" src="../js/script.js"></script>