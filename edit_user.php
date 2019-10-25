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
            <?php
                
                include_once 'Db_Connection/db.connection.php';

                session_start();
                $sql="SELECT * FROM register WHERE email_address='{$_SESSION['username']}'";
                $result=mysqli_query($conn,$sql);   
                while($row=mysqli_fetch_assoc($result))
                {
                    echo '<input type="text" name="firstname" placeholder="First Name" value='.$row['firstname'].'><br><br>';
                    echo '<input type="text" name="lastname" placeholder="Last Name" value='.$row['lastname'].'><br><br>';
                    echo '<input type="text" name="email_address" placeholder="Email Address" value='.$row['email_address'].'><br><br>';
                    echo '<h4>Change Password?</h4>';
                    echo '<input type="password" name="password" placeholder="Password"><br><br>';
                    echo '<input type="password" name="confpassword" placeholder="Confirm Password"><br><br>';
                }
                if(isset($_POST['change']))
                {
                    
                    $firstname=mysqli_real_escape_string($conn,$_POST['firstname']);
                    $lastname=mysqli_real_escape_string($conn,$_POST['lastname']);
                    $email_address=mysqli_real_escape_string($conn,$_POST['email_address']);
                    $password=mysqli_real_escape_string($conn,$_POST['password']); 
                    $confpassword=mysqli_real_escape_string($conn,$_POST['confpassword']);
                    $hash = password_hash($password, PASSWORD_BCRYPT); 

                    if(empty($password) && empty($confpassword))
                    {
                        $sql1="UPDATE `register` SET firstname='$firstname',lastname='$lastname',email_address='$email_address' WHERE email_address='{$_SESSION['username']}'";
                        $result1=mysqli_query($conn,$sql1);

                        if($result1)
                        {
                            exit ("Database has been upadated");
                            mail($email,"Account details updated","Your details have been changed recently by you","From: randomemail@domain.com\r\n");

                        }
                        else
                        {
                            exit ("Error has happened");
                        }
                        
                    }
                    else if($password!=$confpassword)
                    {
                        exit ("Passwords dont match!");
                    }
                    else
                    {
                        $sql1="UPDATE `register` SET firstname='$firstname',lastname='$lastname',email_address='$email_address',password='$hash' WHERE email_address='{$_SESSION['username']}'";
                        $result1=mysqli_query($conn,$sql1);
                        
                        if($result1)
                        {
                            exit ("Database has been upadated");
                            mail($email,"Account details updated","Your details and password have been changed recently by you","From: randomemail@domain.com\r\n");

                        }
                        else
                        {
                            exit ("Error has happened");
                        }
                    }                
                }
            ?>                  
            <input type="submit" name="change" value="Save Changes"><br><br><br>   
        </form>
    </div> 

</body>
</html>

