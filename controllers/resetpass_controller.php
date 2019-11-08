<?php
    require_once ('../models/resetpass_model.php');
    class ResetPassController extends ResetPassModel
    {
        public function validateEmail($email_address,$password)
        {
            $ResetPassModel=new ResetPassModel($email_address,$password);
            
            if($ResetPassModel->checkEmail($email_address,$password))
            {
                return true;
            }
        }
        public function changePass($email_address,$password,$confpassword)
        {
            if($this->validateEmail($email_address,$password))
            {
                if(empty($password) && empty($confpassword))
                {
                    exit ("Please enter you new password");
                }
                else if($password!=$confpassword)
                {
                    exit ("Passwords do not match!");
                }
                else
                {
                    $ResetPassModel->updatePass($password);
                }
            }
        }
    }
?>