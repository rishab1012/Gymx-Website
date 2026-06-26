<?php

include 'config.php';
session_start();

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $_SESSION['username'] = $username;
    // Using prepared statements to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result) {
        if ($result->num_rows == 1) {
            $result_fetch = $result->fetch_assoc();
            if ($result_fetch['is_verified'] == 1 && password_verify($password, $result_fetch['password'])) {
                echo "<script>
                        window.location.href='http://localhost/gymx/UserSide/userSide.php';
                    </script>";
            } else {
                echo "<script>
                        alert('Invalid username or password');
                        window.location.href='login.php';
                    </script>";
            }
        } else {
            echo "<script>
                    alert('Invalid username or password');
                    window.location.href='login.php';
                </script>";
        }
    } else {
        // Handle the query execution error
        echo "Error executing the query: " . $stmt->error;
    }

    // Close the prepared statement
    $stmt->close();
}

$conn->close();
?>
