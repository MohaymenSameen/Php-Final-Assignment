<?php
    session_start();

    require('../fpdf182/fpdf.php');  

    if(!isset($_SESSION['username']))
    {
        header("Location: profile_view.php");
    }
    //creation of pdf after user has payed
    if(isset($_POST['download']))
    {
        $statImage = "../img/logo.png";
        $qrCode = "../img/qr-code.png";
        $pdf = new FPDF();
        $pdf->AddPage();        
    
        $pdf->SetFont('Arial','B',18);
        $pdf->Cell(40,10,'Ticket For The Event!');
    
        $pdf->SetFont('Arial','B',14);
        $pdf->MultiCell(50,40,$_SESSION['username']);
    
        $pdf->SetFont('Arial','B',14);
        $pdf->MultiCell(60,30,$_SESSION['firstname']);
    
        $pdf->SetFont('Arial','B',14);
        $pdf->MultiCell(70,40,$_SESSION['lastname']);
    
        //adding static images to the pdf
        $pdf->Image($statImage,150,5,40);
        $pdf->Image($qrCode,65,80,80);
    
        //pdf generation 
        $pdf->output();    
        
        $filename='Tickets.pdf';
        header("Content-type:application/pdf");
        header("Content-Disposition:inline;filename='$filename");
       
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/Stylesheet.css">    
    <title>Order Completed</title>
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
        <!--Using same form layout as login form to prevent duplicate code-->
        <form class="login_form" action="#" method="POST" name="orderconf">
            <h1>Order Completed</h1><br><br>                 
            <h1 style="font-size: 30px;">Thank you for purchasing tickets with us. You can download the tickets from here.</h1><br><br>   
            <input type="submit" name="download" value="Download Tickets"/><br><br>   
        </form>
    </div> 
</body>
</html>