<?php
    require_once ('../models/forgotpass_model.php');    
    class ForgotPassController extends ForgotPassModel
    {   
        //function to sendemail to user     
        public function sendEmail($email_address) 
        {
            //if email field is not empty else theow error message
            if(!empty($email_address))
            {                
                $ForgotPassModel=new ForgotPassModel($email_address);
                
                if($ForgotPassModel->getEmail($email_address))
                {
                    //starting a new session for the user in order to change password. 
                    session_start();
                    $_SESSION['username']=$email_address;
                    //url with the user email
                    $url="http://627650.infhaarlem.nl/views/resetpass_view.php?email_address={$_SESSION['username']}";
                    mail($email_address,"Reset Password","To reset your password, please click the link: $url","From: 627650@student.inholland.nl\r\n");
                    exit ("<p id='error'>Password has been sent to your email</p><br><br>");
                }
                else
                {
                    //if no email in the database throw error message.
                    echo "<p id='error'>Email does not exist</p>";
                }
            }
            else
            {
                echo "<p id='error'>please enter an email address</p>";                
            }       
        }
    }
?>