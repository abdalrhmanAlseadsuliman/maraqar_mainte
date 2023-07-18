<?php
require ('../fpdf/fpdf.php');

// function generatePDF($title, $description) {
//     // Create PDF object
//     $pdf = new FPDF();
  
//     // Add page
//     $pdf->AddPage();
  
//     // Set font and font size
//     $pdf->SetFont('Arial', 'B', 16);
  
//     // Add title
//     $pdf->Cell(0, 10, 'Maintenance Request Details', 0, 1);
  
//     // Set font and font size
//     $pdf->SetFont('Arial', '', 12);
  
//     // Add details
//     $pdf->Cell(0, 10, 'Title: ' . $title, 0, 1);
//     $pdf->Cell(0, 10, 'Description: ' . $description, 0, 1);
//     // $pdf->Cell(0, 10, 'Status: ' . $status, 0, 1);
  
//     // Output PDF
//     $pdf->Output();
// //     error_reporting(E_ALL);
// // ini_set('display_errors', 1);
//   }

$data = $_POST['data'];
generatePDF($data);


function generatePDF($jsonData) {
  ob_clean();

  // Decode the JSON data
  $dataArray = json_decode($jsonData, true);
  $imageData = $dataArray['Img'];
  $g="../users/uploads/";
  $r = $dataArray['Email'];
  $t = $dataArray['DateContract'];

  $folder_path = '/home/abood/Downloads/';

  // Get the file extension
  $file_extension = "pdf";

  // Generate a new random file name
  $new_file_name = uniqid() . '.' . $file_extension;

  // Set the full path for the new file
  $new_file_path = $folder_path . $new_file_name;

  // Create a new FPDF object
  $pdf = new FPDF();

  // Add a new page to the file
  $pdf->AddPage();

  // Set the font and font size
  $pdf->SetFont('Arial', 'B', 16);

  // Add the title
  $pdf->Cell(0, 10, 'Maintenance Request Details', 0, 1);

  // Set the font and font size
  $pdf->SetFont('Arial', '', 12);

  // Add the details
  $pdf->Cell(0, 10, 'Title: ' . $imageData, 0, 1);
  $pdf->Cell(0, 10, 'Title: ' . $r, 0, 1);
  $pdf->Cell(0, 10, 'Description: ' . $t, 0, 1);

  // Set the X and Y coordinates for the imagefo
  // $images2 = explode(",", $dataArray['Img']);
  // foreach($imageData as $imgy){
  //   $z=$g.$imgy;
  //   $pdf->Cell(0, 10, 'Description: ' .$z , 0, 1);
  //   $pdf->Image($g.$imgy);
    
  // }
  

  // Output the file to the specified full path
  $pdf->Output($new_file_path, 'F');

  // Set headers for file download
  header('Content-Type: application/pdf');
  header('Content-Disposition: attachment; filename="' . $new_file_name . '"');
  header('Content-Length: ' . filesize($new_file_path));

  // Return the file for download
  readfile($new_file_path);
}

?>