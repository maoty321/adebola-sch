<style>
    
</style>
<?php
include '../dbconnect.php';// Path to dompdf autoload.php

use Dompdf\Dompdf;

// Create an instance of Dompdf
$dompdf = new Dompdf();

// Get the HTML content (you can include your PHP template)
ob_start();
include 'bio-data-receipt.php'; // Your HTML/PHP page

$html = ob_get_clean();

// Load HTML content
$dompdf->loadHtml($html);

// (Optional) Setup paper size and orientation
$dompdf->setPaper('A4', 'portrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF (force download)
$dompdf->stream("student_details.pdf", ["Attachment" => true]);
?>
