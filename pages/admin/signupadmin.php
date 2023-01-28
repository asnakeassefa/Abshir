

<?php
    include "../connection.php";
    include "adminnav.php";
?>

<link href="../../css/login.css" type="text/css" rel="stylesheet">
<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $error = "";
    function special_chars($value)
    {
        return htmlspecialchars(stripslashes($value));
    }
    $username = special_chars($_REQUEST['username']);
    $email = special_chars($_REQUEST['email']);
    $password = special_chars($_REQUEST['password']);
    $pass = password_hash($password,PASSWORD_DEFAULT);
    $con_password = special_chars($_REQUEST['con_password']);

    if($password == $con_password){

        $check_username = "SELECT * FROM admin WHERE username = '$username'";
        $submit_data = "INSERT INTO admin (username,email,pass) VALUES ('$username','$email','$pass')";
        echo "in sql -|". $username;
        $result = mysqli_query($conn,$check_username);
        if(mysqli_num_rows(mysqli_query($conn,$check_username))){
            $error = "username or email is already existed";
            echo "in if";
        }else{
            if(mysqli_query($conn,$submit_data)){
                 echo "you registered";
                header("Location: login.php");
            }
        }
    }else{
        $error = "password doesn't match";
    }
}
?>

