<?php
    if(isset($_GET['logout']))
    {
        session_destroy();
        header("Location: login_view.php");
    }    
?>