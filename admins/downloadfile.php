<?php
include '../db/dbConn.php';
include './pdf_functions.php';
// include '../fpdf/fpdf.php';

$json = $_POST['json'];
$data = json_decode($json, true);

$email = mysqli_real_escape_string($connection, $data['Email']);
$sql = "SELECT * FROM users WHERE Email='$email'";

$ress= mysqli_query($connection, $sql);
$row = $ress->fetch_assoc();
// echo $row['FirstName'];

// $sql="SELECT * FROM users WHERE Email='$data[Email]";
// $row= mysqli_query($connection, $sql);
// var_dump($row);
// do something with $data
// var_dump($data);
 // Create PDF object
//  $pdf = new FPDF();
generatePDF($row['FirstName'],$row['LastName']);  
//  // Add page
//  $pdf->AddPage();
// echo 'fdgd';
//  // Set font and font size
//  $pdf->SetFont('Arial', 'B', 16);

//  // Add title
//  $pdf->Cell(0, 10, 'Maintenance Request Details', 0, 1);

//  // Set font and font size
//  $pdf->SetFont('Arial', '', 12);

//  // Add details
//  $pdf->Cell(0, 10,  $data , 0, 1);
//  $pdf->Cell(0, 10,  $row, 0, 1);
//  // $pdf->Cell(0, 10, 'Status: ' . $status, 0, 1);

//  // Output PDF
//  $pdf->Output();

echo "true";

?>