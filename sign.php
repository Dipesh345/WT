<?php
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        
        include 'db_connect.php';

        $username=$_POST["fname"];
        $email=$_POST["femail"];
        $password=$_POST["fpass"];
        $re_password=$_POST["rpass"];
    
        
        if($password==$re_password){
            $sql="INSERT INTO `users`(`username`,`email`,`password`)VALUES('$username','$email','$password')";
            $result=mysqli_query($conn,$sql);
            if($result){
                session_start();
                $_SESSION['register_status']='Registered Successfully';
                header("Location: log.php");  
            }
            else{
                echo "Connection Failed";
            }
        }
        else{
            echo "Password doesnot match";
        }
        
    }

?>



<!DOCTYPE html>
<html>
    <head>
        <title>sign up</title>
    </head>
    <link rel="stylesheet" href="sign.css">
    <body>
        <form action="sign.php" name="form" onsubmit="return validate()"  method="POST">
            <div class="container">
              <h1>Register</h1>
              <p>Please fill in this form to create an account.</p>
              <br>
              <label for="fname"><b>Full Name</b></label> <br>
              <input type="text" placeholder="Enter your name" name="fname" id="fname" required>
              <br>
          
              <label for="femail"><b>Email</b></label> <br>
              <input type="text" placeholder="Enter Email" name="femail" id="femail" required>
              <br>
              <label for="fpass"><b>Password</b></label> <br>
              <input type="password" placeholder="Enter Password" name="fpass" id="fpass" required>
              <br>
              <label for="rpass"><b>Retype Password</b></label><br>
              <input type="password" placeholder="Retype Password" name="rpass" id="rpass" required>
              <br>
              <input type="submit" class="registerbtn" value="Register" onclick="validateEmail(document.form.femail)">
            </div>
          
            <div class="signin">
              <p>Already have an account? <a href="log.php">Login</a>.</p>
            </div>
          </form>
    </body>
    <script src="form.js"></script>
</html>