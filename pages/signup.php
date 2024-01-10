
<?php
    include "connection.php";
    include "navbar.php";
?>
    <style media="screen">
      *,
*:before,
*:after{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
body{
    background-color: #080710;
}
.background{
    width: 430px;
    height: 520px;
    position: absolute;
    transform: translate(-50%,-50%);
    left: 50%;
    top: 50%;

}
.background .shape{
    height: 200px;
    width: 200px;
    position: absolute;
    border-radius: 50%;
}
.shape:first-child{
    background: linear-gradient(
        #1845ad,
        #23a2f6
    );
    left: -80px;
    top: -80px;
}
a {
    text-decoration: none;  
}
.shape:last-child{
    background: linear-gradient(
        to right,
        #ff512f,
        #f09819
    );
    right: -30px;
    bottom: -80px;
}
form{
    height: file_get_contents;
    width: 400px;
    background-color: rgba(255,255,255,0.13);
    position: absolute;
    transform: translate(-50%,-50%);
    top: 50%;
    left: 50%;
    border-radius: 10px;
    backdrop-filter: blur(10px);
    border: 2px solid rgba(255,255,255,0.1);
    box-shadow: 0 0 40px rgba(8,7,16,0.6);
    padding: 50px 35px;
}
form *{
    font-family: 'Poppins',sans-serif;
    color: #ffffff;
    letter-spacing: 0.5px;
    outline: none;
    border: none;
}
form h3{
    font-size: 32px;
    font-weight: 500;
    line-height: 42px;
    text-align: center;
}

label{
    display: block;
    margin-top: 30px;
    font-size: 16px;
    font-weight: 500;
}
input{
    display: block;
    height: 50px;
    width: 100%;
    background-color: rgba(255,255,255,0.07);
    border-radius: 3px;
    padding: 0 10px;
    margin-top: 8px;
    font-size: 14px;
    font-weight: 300;
}
::placeholder{
    color: #e5e5e5;
}
button{
    margin-top: 50px;
    width: 100%;
    background-color: #ffffff;
    color: #080710;
    padding: 15px 0;
    font-size: 18px;
    font-weight: 600;
    border-radius: 5px;
    cursor: pointer;
}
.social{
  margin-top: 30px;
  display: flex;
}
.social div{
  background: red;
  width: 150px;
  border-radius: 3px;
  padding: 5px 10px 10px 5px;
  background-color: rgba(255,255,255,0.27);
  color: #eaf0fb;
  text-align: center;
}
.social div:hover{
  background-color: rgba(255,255,255,0.47);
}
.social .fb{
  margin-left: 25px;
}
.social i{
  margin-right: 4px;
}

    </style>

<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>

    <?php 
     $error = "";
     $u = "";
     $p = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   
    function special_chars($value)
    {
        return htmlspecialchars(stripslashes($value));
    }
    $username = special_chars($_REQUEST['username']);
    $email = special_chars($_REQUEST['email']);
    $password = special_chars($_REQUEST['password']);
    $pass = password_hash($password,PASSWORD_DEFAULT);
    $con_password = special_chars($_REQUEST['con_password']);

    if($password == $con_password and !empty($username) and !empty($password)){

        $check_username = "SELECT * FROM user WHERE username = '$username'";
        $submit_data = "INSERT INTO user (username,email,pass) VALUES ('$username','$email','$pass')";
        // echo "in sql -|". $username;
        $result = mysqli_query($conn,$check_username);

        if(mysqli_num_rows($result)){
            $u = "username or email is already existed";
            echo "in if";
        }
        elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $error = "not an email try again";
        }else{
            if(mysqli_query($conn,$submit_data)){
                 echo "you registered";
                header("Location: login.php");
            }
        }
    }else{
        $p = "Unable to signup";
    }
}
?>
    <form  action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method = "post">
        <h3>signup Here</h3>

        <label for="username">Username</label>
        <input type="text" placeholder="Email or Phone" name = "username" id="username">
        <snap><?php echo $u?> </snap>

        <label for="email">Email</label>
        <input type="email" placeholder="email" name = "email" id="email">
        <snap><?php echo $error ?> </snap>

        <label for="password">Password</label>
        <input type="password" placeholder="Password" name = "password" id="password">

        <label for="con">confirm Password</label>
        <input type="password" placeholder="Password" name = "con_password" id="con">
        <snap><?php echo $p ?> </snap>

        <button>signup</button>
        <span><?php echo $error?></span>
    </form>
</body>
</html>
