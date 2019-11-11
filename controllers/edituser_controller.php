<?php
    require_once ('../models/edituser_model.php');
    class EditUserController extends EditUserModel
    {
        //function to recieve user from model
        public function recieveUser($firstname,$lastname,$email_address,$password)
        {
            $EditUserModel= new EditUserModel($firstname,$lastname,$email_address,$password);
            $EditUserModel->getUser();            
        }
        //function to send to model to update database for a certain user
        public function changeUser($firstname,$lastname,$email_address,$password,$confpassword)
        {
            $EditUserModel= new EditUserModel($firstname,$lastname,$email_address,$password);
            
            //if firstname or lastname or email empty, then send error message, else if unvalid email send error, else if password not same send error, else if password fields are empty update else the database will update all fields including passwords
            if(empty($firstname)||empty($lastname)||empty($email_address))
            {               
                echo "<p class='error'>please fill in all fields</p>";
            }
            else if(!filter_var($email_address,FILTER_VALIDATE_EMAIL))
            {               
                echo "<p class='error'>email is invalid, please select a valid email</p>";                
            }            
            else if ($password!=$confpassword)
            {               
                echo "<p class='error'>Passwords don't match</p>";
            }                      
            else if(empty($password)&&empty($confpassword)&&!empty($firstname)&&!empty($lastname)&&!empty($email_address))
            {
            
                $EditUserModel->updateUser($firstname,$lastname,$email_address,$password);                
                echo "<p class='error'>Database has been updated</p>";
                //sending mail to user to tell them that details have been changed 
                mail($email_address,"Account Details Changed","You have recently changed some details of your account","From: 627650@student.inholland.nl\r\n");
                setcookie("username","",time()-3600); 
                setcookie("username",$email_address,time()+3600);
                session_destroy();

                session_start();            
                $_SESSION["username"]=$email_address;
                header("location: profile_view.php");
            }
            else
            {
                $EditUserModel->updatePass($firstname,$lastname,$email_address,$password);
                //sending mail to user to tell them that details have been changed and PASSWORD. 
                mail($email_address,"Account Details Changed","You have recently changed some details of your account and your password","From: 627650@student.inholland.nl\r\n");                
                echo "<p class='error'>Database has been updated and passwords have been changed</p>";
                //destroying cookie for old user details and making new one for new user
                setcookie("username","",time()-3600); 
                setcookie("username",$email_address,time()+3600);
                session_destroy();
                //destroying session for old user and making a new session for new user.
                session_start();            
                $_SESSION["username"]=$email_address;
                header("location: profile_view.php");
            }           
            
        }
        //function to delete user
        public function removeUser($firstname,$lastname,$email_address,$password)
        {
            
            $EditUserModel=new EditUserModel($firstname,$lastname,$email_address,$password);
            $EditUserModel->deleteUser($email_address);
            session_destroy();
            setcookie("username","",time()-3600);
            echo "<p class='error'>user has been deleted</p>";                   
        }
    } 
?>