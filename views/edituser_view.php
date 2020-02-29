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
            <a href="home_view.php">Home</a>
            <a href="import_view.php">Import Csv</a>
            <a href="upload_view.php">Upload Image</a>
            <a href="searchuser_view.php">Search User</a>
            <a href="payment_view.php">Tickets</a>
            <a href="edituser_view.php">Edit Details</a>
            <a href="logout_view.php?logout"><strong>Login/Logout</strong></a>   
        </div>
    </header>    
    
    <div class="background_color">
        <form class="edit_details_form" method="POST" ation="#">
        <h1>Edit Details</h1><br><br>  
            <?php
                require_once ('../Db_Connection/db.connection.php');                
                require_once ('../controllers/edituser_controller.php');  
                session_start(); 
                if(!isset($_SESSION['username']))
                {
                    exit("<p id='error'>You must login to use this feature</p><br>");                                  
                }       
                //intializing variables
                $firstname=null;
                $lastname=null;
                $email_address=null;
                $password=null; 
                $EditUserModel=new EditUserModel($firstname,$lastname,$email_address,$password);     
                $row=$EditUserModel->getUser();
                
                //to output user info to each textfield
                if(is_array($row))
                {
                    foreach ($row as $res)
                    {
                    $firstname=$res['firstname'];
                    $lastname=$res['lastname'];
                    $email_address=$res['email_address'];
                    }
                }  
                //adding info to textfield from db             
                echo '<input type="text" name="firstname" placeholder="First Name" value='.$firstname.'><br><br>';
                echo '<input type="text" name="lastname" placeholder="Last Name" value='.$lastname.'><br><br>';
                echo '<p id="error" style="background-color: white; margin-bottom: 10px;"></p>';
                echo '<input type="text" name="email_address" placeholder="Email Address" oninput="checkEmail();" id="email_address" value='.$email_address.'><br><br>';
                echo '<h4>Change Password?</h4>';
                echo '<input type="password" name="password" placeholder="Password"><br><br>';
                echo '<input type="password" name="confpassword" placeholder="Confirm Password"><br><br>';           
               
                //if button clicked update user
                if(isset($_POST['change']))
                {  
                    $mysqli=new Database();
                    //prevention of sql injection using escape string
                    $firstname=$mysqli->escape_string($_POST['firstname']);
                    $lastname=$mysqli->escape_string($_POST['lastname']);
                    $email_address=$mysqli->escape_string($_POST['email_address']);                    
                    $password=$mysqli->escape_string($_POST['password']);                     
                    $confpassword=$mysqli->escape_string($_POST['confpassword']);  
                    $EditUserController=new EditUserController($firstname,$lastname,$email_address,$password);                   
                    $EditUserController->changeUser($firstname,$lastname,$email_address,$password,$confpassword);                 
                    
                }
                //if button clicked delete user
                if(isset($_POST['delete']))
                {
                    $EditUserController=new EditUserController($firstname,$lastname,$email_address,$password); 
                    $EditUserController->removeUser($firstname,$lastname,$email_address,$password);
                }               
            ?>  
            <br><br>                
            <input type="submit" name="change" value="Save Changes"><br><br> 
            <input type="submit" name="delete" value="Delete Account"><br><br> 

        </form>
    </div> 
    <script src="../js/user.js">      
    </script>
</body>
</html>

