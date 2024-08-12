<?php
session_start();

require 'config.php';
require_once('C:/xampp/htdocs/gymx/tcpdf/tcpdf.php');
require_once('C:/xampp/htdocs/gymx/tcpdf/tcpdf_autoconfig.php');

$order_id = $_SESSION['order_id'];

$dataHolder = isset($_SESSION['temp_data']) ? $_SESSION['temp_data'] : array();
$name = $dataHolder['name'];
$address = $dataHolder['address'];
$phone = $dataHolder['phone'];
$dob = $dataHolder['dob'];
$planid = $dataHolder['planid'];
$plandetails = $dataHolder['plandetails'];
$start_date = $dataHolder['start_date'];
$med_issues = $dataHolder['med_issues'];
$email = $dataHolder['email'];
$em_name = $dataHolder['em_name'];
$em_address = $dataHolder['em_address'];
$em_phno = $dataHolder['em_phno'];
$billamount = $dataHolder['amount'];
$display_amount = $billamount / 100;

$razorpay_order_id =  $_SESSION['orderid'];
$razorpay_signature = $_SESSION['signature'];
$razorpay_payment_id = $_SESSION['paymentid'];

$pdf = new TCPDF();
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->AddPage();

$pdf->SetFont('Helvetica', '', 40);
$pdf->SetXY(10, 20);
$pdf->Text(10, 30, 'GYMX');

$pdf->SetXY(10, 45);
$companyAddress = "Kesarval, Quelossim, Goa 403710";
$pdf->SetFont('Helvetica', '', 10);
$pdf->Cell(0, 10, "$companyAddress", 0, 1);

$customerName = $name;
$customerEmail = $email;
$pdf->SetXY(10, 55);
$pdf->Cell(0, 10, "Customer Name: $customerName", 0, 1);
$pdf->SetXY(10, 60);
$pdf->Cell(0, 10, "Customer Email: $customerEmail", 0, 1);

// Set invoice details
$pdf->SetXY(10, 80);
$pdf->SetFont('Helvetica', 'B', 14);
$pdf->Cell(0, 10, 'Invoice', 0, 1);

// Set transaction ID
$pdf->SetFont('Helvetica', '', 10);
$pdf->Cell(0, 10, "Transaction ID: $razorpay_payment_id", 0, 1);

// Draw rectangular field with black border
$pdf->SetXY(10, 100);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetDrawColor(0, 0, 0);
$pdf->SetLineWidth(0.5);
$pdf->Cell(190, 50, '', 1, 1, 'C', true);

// Set purchase date
$purchaseDate = date('Y-m-d'); // Use your preferred date format
$pdf->SetFont('Helvetica', '', 10);
$pdf->SetXY(10, 105);
$pdf->Cell(0, 10, "Purchase Date:", 0, 1);
$pdf->SetXY(175, 105);
$pdf->Cell(0, 10, "$purchaseDate", 0, 1);


// Set description, service period, and amount
$pdf->SetXY(10, 120);
$pdf->Cell(0, 10, 'Description:', 0, 1);
$pdf->Cell(0, 10, 'Service Period:', 0, 1);
$pdf->Cell(0, 10, 'Amount:', 0, 1);

$pdf->SetXY(172, 120);
$pdf->Cell(0, 10, 'GymX Service', 0, 1);
$pdf->SetXY(172, 130);
$pdf->Cell(0, 10, "$plandetails", 0, 1);
$pdf->SetXY(185, 140);
$pdf->Cell(0, 10, "$display_amount", 0, 1);

// Set total paid
$pdf->SetXY(10, 160);
$pdf->SetFont('Helvetica', 'B', 12);
$pdf->Cell(0, 10, 'Total Paid:', 0, 0, 'L');
$pdf->SetXY(185, 160);
$pdf->Cell(0, 10, "Rs. $display_amount", 0, 1);

header('Content-Type: application/pdf');
$pdf->Output('php://output', 'I');
//  header('Content-Type: application/pdf');
// header('Content-Disposition: attachment; filename="bill_' . $order_id . '.pdf"');
// $pdf->Output('php://bill_' . $order_id . '.pdf', 'D');

?>
