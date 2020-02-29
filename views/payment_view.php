<?php
    
    session_start();    

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require_once "../mollie-api-php/vendor/autoload.php";
    require_once "../mollie-api-php/examples/functions.php";

    $mollie = new \Mollie\Api\MollieApiClient();
    $mollie->setApiKey("test_Ds3fz4U9vNKxzCfVvVHJT2sgW5ECD8");
       
    //if the payment method is ideal 
    if(isset($_POST['payment']) && $_POST['method']=="IDEAL")
    {
        
        $firstname=$_POST['firstname'];
        $lastname=$_POST['lastname'];     
        $payment = $mollie->payments->create(
            [
                "amount" =>
                [
                    "currency" => "EUR",
                    "value" => "10.50"                
                ],     
            "method" => \Mollie\Api\Types\PaymentMethod::IDEAL,      
            "description" => "Tickets for the Tech event for $firstname $lastname",
            "redirectUrl" => "http://627650.infhaarlem.nl/views/return_view.php",
            ]
        );
        header("Location: " . $payment->getCheckoutUrl(), true, 303);
    }
    //if the payment method is inghomepay
    else if(isset($_POST['payment']) && $_POST['method']=="INGHOMEPAY")
    {   
        $firstname=$_POST['firstname'];
        $lastname=$_POST['lastname'];
        $payment = $mollie->payments->create(
            [
                "amount" =>
                [
                    "currency" => "EUR",
                    "value" => "10.00"                
                ],     
            "method" => \Mollie\Api\Types\PaymentMethod::INGHOMEPAY,      
            "description" => "Tickets for the Tech event for $firstname $lastname",
            "redirectUrl" => "https://627650.infhaarlem.nl/views/return_view.php/",
            ]
        );
        header("Location: " . $payment->getCheckoutUrl(), true, 303);
    }  
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/Stylesheet.css">
    <title>Tickets</title>
</head>
<body>
    <header>        
        <img src="/img/logo.png">
        <h1>TechnoGuides</h1>
        <h2>Your only reliable source for tech news</h2>
    
        <div class="navigation_bar">            
            <a href="home_view.php">Home</a>
            <a href="import_view.php">Import Csv</a>
            <a href="upload_view.php">Upload Image</a>
            <a href="payment_view.php">Tickets</a>
            <a href="searchuser_view.php">Search User</a>
            <a href="edituser_view.php">Edit Details</a>
            <a href="logout_view.php?logout"><strong>Login/Logout</strong></a>     
        </div>
    </header>    
    <div class="background_color">
        <!--payment form but using login style-->
        <form class="login_form" method="POST" action="#" name="payment">
            <h1>Purchase Tickets</h1><br><br>      
            <?php
                if(!isset($_SESSION['username']))
                {
                    exit("<p id='error'>You must login to use this feature</p><br>");                                  
                } 
            ?>    
            <p id="error" style="background-color: white; margin-bottom: 10px;"></p>
            <input type="text" id="email_address" oninput="checkEmail();" name="email_address" value="<?php echo ($_SESSION['username']);?>" ><br><br><br>              
            <input type="text" id="email_address" name="firstname" value="<?php echo ($_SESSION['firstname']);?>" ><br><br><br>          
            <input type="text" id="email_address" name="lastname" value="<?php echo ($_SESSION['lastname']);?>" ><br><br><br>   

            <label id="method">Choose a Payment Method:</label>
            <br><br>
            <label style="color: red;">IDEAL has &euro;0.50 extra costs</label>
            <br><br>
            <select id="method" name="method">
            <option value="IDEAL">IDEAL</option>
            <option value="INGHOMEPAY">ING Home Pay</option>            
            </select>
            <br><br>
            <input type="submit" name="payment" value="Buy"><br><br><br><br>
        </form>
    </div> 

    <script src="../js/user.js">      
    </script>
</body>
</html>