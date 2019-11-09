<?php
    if(isset($_GET['logout']))
    {
        session_start();       
        session_destroy();        
        header("Cache-Control: no-store, no-cache");
        setcookie("username","",time()-3600);
        header("Location: login_view.php");
        
    }    
?>