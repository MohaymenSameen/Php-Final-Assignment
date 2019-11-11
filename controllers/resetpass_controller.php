<?php
    require_once ('../models/resetpass_model.php');
    class ResetPassController extends ResetPassModel
    {    
        //function to change pass    
        public function changePass($password,$confpassword)
        {
            $ResetPassModel=new ResetPassModel($password);            
            if(empty($password) && empty($confpassword))
            {                   
                echo "<p class='error'>Please enter you new password</p>";
            }
            else if($password!=$confpassword)
            {                    
                echo "<p class='error'>Passwords do not match!</p>";                
            }                
            else
            {
                $ResetPassModel->updatePass($password);
                exit ("<p class='error'>Password has been changed</p>");
                //destroying session so user cannot come back to this page.
                session_start();
                session_destroy();
                header("location: login_view.php");
            }
        }
    }
?>