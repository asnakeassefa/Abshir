

<?php
    include "../connection.php";
?>
<div class="detail">
    <div class="user">
<form method="post" action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>">
    USER ID:
    <input type = "number" name="id">
    <button type="submit" name="delete" value=1>DELETE</button>
    <button type="submit" name="submit" value=1>submit</button>
</form>


<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){

    $id = (int)$_REQUEST['id'];
    $query = "select * from user where id='$id'";

    $result = mysqli_fetch_assoc(mysqli_query($conn,$query));
    $_SESSION['id'] = $id;
    echo '<div class="table-wrapper">
    <table class="fl-table">
    <thead>
    <tr>
      <th class="header">user detail</th>
      <th class="header">value</th>
    </tr>
  </thead>
  <tbody>';
    echo'<tr>
        <td>USER NAME</td>
        <td>'.$result["username"].'</td>
        </tr>';
    echo'<tr>
    <td>USER EMAIL</td>
    <td>'.$result["email"].'</td>
    </tr>';
    echo'<tr>
    <td>REGISTED IN</td>
    <td>'.$result["reg_date"].'</td>
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
            $query = "DELETE from user where id=$id";
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
}
else{
    echo '<div class="table-wrapper">
    <table class="fl-table">
    <thead>
    <tr>
      <th class="header">user detail</th>
      <th class="header">value</th>
    </tr>
  </thead>
  <tbody>';
    echo'<tr>
        <td>USER NAME</td>
        <td>'.$result["username"].'</td>
        </tr>';
    echo'<tr>
    <td>USER EMAIL</td>
    <td>'.$result["email"].'</td>
    </tr>';
    echo'<tr>
    <td>REGISTED IN</td>
    <td>'.$result["reg_date"].'</td>
    </tr>';
    echo "</tbody>
    </table>
    </div>";
}
?>

    </div>
</div>