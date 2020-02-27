<?php
    //if cookie is active keep redirecting to profile view
    session_start();
    if(isset($_COOKIE["username"]))
    {
        header("location: profile_view.php");
    }

    $appId = '794365504408168';
    $appSecret = '7edc7be1684732dfa45d47ace626e3d5';

    $feed = 23379598044;
    $maximum = 10;
    $caching = 60;

    if(isset($_POST['submit']))
    {
        $url=$_POST['profile_url'];
        $facebook = "https://graph.facebook.com/$url/posts?access_token={$appId}|{$appSecret}";
        header("Location: $facebook");

        /*$authentication = file_get_contents("https://graph.facebook.com/oauth/access_token?grant_type=client_credentials&client_id={$appId}&client_secret={$appSecret}");
        $response = file_get_contents("https://graph.facebook.com/{$feed}/feed?access_token={$authentication->access_token}&limit={$maximum}");
        $authResponse = json_decode($authentication);*/
       
    } 
?>
<html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/Stylesheet.css">    
    <title>Home</title>
</head>

<body>   
    
    <header>        
        <img src="/img/logo.png">
        <h1>TechnoGuides</h1>
        <h2>Your only reliable source for tech news</h2>
   
        <div class="navigation_bar">
            
            <a href="home_view.php">Home</a>
            <a href="#Laptops">Laptops</a>
            <a href="#Phones">Phones</a>
            <a href="import_view.php">Import Csv</a>
            <a href="upload_view.php">Upload Image</a>
            <a href="/views/searchuser_view.php">Search User</a>
            <a href="login_view.php"><strong>Join/Sign In</strong></a>
        </div>
    </header>
    

    <h1>Latest Trends</h1>
    
    <!--Features of the page-->
    <div class="phone">
        <img src="/img/phone.jpg" alt="Phone">
        <p>The lastest Samsung Galaxy smartphone is out right now, we have reviewed it and you will not be dissappointed by its features.</p>
    </div>

    <div class="camera">
        <img src="/img/Camera.png" alt="Camera">
        <p>Everybody is talking about this camera. It’s from Sony, and it’s astoundingly powerful.</p>
    </div>

    <div class="laptop">
        <img src="/img/Laptop.png" alt="Laptop">
        <p>Dell’s most powerful laptop gets released in stores on the 28th of October. We recieved an early unit and have reviewed by our professional staff.</p>
    </div>
    
    <form action="#" method="POST" class="facebook"> 
        <input type="text" name="profile_url" class="facebook" placeholder="Read Data from Facebook"/>
        <input type="submit" name="submit" value="Read Data" class="facebook"/>
    </form>

    <footer>
        <h3>Contact us</h3>
        <a href="#Contact">Contact Form</a>
    </footer>
</body>
</html>