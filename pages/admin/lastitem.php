

<?php
    include "connection.php";
?>
<link href="../../css/admin.css" type="text/css" rel="stylesheet">

<?php
    //diplay user

    $query = "SELECT * FROM user order by id limit 10";

    $data = mysqli_query($conn,$query);
    echo '<div class="table-wrapper">
    <table class="fl-table">
    <thead>
    <tr>
      <th class="header">username</th>
      <th class="header">email</th>
    </tr>
  </thead>
  <tbody>';
    while($user = mysqli_fetch_assoc($data)){
        echo
        '<tr>
        <td>'.$user["username"].'</td>
        <td>'.$user["email"]
        .'</td></tr>';
    }
    echo "
    </tbody>
    </table>
    </div>";

    $query = "SELECT * FROM item order by item_id desc limit 10";

    $data = mysqli_query($conn,$query);
    echo '<div class="table-wrapper">
    <table class="fl-table">
    <thead>
    <tr>
      <th class="header">Name</th>
      <th class="header">item_type</th>
      <th class="header">price</th>
      <th class="header">type</th>
    </tr>
  </thead>
  <tbody>';
    while($user = mysqli_fetch_assoc($data)){
        echo
        '<tr>
        <td>'.$user["item_name"].'</td>
        <td>'.$user["item_type"].'</td>
        <td>'.$user["price"].'</td>
        <td>'.$user["sell_type"].'</td>
        </tr>';
    }
    echo "
    </tbody>
    </table>
    </div>";
?>