<?php

    session_start();
    require('../fpdf182/fpdf.php');  

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

    $pdf->Image($statImage,150,5,40);
    $pdf->Image($qrCode,65,80,80);

    $pdf->output("Ticket.pdf","F");

    $email_address=$_SESSION['username'];
    $firstname=$_SESSION['firstname'];
    mail($email_address,"Ticket PDF","Thank you for purchasing a ticket for the event $firstname !","From: 627650@student.inholland.nl\r\n");


?>