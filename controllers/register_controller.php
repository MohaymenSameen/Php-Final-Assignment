<?php
require_once ('../models/register_model.php');    
class RegisterController extends RegisterModel
{       
    public function addUser($firstname,$lastname,$email_address,$password,$registration_date)
    {  
        $RegisterModel=new RegisterModel($firstname,$lastname,$email_address,$password,$registration_date); 
        $RegisterModel->inputUser($firstname,$lastname,$email_address,$password,$registration_date);                         
    }
    public function errors($value)
    {
        return $value;
    }
    public function checkEmail($firstname,$lastname,$email_address,$password,$registration_date)
    {
        $RegisterModel = new RegisterModel($firstname,$lastname,$email_address,$password,$registration_date);
        if($RegisterModel->validateEmail($email_address))
        {
            return true;
        }
    }
}
?>