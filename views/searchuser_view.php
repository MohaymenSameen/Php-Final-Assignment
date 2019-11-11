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
            
      
                //I made a very extensive query search for email and name, you can either enter only an email or a name and still get results. If you fill in both email and name you stil get the result.

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
                    $checkemail=$SearchUserController->checkEmail($firstname,$email_address);
                    $checkname=$SearchUserController->checkName($firstname,$email_address);

                    //if email field and captcha empty or if firstname and captcha empty
                    if((empty($email_address) && empty($user)) || (empty($firstname)&&empty($user)))
                    {
                        echo "<p class='error'>Please fill in a field and Captcha.</p>";    
                    }
                    //if email field is not empty and firstname field is empty
                    else if(!empty($email_address)&&empty($firstname))
                    {
                        $validemail=filter_var($email_address,FILTER_VALIDATE_EMAIL);
                        //checking if email not valid and firstname field is empty
                        if(!$validemail && empty($firstname))
                        {                            
                            echo "<p class='error'>Please enter a Valid Email</p>";
                        }                                                   
                        //checking if email exists and firstname field is empty  
                        else if(!$checkemail&& empty($firstname))
                        {
                            echo "<p class='error'>Email Does Not Exist</p>";  
                        }
                        //user found
                        else
                        {
                            if($code==$user) 
                            {
                                $result=$SearchUserController->findUser($firstname,$email_address);
                                echo "<p class='error'>User Found!</p>";                               
                            }                         
                            else
                            {
                                echo "<p class='error'>Invalid Captcha</p>";  
                            } 
                        }
                           
                    }
                    //if email field is empty and firstname is not empty      
                    else if(!empty($firstname)&&empty($email_address)) 
                    {
                        //check if username does not exist
                        if(!$checkname)
                        {
                            echo "<p class='error'>Name does not exist</p>"; 
                        }
                        //user found
                        else
                        {
                            if($code==$user) 
                            {
                                $result=$SearchUserController->findUser($firstname,$email_address);                            
                                echo "<p class='error'>User Found!</p>";                               
                            }                         
                            else
                            {
                                echo "<p class='error'>Invalid Captcha</p>";  
                            } 
                        }                                               
                    }
                    //if both email and firstname fields are filled
                    else
                    {
                        $validemail=filter_var($email_address,FILTER_VALIDATE_EMAIL);
                        //if email not valid
                        if(!$validemail)
                        {
                            echo "<p class='error'>Please enter a Valid Email</p>";
                        }
                        //proceed
                        else
                        {   //if email and name exist user found
                            if($checkemail && $checkname)
                            {
                                if($code==$user) 
                                {
                                    $result=$SearchUserController->findUser($firstname,$email_address);                            
                                    echo "<p class='error'>User Found!</p>";                               
                                }                         
                                else
                                {
                                    echo "<p class='error'>Invalid Captcha</p>";  
                                } 
                            }
                            //not found
                            else
                            {
                                echo "<p class='error'>User Not Found!</p>";                              
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