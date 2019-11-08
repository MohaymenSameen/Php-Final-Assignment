<?php
    require_once ('../models/resetpass_model.php');
    class ResetPassController extends ResetPassModel
    {        
        public function changePass($email_address,$password,$confpassword)
        {
            $ResetPassModel=new ResetPassModel($email_address,$password);

            if($ResetPassModel->checkEmail($email_address,$password))
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
            else
            {
                exit ("email does not exist in database");
            }
        }
    }
?>