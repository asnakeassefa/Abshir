
<?php
    $servername = "localhost";
    $user = "root";
    $pass = "Asnake@12";
    $db = "user";

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $conn = mysqli_connect($servername,$user,$pass,$db);
    if(!$conn){
        echo "connection faild";
    }
?>
