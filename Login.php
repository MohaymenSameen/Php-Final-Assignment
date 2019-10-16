<?php

    if(isset($_POST['email_address']))
    {
        include_once 'Db_Connection/db.connection.php';
           
        $email=$_POST['email_address'];
        $password=$_POST['password'];
        

        $sql="select * FROM login WHERE email_address='".$email."'AND password='".$password."'";        
        
        
        $result=mysqli_query($conn,$sql);

        if(mysqli_num_rows($result)==1)
        {
            echo "You have logged in!";
            exit();
        }
        else
        {
            echo "You have entered incorrect email or password";
            exit();
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/Stylesheet.css">
    <title>Login</title>
</head>
<body>

    <header>        
        <img src="/img/logo.png">
        <h1>TechnoGuides</h1>
        <h2>Your only reliable source for tech news</h2>
    
        <div class="navigation_bar">
            
            <a href="home.php">Home</a>
            <a href="#Laptops">Laptops</a>
            <a href="#Phones">Phones</a>
            <a href="#Cameras">Cameras</a>
            <a href="#Tvs">Tvs</a>
            <a href="Login.php"><strong>Join/Sign In</strong></a>
        </div>
    </header>    
    
    <div class="background_color">
        <form class="login_form" method="POST" ation="#">
            <h1>Login</h1><br><br>            
            <input type="text" name="email_address" placeholder="Email"><br><br><br>            
            <input type="password" name="password" placeholder="Password"><br><br><br>
            <input type="submit" name="Login" value="Login"><br><br><br><br>
            <a href="FgtPass">Forgot Password?<br><br><br></a>
            <a href="Register.php">Don't have an account?<br><strong>Sign Up</strong></a><br><br>
        </form>
    </div> 