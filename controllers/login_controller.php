<?php
    require_once ('../models/login_model.php');
    class LoginController extends LoginModel
    {
        public function Login($email_address,$password)
        {
            if(!empty($email_address) && !empty($password))
            {
                $LoginModel=new LoginModel($email_address,$password);
                if($LoginModel->getUser($email_address,$password))
                {
                    $_SESSION['username']=$email_address;
                    header("Location: profile_view.php");
                }
                else
                {
                    echo "Wrong password stuff";
                }
            }            
        }
    }
?>