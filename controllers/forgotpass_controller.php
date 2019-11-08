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
                    $url="http://627650.infhaarlem.nl/reset-password.php?email_address=$email_address";
                    mail($email_address,"Reset Password","To reset your password, please click the link: $url","From: randomemail@domain.com\r\n");
                    exit ("Password reset link has been sent to your email");
                }
                else
                {
                    exit ("Email does not exist");
                }
            }         
        }
    }
?>