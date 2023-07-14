<?php
require ('../fpdf/fpdf.php');

function generatePDF($title, $description) {
    // Create PDF object
    $pdf = new FPDF();
  
    // Add page
    $pdf->AddPage();
  
    // Set font and font size
    $pdf->SetFont('Arial', 'B', 16);
  
    // Add title
    $pdf->Cell(0, 10, 'Maintenance Request Details', 0, 1);
  
    // Set font and font size
    $pdf->SetFont('Arial', '', 12);
  
    // Add details
    $pdf->Cell(0, 10, 'Title: ' . $title, 0, 1);
    $pdf->Cell(0, 10, 'Description: ' . $description, 0, 1);
    // $pdf->Cell(0, 10, 'Status: ' . $status, 0, 1);
  
    // Output PDF
    $pdf->Output();
//     error_reporting(E_ALL);
// ini_set('display_errors', 1);
  }

  

?>