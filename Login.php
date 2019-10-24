<?php       
    session_start();
    if (isset($_POST['Login']))
    {
		include_once 'Db_Connection/db.connection.php';

		$email = mysqli_real_escape_string($conn,$_POST['email_address']);
		$password = mysqli_real_escape_string($conn,$_POST['password']);

        $sql = "SELECT register_ID, password FROM register WHERE email_address='$email'";
        $result = mysqli_query($conn,$sql);

                
        

        if (mysqli_num_rows($result) > 0)
        {
		    $data = mysqli_fetch_array($result);
            if (password_verify($password, $data['password']))
            {                
                $_SESSION['username']=$_POST['email_address'];
                header("Location: profile.php");
            } 
            else
            {
                exit("Wrong password email combination");
            }
			   
        } 
        else
        {
            exit ("wrong password email combination");
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
            <a href="forgotpass.php">Forgot Password?<br><br><br></a>
            <a href="Register.php">Don't have an account?<br><strong>Sign Up</strong></a><br><br>
        </form>
    </div> 
</body>
</html>