<?php
    require_once ('../models/forgotpass_model.php');    
    class ForgotPassController extends ForgotPassModel
    {        
        public function sendEmail($email_address)
        {
            if(!empty($email_address))
            {
                
                $ForgotPassModel=new ForgotPassModel($email_address);

                if($ForgotPassModel->getEmail($email_address))
                {
                    session_start();
                    $_SESSION['username']=$email_address;
                    $url="http://627650.infhaarlem.nl/views/resetpass_view.php?email_address={$_SESSION['username']}";//randomemail@domain.com
                    mail($email_address,"Reset Password","To reset your password, please click the link: $url","From: 627650@student.inholland.nl\r\n");
                    exit ("<p class='error'>Password has been sent to your email</p>");
                    header("location: login_view.php");
                }
                else
                {
                    echo "<p class='error'>Email does not exist</p>";
                }
            }
            else
            {
                echo "<p class='error'>please enter an email address</p>";                
            }       
        }
    }
?>