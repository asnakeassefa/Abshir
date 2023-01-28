
<link href="../css/card.css" type="text/css" rel="stylesheet">

<?php
include "connection.php";
include "navbar.php";

if($_SERVER["REQUEST_METHOD"] == "POST" and isset($_REQUEST["search"]))
{
    $search =  strtolower($_REQUEST["search"]);
    $query = "SELECT * from item where lower(item_name) like '%$search%'";
    $data = mysqli_fetch_assoc(mysqli_query($conn,$query));

    if($data){
    $item_id = $data['item_id'];
    $price = $data['price'];
    echo '<div class = "product">';
    echo '<img id = "img" src='.$data['img_name'].'>';
    echo $data['item_name'];
    echo $data['item_type'];
    echo $data['item_description'];
    echo "<form method = \"post\">
    <button class=\"glow-on-hover\" onclick=\"pop()\" name = \"btn1\" value = \"true\">Order Now</button>
    </form>";
    echo '</div>';
    if($_SERVER["REQUEST_METHOD"] == "POST" and $_REQUEST["btn1"]){
        echo "TEST: ". $item_id . ' ' . $price;
        $sell = "INSERT INTO sell (item_id,sell) VALUES($item_id,$price)";
        mysqli_query($conn,$sell);
        $ava = (int)$data["qty"]-1;
        echo $ava;
        $query = "UPDATE item SET qty=$ava where item_name='$btn'";
        mysqli_query($conn,$query);
        if($ava == 0){
            $query = "UPDATE item set available = 0 where item_name='$btn'";
            mysqli_query($conn,$query);
        }
    }
}else{
    echo '<div class="notfound">';
    echo '<h1>search is not found!...</h1>';
    echo '</div>';
}
}
include "footer.php";
?>

<style>
    .notfound{
    height: 100vh;
    width: 100%;
    }
    .notfound h1{
        font-size:60px;
    }
</style>