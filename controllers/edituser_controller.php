<?php
    require_once ('../models/edituser_model.php');
    class EditUserController extends EditUserModel
    {
        /*public function recieveUser($firstname,$lastname,$email_address,$password)
        {
            $EditUserModel= new EditUserModel($firstname,$lastname,$email_address,$password);
            $EditUserModel->getUser();            
        }*/
        public function changeUser($firstname,$lastname,$email_address,$password,$confpassword)
        {
            $EditUserModel= new EditUserModel($firstname,$lastname,$email_address,$password);
            
            if(empty($password)&&empty($confpassword))
            {
                $EditUserModel->updateUser($firstname,$lastname,$email_address,$password);
                exit ("Database has been updated");
            }
            else if ($password!=$confpassword)
            {
                exit ("Passwords don't match");
            }
            else
            {
                $EditUserModel->updatePass($firstname,$lastname,$email_address,$password); 
                exit ("Database has been updated and passwords have been changed");  
            }
        }
    } 
?>