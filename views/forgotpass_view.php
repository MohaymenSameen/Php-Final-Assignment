<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/Stylesheet.css">
    <title>Forgot Password</title>
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
            <a href="searchuser_view.php">Search User</a>
            <a href="payment_view.php">Tickets</a>
            <a href="edituser_view.php">Edit Details</a>
            <a href="login_view.php"><strong>Join/Sign In</strong></a>
        </div>
    </header>    
    
    <div class="background_color">
        <form class="forgot_password_form" method="POST" ation="#">
            <h1>Forgot Password</h1><br><br>  
            
            <?php
                require_once ('../Db_Connection/db.connection.php');
                require_once ('../controllers/forgotpass_controller.php');               
            
                //if cookie is set keep redirecting to profile
                if(isset($_COOKIE["username"]))
                {
                    header("location: profile_view.php");
                }
                //if button clicked check email from db and send to user account
                if(isset($_POST['change']))
                {
                    $mysqli=new Database();        
                    $email_address=$mysqli->escape_string($_POST['email_address']);
                    $ForgotPassController= new ForgotPassController($email_address);
                    $ForgotPassController->sendEmail($email_address);      
                }                  
            ?> 
            <br><br>  
            <p id="error" style="background-color: white; margin-bottom: 10px;"></p>
            <input type="text" id="email_address" oninput="checkEmail();" name="email_address" placeholder="Email" ><br><br><br>           
            <input type="submit" name="change" value="Forgot Password"><br><br><br>   
        </form>
    </div> 
    <script src="../js/user.js">      
    </script>
</body>
</html>