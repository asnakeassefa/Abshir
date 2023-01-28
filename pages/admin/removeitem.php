

<?php
    include "../connection.php";
?>
<div class="detail">
    <div class="user">
<form method="post" action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>">
    ITEM ID:
    <input type = "number" name="id">
    <button type="submit" name="delete" value=1>DELETE</button>
    <button type="submit" name="submit" value=1>submit</button>
</form>


<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){

    $id = (int)$_REQUEST['id'];
    $query = "SELECT * from item where item_id='$id'";

    $result = mysqli_fetch_assoc(mysqli_query($conn,$query));
    $_SESSION['id'] = $id;

    echo '<div class="table-wrapper">
    <table class="fl-table">
    <thead>
    <tr>
      <th class="header">item</th>
      <th class="header">value</th>
    </tr>
  </thead>
  <tbody>';

    echo'<tr>
        <td>item name</td>
        <td>'.$result["item_name"].'</td>
        </tr>';
    echo'<tr>
    <td>item type</td>
    <td>'.$result["item_type"].'</td>
    </tr>';
    echo'<tr>
    <td>price</td>
    <td>'.$result["price"].'</td>
    </tr>';
    echo'<tr>
    <td>rent/sell</td>
    <td>'.$result["sell_type"].'</td>
    </tr>';
    echo "</tbody>
    </table>
    </div>";

    if(isset($_SESSION['id'])){
        (int)$del = $_REQUEST['delete'];
        var_dump($_REQUEST['delete']);
        var_dump($id);
        if($del == 1){
            $id = $_SESSION['id'];
            $query = "UPDATE item set available = 0 where item_id=$id";
            $result = mysqli_query($conn,$query);
            if($result){
                echo "record Deleted";
            }
            else{
                echo "Error deleting record: " . mysqli_error($conn);
            }
            unset($_SESSION['id']);
        }
    }
} else{
    echo '<div class="table-wrapper">
    <table class="fl-table">
    <thead>
    <tr>
      <th class="header">item</th>
      <th class="header">value</th>
    </tr>
  </thead>
  <tbody>';

    echo'<tr>
        <td>item name</td>
        <td>'.$result["item_name"].'</td>
        </tr>';
    echo'<tr>
    <td>item type</td>
    <td>'.$result["item_type"].'</td>
    </tr>';
    echo'<tr>
    <td>price</td>
    <td>'.$result["price"].'</td>
    </tr>';
    echo'<tr>
    <td>rent/sell</td>
    <td>'.$result["sell_type"].'</td>
    </tr>';
    echo "</tbody>
    </table>
    </div>";
}
?>

    </div>
</div>