<?php
    require_once ('../models/register_model.php');
    
    class RegisterController extends RegisterModel
    {
        /*public function checkEmail($email_address)
        {
            $RegisterModel=new RegisterModel($firstname,$lastname,$email_address,$password);

            if($RegisterModel->validateEmail($email_address))
            {
                exit('This email is already being used');
            }
        }*/
        public function addUser($firstname,$lastname,$email_address,$password)
        {  
     
            if(!empty($email_address) && !empty($password))
            {
                $RegisterModel=new RegisterModel($firstname,$lastname,$email_address,$password);
                if($RegisterModel->inputUser($firstname,$lastname,$email_address,$password))
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