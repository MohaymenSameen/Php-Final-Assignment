<?php
    require_once ('../controllers/login_controller.php');
    require_once ('../models/login_model.php');   

    if(isset($_POST['Login']))
    {
        $email_address=($_POST['email_address']);
        $password=($_POST['password']);

        $LoginController = new LoginController($email_address,$password);
        $LoginController->Login($email_address,$password);
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
            
            <a href="/views/home_view.php">Home</a>
            <a href="#Laptops">Laptops</a>
            <a href="#Phones">Phones</a>
            <a href="#Cameras">Cameras</a>
            <a href="#Tvs">Tvs</a>
            <a href="/views/login_view.php"><strong>Join/Sign In</strong></a>
        </div>
    </header>    
    
    <div class="background_color">
        <form class="login_form" method="POST" ation="#">
            <h1>Login</h1><br><br>            
            <input type="text" name="email_address" placeholder="Email"><br><br><br>            
            <input type="password" name="password" placeholder="Password"><br><br><br>
            <input type="submit" name="Login" value="Login"><br><br><br><br>
            <a href="/views/forgotpass_view.php">Forgot Password?<br><br><br></a>
            <a href="/views/register_view.php">Don't have an account?<br><strong>Sign Up</strong></a><br><br>
        </form>
    </div> 
</body>
</html>