
<?php
session_start();
// Hardcoded username and password
$hardcodedUsername = "user";
$hardcodedPassword = "pass";

// Get the entered username and password from the form
$enteredUsername = $_POST['adminusername'];
$enteredPassword = $_POST['adminpassword'];

// Check if the entered credentials match the hardcoded values
if ($enteredUsername === $hardcodedUsername && $enteredPassword === $hardcodedPassword) {
    $hardcodedUsername = "user";
    $_SESSION['adminusername'] = $hardcodedUsername;
    // If the credentials match, you can redirect the user to a link
    header("Location: https://gym-x.freedev.app/dashboard/admindashboard.php");
} else {
    echo "<script>
        alert('Please enter valid name or password');
        window.location.href='https://gym-x.freedev.app/AdminLogin/login.php';
    </script>";
}
?>