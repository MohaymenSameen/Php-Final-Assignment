<?php
    require_once ('../models/login_model.php');
    class LoginController extends LoginModel
    {
        //function to login
        public function Login($email_address,$password)
        {            
            if(!empty($email_address) && !empty($password))
            {
                $LoginModel=new LoginModel($email_address,$password);
                $GetUser=$LoginModel->getUser($email_address,$password);
                $errors[]="something";
                if($GetUser)
                {
                    //if password is equal to 1 (or if password is same to the one in db) user is logged in
                    if(password_verify($password,$GetUser['password']))
                    {
                        //starts new session and cookie when logged in
                        $_SESSION['username']=$email_address;
                        setcookie("username",$email_address,time()+3600);
                        header("Location: profile_view.php");                                                                      
                    }
                    else
                    {                        
                        $errors="Email/Password Combination is incorrect.";
                    }                    
                }
                else
                {                    
                    $errors="Email does not exist. Please use a valid email.";
                }
            }
            else
            {           
                $errors="Please fill in all fields.";
            }  
            //putting all errors in an array and displaying them
            $data=$this->errors($errors);            
            echo "<p class=error>$data</p>";                        
        }
        //function for errors.
        public function errors($value)
        {
            return $value;
        }
        
    }
?>