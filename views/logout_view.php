<?php
    if(isset($_GET['logout']))
    {
        session_start();       
        session_destroy();
        header("Location: login_view.php");
        header("Cache-Control: no-store, no-cache, must-revalidate");
    }    
?>