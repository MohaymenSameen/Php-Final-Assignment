<?php
    require_once ('../models/resetpass_model.php');
    require_once ('../controllers/resetpass_controller.php');

    if(isset($_POST['email_address']))
    {
        $email_address=$_POST['email_address'];
        $password=$_POST['password'];
        $confpassword=$_POST['confirm_password'];

        $ResetPassController=new ResetPassController($email_address,$password);
        $ResetPassController->changePass($email_address,$password,$confpassword);
    }
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