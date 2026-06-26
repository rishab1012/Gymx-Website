<?php

session_start();

$conn = mysqli_connect("localhost", "root", "", "gymx");

if (isset($_POST['details_save'])) {
    $plan_id = $_POST['plan_id'];
    $plan_name = $_POST['plan_name'];
    $plan_amount = $_POST['plan_amount'];


    $planExists = checkPlanExists($conn, $plan_id);

    if ($planExists) {
        $_SESSION['status'] = "Plan Id already exists.";
        header("Location: http://localhost/gymx/dashboard/admindashboard.php");
        exit;
    }

    $sql = "INSERT INTO plans(id,Plans_details,Amount) VALUES('{$plan_id}','{$plan_name}','{$plan_amount}')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['status'] = "Saved successfully";
        header("Location: http://localhost/gymx/dashboard/admindashboard.php");
    } else {
        $_SESSION['status'] = "Details not saved";
        header("Location: http://localhost/gymx/dashboard/admindashboard.php");
    }
}

function checkPlanExists($conn, $plan_id)
{
    $query = "SELECT * FROM plans WHERE id = '{$plan_id}'";
    $result = mysqli_query($conn, $query);

    return mysqli_num_rows($result) > 0;
}
?>
