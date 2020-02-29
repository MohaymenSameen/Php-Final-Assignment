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
            <a href="home_view.php">Home</a>
            <a href="import_view.php">Import Csv</a>
            <a href="upload_view.php">Upload Image</a>
            <a href="payment_view.php">Tickets</a>
            <a href="searchuser_view.php">Search User</a>
            <a href="login_view.php"><strong>Join/Sign In</strong></a>
        </div>
    </header>    
    
    <div class="background_color">
        <form class="login_form" method="POST" action="#" name="login">
            <h1>Login</h1><br><br>                 
                <?php
                    require_once ('../Db_Connection/db.connection.php');
                    require_once ('../controllers/login_controller.php');
                    require_once ('../models/login_model.php');  
                    //if cookie made keep redirecting to profile view   
                    if(isset($_COOKIE["username"]))
                    {
                        header("location: profile_view.php");
                    }   
                    //if button clicked person logins or not
                    if(isset($_POST['Login']))
                    {      
                        $mysqli=new Database();        
                        $email_address=$mysqli->escape_string($_POST['email_address']);
                        $password=$mysqli->escape_string($_POST['password']);  
                        $LoginController = new LoginController($email_address,$password); 
                        //getting errors from controller and displaying them 
                        $error=$LoginController->Login($email_address,$password);    
                    }
                ?>                            
            <p id="error" style="background-color: white; margin-bottom: 10px;"></p>
            <!--adding checkEmail function to validate email while user is entering -->
            <input type="text" id="email_address" oninput="checkEmail();" name="email_address" placeholder="Email" ><br><br><br>            
            <input type="password" id="password" name="password" placeholder="Password"><br><br><br>
            <input type="submit" name="Login" value="Login"><br><br><br><br>
            <a href="/views/forgotpass_view.php">Forgot Password?<br><br><br></a>
            <a href="/views/register_view.php">Don't have an account?<br><strong>Sign Up</strong></a><br><br>
        </form>
    </div> 

    <script src="../js/user.js">      
    </script>
</body>
</html>