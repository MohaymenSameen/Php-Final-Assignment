<?php
    require_once ('../models/edituser_model.php');
    class EditUserController extends EditUserModel
    {
        /*public function recieveUser($firstname,$lastname,$email_address,$password)
        {
            $EditUserModel= new EditUserModel($firstname,$lastname,$email_address,$password);
            $EditUserModel->getUser();            
        }*/
        public function changeUser(string $firstname,string $lastname,string $email_address,string $password,string $confpassword)
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
                mail($email_address,"Account Details Changed","You have recently changed some details of your account","From: randomemail@domain.com\r\n");
                exit ("Database has been updated and passwords have been changed");  
            }
        }
        public function removeUser(string $firstname,string $lastname,string $email_address,string $password)
        {
            $EditUserModel=new EditUserModel($firstname,$lastname,$email_address,$password);
            $EditUserModel->deleteUser($email_address);
            exit ("user has been deleted");           
        }
    } 
?>