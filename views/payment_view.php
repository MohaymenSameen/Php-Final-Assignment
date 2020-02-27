<?php

    session_start();
    require('../fpdf182/fpdf.php');  

    if(!isset($_SESSION['username']))
    {
        header("Location: profile_view.php");
    }
    
    if(isset($_POST['method']))
    {
        
    }
    
    
    
    /*if(isset($_POST['payment']))
    {        
        $statImage = "../img/logo.png";
        $qrCode = "../img/qr-code.png";
        $pdf = new FPDF();
        $pdf->AddPage();        

        $pdf->SetFont('Arial','B',18);
        $pdf->Cell(40,10,'Ticket For The Event!');

        $pdf->SetFont('Arial','B',14);
        $pdf->MultiCell(50,40,$_POST['email_address']);

        $pdf->SetFont('Arial','B',14);
        $pdf->MultiCell(60,30,$_POST['firstname']);

        $pdf->SetFont('Arial','B',14);
        $pdf->MultiCell(70,40,$_POST['lastname']);

        $pdf->Image($statImage,150,5,40);
        $pdf->Image($qrCode,65,80,80);

        $pdf->Output();
    }*/

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
            
            <a href="/views/home_view.php">Home</a>
            <a href="#Laptops">Laptops</a>
            <a href="#Phones">Phones</a>
            <a href="#Cameras">Cameras</a>
            <a href="#Tvs">Tvs</a>
            <a href="/views/searchuser_view.php">Search User</a>
            <a href="/views/login_view.php"><strong>Join/Sign In</strong></a>
        </div>
    </header>    
    <div class="background_color">
        <!--payment form but using login style-->
        <form class="login_form" method="POST" action="#" name="payment">
            <h1>Purchase Tickets</h1><br><br>                      
            <input type="text" id="email_address" name="email_address" value="<?php echo ($_SESSION['username']);?>" ><br><br><br>         
            <input type="text" id="email_address" name="firstname" value="<?php echo ($_SESSION['firstname']);?>" ><br><br><br>          
            <input type="text" id="email_address" name="lastname" value="<?php echo ($_SESSION['lastname']);?>" ><br><br><br>   

            <label id="method">Choose a Payment Method:</label>
            <select id="method" name="method">
            <option value="ideal">IDeal</option>
            <option value="paypal">PayPal</option>            
            </select>
            <br><br>
            <input type="submit" name="payment" value="Buy"><br><br><br><br>
        </form>
    </div> 

    
</body>
</html>