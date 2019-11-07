<?php
    require_once ('../controllers/register_controller.php');
    require_once ('../models/register_model.php');    
   
        if(isset($_POST['register']))
        {
            $firstname=$_POST['firstname'];
            $lastname=$_POST['lastname'];
            $email_address=$_POST['email_address'];
            $password=$_POST['password'];  

            $RegisterModel = new RegisterModel($firstname,$lastname,$email_address,$password);
            $RegisterModel->inputUser($firstname,$lastname,$email_address,$password);
            session_start();
            $code=$_SESSION['captcha'];
            $user=$_POST['captcha'];
            if($code==$user) 
            {
                echo "valid";                   
            }
            else
            {
                echo "invalid";
                
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
    <title>Register</title>
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
            <a href="/views/login_view.php"><strong>Join/Sign In</strong></a>
        </div>
    </header>
    <div class="background_color">
        <form class="registration_form" method="POST" action="#">
            <h1>Register</h1><br><br>            
            <input type="text" name="firstname" placeholder="First Name"><br><br>
            <input type="text" name="lastname" placeholder="Last Name"><br><br>
            <input type="text" name="email_address" placeholder="Email Address"><br><br>            
            <input type="text" name="password"  placeholder="Password"><br><br>
            <input type="text" name="captcha" placeholder="Enter Captcha" ><img src="/views/captcha.php"><br><br>
            <input type="submit" name="register" value="Register"><br><br><br><br>

        </form>
    </div>
</body>
</html>