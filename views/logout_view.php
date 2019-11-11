<?php
    //if person clicks logout remove cookies and sessions
    if(isset($_GET['logout']))
    {
        /*https://security.stackexchange.com/questions/18880/do-you-need-to-encrypt-session-data
        https://stackoverflow.com/questions/2648440/encrypting-cookies-in-php
        did not find any valid resources for encrypting sessions and cookies, also could not find 
        anything about them in the slides.*/

        session_start();       
        session_destroy(); 
        //removing and deleting cache and not to store it       
        header("Cache-Control: no-store, no-cache");
        setcookie("username","",time()-3600);
        header("Location: login_view.php");
        
    }    
?>