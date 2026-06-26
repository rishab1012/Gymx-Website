<?php 

$ER_NO = $_POST['er_no'];
$CLIENT_NAME = $_POST['client_name'];
$PRESENT_ADDRESS = $_POST['present_address'];
$PHONE_NO = $_POST['ph_no'];
$DOB = $_POST['dob'];
$MEDICAL_ISSUES = $_POST['medical_issues'];
$EM_NAME = $_POST['em_name'];
$EM_ADDRESS = $_POST['em_address'];
$EM_PHONE_NO = $_POST['em_ph_no'];


$conn= mysqli_connect("localhost","root","","gymx") or die("connection failed");

$sql= "INSERT INTO members_list(Enrollment_no,Client_name,Present_address,phone_no,DOB,Medical_issues,Em_name,Em_address,Em_phone_no) VALUES('{$ER_NO}','{$CLIENT_NAME}','{$PRESENT_ADDRESS}', '{$PHONE_NO}','{$DOB}','{$MEDICAL_ISSUES}','{$EM_NAME}','{$EM_ADDRESS}','{$EM_PHONE_NO}')";
$result= mysqli_query($conn, $sql) or die("query unsuccessful.");

header("Location: http://localhost/gymx/members/navbar.php");

mysqli_close($conn);
?>