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
            
            <a href="/views/home_view.php">Home</a>
            <a href="#Laptops">Laptops</a>
            <a href="#Phones">Phones</a>
            <a href="#Cameras">Cameras</a>
            <a href="#Tvs">Tvs</a>
            <a href="/views/searchuser_view.php">Search User</a>
            <a href="/views/login_view.php"><strong>Join/Sign In</strong></a>
        </div>
    </header>
    <div class="background_color">
        <form class="registration_form" method="POST" action="#">
            <h1>Register</h1><br><br>   
            <?php
            require_once ('../Db_Connection/db.connection.php');
            require_once ('../controllers/register_controller.php');          
            
                //if cookie made redirect to profile view
                if(isset($_COOKIE["username"]))
                {
                    header("location: profile_view.php");
                }
                //if register button clicked
                if(isset($_POST['register']))
                {
                    $mysqli=new Database();
                    $firstname=$mysqli->escape_string($_POST['firstname']);
                    $lastname=$mysqli->escape_string($_POST['lastname']);
                    $email_address=$mysqli->escape_string($_POST['email_address']);
                    $password=$mysqli->escape_string($_POST['password']);
                    $registration_date=date('d-m-y H:i:s');

                    $RegisterController = new RegisterController($firstname,$lastname,$email_address,$password,$registration_date);
                    session_start();
                    //session started to make captcha
                    $code=$_SESSION['captcha'];
                    $user=$_POST['captcha'];

                    //if all fields empty display error
                    if(empty($firstname) || empty($lastname) || empty($email_address) || empty($password) || empty($user))
                    {                                 
                        echo "<p class='error'>Please fill in all the fields</p>";   
                    }                    
                    //storing if email is valid in a variable and if email exists in db it also is stored in a variable (repeatemail)
                    $validemail=filter_var($email_address,FILTER_VALIDATE_EMAIL);
                    $RepeatEmail=$RegisterController->checkEmail($firstname,$lastname,$email_address,$password,$registration_date);
                    
                    //if email is not valid display error
                    if(!$validemail)
                    {          
                        echo "<p class='error'>This is not a valid Email</p>";
                    }
                    //if email exists throw error
                    if($RepeatEmail)
                    {
                        echo "<p class='error'>This email is already being used.</p>";
                    }
                    //if captcha and is valid email and not repeated email, add user
                    if($code==$user && $validemail && !$RepeatEmail) 
                    {                        
                        echo "<p class='error'>Valid Captcha</p>";   
                        $RegisterController->addUser($firstname,$lastname,$email_address,$password,$registration_date);                                           
                        header("location: login_view.php");
                    }
                    else
                    {
                        echo "<p class='error'>Invalid Captcha</p>";  
                    }           
                }
   
            ?>  
            <br><br>        
            <input type="text" name="firstname" placeholder="First Name"><br><br>
            <input type="text" name="lastname" placeholder="Last Name"><br><br>
            <input type="text" name="email_address" placeholder="Email Address"><br><br>            
            <input type="text" name="password"  placeholder="Password"><br><br>
            <input type="text" name="captcha" placeholder="Enter Captcha" ><br><img src="/views/captcha.php"><br><br>
            <input type="submit" name="register" value="Register"><br><br><br><br>

        </form>
    </div>
</body>
</html>