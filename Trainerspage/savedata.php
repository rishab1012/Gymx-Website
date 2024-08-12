<?php 
$id = $_POST['id'];
$name = $_POST['trainer_name'];
$address = $_POST['trainer_address'];
$email = $_POST['trainer_email'];
$phone_no = $_POST['trainer_phone_no'];
$dob = $_POST['trainer_dob'];
$gender = $_POST['gender'];
$joining_date = $_POST['trainer_joining_date'];
$salary = $_POST['trainer_salary'];

$conn = mysqli_connect("localhost", "root", "", "gymx") or die("connection failed");

$sql_check_id = "SELECT * FROM trainers_list WHERE trainer_id = '$id'";
$result_check_id = mysqli_query($conn, $sql_check_id);
if(mysqli_num_rows($result_check_id) > 0) {
    // Trainer ID already exists, display alert message
    echo "<script>alert('Trainer ID already exists. Please choose a different ID.');</script>";
    // Redirect back to the previous page
    echo "<script>window.location.href = 'http://localhost/gymx/Trainerspage/trainers.php';</script>";
    exit();
}

$sql = "INSERT INTO trainers_list (trainer_id, trainer_name, gender, trainer_email, trainer_phone_no, trainer_dob, trainer_address, trainer_joining_date, trainer_salary) VALUES ('$id', '$name', '$gender', '$email', '$phone_no', '$dob', '$address', '$joining_date', '$salary')";

$result = mysqli_query($conn, $sql) or die("query unsuccessful.");

header("Location: http://localhost/gymx/Trainerspage/trainers.php");

mysqli_close($conn);
?>
