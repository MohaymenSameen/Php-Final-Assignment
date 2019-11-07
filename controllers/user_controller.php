<?php
require_once '../models/user_model.php';

class UserController extends UserModel
{
    
    public function Login($email_address,$password)
    {
        if(!empty($email_address) && !empty($password))
        {
            $UserObject=new UserModel($email_address,$password);
            
            if($UserObject->getUser($email_address,$password))
            {
                echo "User verfied";
            }
            else
            {
                echo "Incorrect passwrod and usenrame";
            }
        }
        else
        {
            echo "Please enter username and password";
        }
    }
    
    
    
    
    
    
    
    
    //this does not work
    /*function __construct()
    {

    }
    //empty for now
    function create($firstname,$lastname,$password,$email)
    {
    //create user in the db
    }
    function login($email_address,$password)
    {
        //checks against db, does login procedures

        if($this->authenticate($email_address,$password))
        {
            //start the session for the user
            session_start();
            //instantiate the usermodel object
            $user=new UserModel($email_address);
            //set user object to the session
            $_SESSION['user']=$user;
            
            return true;
        }
        else
        {        
            return false;
        }
        
    }
    function authenticate($email_address,$password)
    {
        $authenticate=false;
        //checks database
        if (password_verify($password, $data['password']))
                {                
                    $authenticate=true;
                    return authenticate;
                } 
                else
                {
                    exit("Wrong password email combination");
                }
    }
    function logout()
    {
        //does logout procedures
        session_start();
        session_destroy();
    }*/
}



?>