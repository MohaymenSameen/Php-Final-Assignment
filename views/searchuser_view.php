<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/Stylesheet.css">
    <title>Search User</title>
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
        <form class="searchuser_form" method="POST" action="#">
            <h1>Search User</h1><br><br>  
            <table name="userdetails"> 
            <?php
            require_once ('../Db_Connection/db.connection.php');
            require_once ('../controllers/searchuser_controller.php');      
            
      
                //is button clicked
                if(isset($_POST['search']))
                {
                    $mysqli=new Database();
                    $firstname=$mysqli->escape_string($_POST['firstname']);
                    $email_address=$mysqli->escape_string($_POST['email_address']);
                    
                    $SearchUserController = new SearchUserController($firstname,$email_address);
                    //starting a session for captcha and keep changing if page is refreshed
                    session_start();
                    $code=$_SESSION['captcha'];
                    $user=$_POST['captcha'];

                    //if email field and captcha empty or if firstname and captcha empty
                    if((empty($email_address) && empty($user)) || (empty($firstname)&&empty($user)))
                    {
                        echo "<p class='error'>Please fill in a field and Captcha.</p>";    
                    }
                    else
                    {
                        //getting user
                        $result=$SearchUserController->findUser($firstname,$email_address);
                        $validemail=filter_var($email_address,FILTER_VALIDATE_EMAIL);
                        //if email is not valid and is empty  
                        if(!$validemail && !empty($email_address))
                        {
                        echo "<p class='error'>Please enter a Valid Email</p>";   
                        }
                        else
                        {
                            //if no result else if result and captcha correct communicate with db
                            if(!$result)
                            {
                                echo "<p class='error'>No user found</p>";   
                            }                                    
                        
                        
                            if(($code==$user && $result)) 
                            {
                                echo "<p class='error'>User Found!</p>";                               
                            }                         
                            else
                            {
                                echo "<p class='error'>Invalid Captcha</p>";  
                            }   
                        }
                      
                    }                                              
                }   
            ?>  
            <br><br>            
            </table>   
            <input type="text" name="firstname" placeholder="First Name"><br><br> 
            <input type="text" name="email_address" placeholder="Email Address"><br><br> 
            <input type="text" name="captcha" placeholder="Enter Captcha" ><br><img src="/views/captcha.php"><br><br>
            <input type="submit" name="search" value="Search"><br><br><br><br>

        </form>
    </div>
</body>
</html>