<?php

    session_start();
    if(isset($_POST['email_address']))
    {
        include_once 'Db_Connection/db.connection.php';
        
        $email_address=mysqli_real_escape_String($conn,$_POST['email_address']);
        $password=mysqli_real_escape_String($conn,$_POST['password']);
        $confpassword= mysqli_real_escape_string($conn,$_POST['confirm_password']);
        
            

        $sql="SELECT register_ID FROM register WHERE email_address='$email_address'";
        $result=mysqli_query($conn,$sql);

        if(mysqli_num_rows($result)>0)
        {     
            if(empty($password) && empty($confpassword))
            {
                exit ("Please enter you new password");
            } 
            else if($password!=$confpassword)
            {
                exit ("Passwords do not match!");
            }
            else
            {
                $hash = password_hash($confpassword, PASSWORD_BCRYPT);
                $sql = "UPDATE `register` SET password='$hash' WHERE email_address='{$_SESSION['username']}'";
                $result= mysqli_query($conn,$sql);
            }
            
        }
        else
        {
            exit("Email does not exist!!");
        }

    }
    /*else
    {
        header("Location: Login.php");
    }*/


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/Stylesheet.css">
    <title>Reset Password</title>
</head>
<body>

    <header>        
        <img src="/img/logo.png">
        <h1>TechnoGuides</h1>
        <h2>Your only reliable source for tech news</h2>
    
        <div class="navigation_bar">
            
            <a href="/views/home_view.php">Home</a>
            <a href="#Laptops">Laptops</a>
            <a href="#Phones">Phones</a>
            <a href="#Cameras">Cameras</a>
            <a href="#Tvs">Tvs</a>
            <a href="/views/login_view.php"><strong>Join/Sign In</strong></a>
        </div>
    </header>    
    
    <div class="background_color">
        <form class="reset_password_form" method="POST" ation="#">
            <h1>Change Password</h1><br><br>            
            <input type="text" name="email_address" placeholder="Email"><br><br>            
            <input type="password" name="password" placeholder="Password"><br><br>
            <input type="password" name="confirm_password" placeholder="Confirm Password"><br><br>            
            <input type="submit" name="change" value="Change Password"><br><br><br>   
        </form>
    </div> 

</body>
</html>