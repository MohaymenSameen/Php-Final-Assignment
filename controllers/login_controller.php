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
                    echo "User verified";
                }
                else
                {
                    echo "Wrong password stuff";
                }
            }            
        }
    }
?>