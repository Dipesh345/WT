<?php
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        include 'db_connect.php';
        $email = $_POST["femail"];
        $password = $_POST['fpass'];

        $sql = "SELECT * FROM users WHERE email='$email' AND password ='$password'";
        $result = mysqli_query($conn,$sql);
        $num = mysqli_num_rows($result);
        if($num==1){
            $_SESSION['logged in']=true;
            $_SESSION['username']=$username;
            header("Location: index2.html");
        }
        else{
            echo "\nCredentials Mismatch";
        }
    }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title> Login</title>
    <link rel="stylesheet" href="login.css">
  </head>
  <body>
    <div class="center">
      <h1>Login</h1>
      <form action="log.php" name="form" method="POST">
        <div class="txt_field">
          <input type="email" required id="femail" name="femail">
          <span></span>
          <label>Email</label>
        </div>
        <div class="txt_field">
          <input type="password" required id="fpass" name="fpass">
          <span></span>
          <label>Password</label>
        </div>
        <div class="pass">Forgot Password?</div>
        <input type="submit" value="Login">
        <div class="signup_link">
          Not a member? <a href="sign.php">Signup</a>
        </div>
      </form>
    </div>

  </body>
</html>
