<?php
require_once ('../models/register_model.php');    
class RegisterController extends RegisterModel
{  
    //adds user to db     
    public function addUser($firstname,$lastname,$email_address,$password,$registration_date)
    {  
        $RegisterModel=new RegisterModel($firstname,$lastname,$email_address,$password,$registration_date); 
        $RegisterModel->inputUser($firstname,$lastname,$email_address,$password,$registration_date);                         
    }
    //function to throw errors
    public function errors($value)
    {
        return $value;
    }
    //function to check if email already exists
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