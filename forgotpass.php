<?php  
    

    if(isset($_POST['change']))
    {
        include_once 'Db_Connection/db.connection.php';
        
        $email_address=mysqli_real_escape_String($conn,$_POST['email_address']);

        $sql="SELECT register_ID FROM register WHERE email_address='$email_address'";
        $result=mysqli_query($conn,$sql);
        
        if(mysqli_num_rows($result)>0)
        {
            $url="http://627650.infhaarlem.nl/reset-password.php?email_address=$email_address";
            mail($email,"Reset Password","To reset your password, please click the link: $url","From: randomemail@domain.com\r\n");
            exit ("Password reset link has been sent to your email");

        }
        else
        {
            exit ("Email does not exist");
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
    <title>Forgot Password</title>
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
        <form class="forgot_password_form" method="POST" ation="#">
            <h1>Forgot Password</h1><br><br>            
            <input type="text" name="email_address" placeholder="Email"><br><br>            
            <input type="submit" name="change" value="Forgot Password"><br><br><br>   
        </form>
    </div> 

</body>
</html>