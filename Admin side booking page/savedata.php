<?php

session_start();

$conn = mysqli_connect("localhost", "root", "", "gymx");

if (isset($_POST['details_save'])) {
    $ER_NO = $_POST['er_no'];
    $CLIENT_NAME = $_POST['client_name'];
    $PRESENT_ADDRESS = $_POST['present_address'];
    $EMAIL = $_POST['email'];
    $PHONE_NO = $_POST['ph_no'];
    $DOB = $_POST['dob'];
    $MEDICAL_ISSUES = $_POST['medical_issues'];
    $EM_NAME = $_POST['em_name'];
    $EM_ADDRESS = $_POST['em_address'];
    $EM_PHONE_NO = $_POST['em_ph_no'];
    $start_date = $_POST['start_date'];
    $plans = $_POST['plans_id'];

    // Server-side validation checks
    $emailExists = checkEmailExists($conn, $EMAIL);
    $enrollmentExists = checkEnrollmentExists($conn, $ER_NO);

    if ($emailExists || $enrollmentExists) {
        $_SESSION['status'] = "Enrollment number or email already exists";
        header("Location: http://localhost/gymx/Members/members.php");
        exit;
    }

    $sql = "INSERT INTO members_list(Enrollment_no,Client_name,Present_address,Email,phone_no,DOB,Medical_issues,Em_name,Em_address,Em_phone_no,plan_id,start_date,end_date) VALUES('{$ER_NO}','{$CLIENT_NAME}','{$PRESENT_ADDRESS}','{$EMAIL}', '{$PHONE_NO}','{$DOB}','{$MEDICAL_ISSUES}','{$EM_NAME}','{$EM_ADDRESS}','{$EM_PHONE_NO}','{$plans}','{$start_date}',date_add('{$start_date}',INTERVAL 35 day))";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['status'] = "Saved successfully";
        header("Location: http://localhost/gymx/Members/members.php");
    } else {
        $_SESSION['status'] = "Details not saved";
        header("Location: http://localhost/gymx/Members/members.php");
    }
}

// Function to check if email already exists
function checkEmailExists($conn, $email)
{
    $query = "SELECT * FROM members_list WHERE Email = '{$email}'";
    $result = mysqli_query($conn, $query);

    return mysqli_num_rows($result) > 0;
}

// Function to check if enrollment number already exists
function checkEnrollmentExists($conn, $enrollmentNo)
{
    $query = "SELECT * FROM members_list WHERE Enrollment_no = '{$enrollmentNo}'";
    $result = mysqli_query($conn, $query);

    return mysqli_num_rows($result) > 0;
}
?>
