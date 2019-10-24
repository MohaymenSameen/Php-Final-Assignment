<?php

include_once 'Db_Connection/db.connection.php';
$sql="SELECT * FROM register";
$result=mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/Stylesheet.css">
    <title>Edit Details</title>
</head>
<body>

    <header>        
        <img src="/img/logo.png">
        <h1>TechnoGuides</h1>
        <h2>Your only reliable source for tech news</h2>
    
        <div class="navigation_bar">
            
            <a href="profile.php">Home</a>
            <a href="#Laptops">Laptops</a>
            <a href="#Phones">Phones</a>
            <a href="#Cameras">Cameras</a>
            <a href="#Tvs">Tvs</a>
            <a href="Login.php"><strong>Join/Sign In</strong></a>
        </div>
    </header>    
    
    <div class="background_color">
        <form class="edit_details_form" method="POST" ation="#">
            <h1>Edit Details</h1><br><br>           
            <input type="text" name="firstname" placeholder="First Name"><br><br> 
            <input type="text" name="lastname" placeholder="Last Name"><br><br> 
            <input type="text" name="email_address" placeholder="Email"><br><br>                      
            <input type="password" name="password" placeholder="Password"><br><br>
            <input type="password" name="confirm_password" placeholder="Confirm Password"><br><br>            
            <input type="submit" name="change" value="Change Details"><br><br><br>   
        </form>
    </div> 

</body>
</html>