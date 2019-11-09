<?php
    require_once ('../models/register_model.php');    
    class RegisterController extends RegisterModel
    {       
        public function addUser(string $firstname,string $lastname,string $email_address,string $password,string $registration_date)
        {  
     
            if(!empty($email_address) && !empty($password))
            {
                $RegisterModel=new RegisterModel($firstname,$lastname,$email_address,$password,$registration_date);       
                
                if($RegisterModel->validateEmail($email_address))
                {
                    exit('This email is already being used');     
                }
                else
                {
                    $RegisterModel->inputUser($firstname,$lastname,$email_address,$password,$registration_date);
                }
                
                /*if($RegisterModel->inputUser($firstname,$lastname,$email_address,$password))
                {
                    echo "User verified";
                }
                else
                {
                    echo "Wrong password stuff";
                } */
            }
        }
    }







?>