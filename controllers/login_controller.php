<?php
    require_once ('../models/login_model.php');
    class LoginController extends LoginModel
    {
        public function Login($email_address,$password)
        {            
            if(!empty($email_address) && !empty($password))
            {
                $LoginModel=new LoginModel($email_address,$password);
                $GetUser=$LoginModel->getUser($email_address,$password);
                $errors[]="something";
                if($GetUser)
                {
                    if(password_verify($password,$GetUser['password']))
                    {
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
            $data=$this->errors($errors);            
            echo "<p class=error>$data</p>";                        
        }
        public function errors($value)
        {
            return $value;
        }
        
    }
?>