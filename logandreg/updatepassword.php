<?php
include 'config.php';
if (isset($_GET['email']) && isset($_GET['resettoken'])) {
    $email = $_GET['email'];
    $reset_token = $_GET['resettoken'];
    date_default_timezone_set('Asia/Kolkata');
    $date = date("Y-m-d");
    $query = "SELECT * FROM users WHERE email=? AND resettoken=? AND resettokenexpire=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sss", $email, $reset_token, $date);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Update</title>
    <link rel="stylesheet" href="loginstyle.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<style>
        .error-message {
            color: red;
        }
    </style>

<body>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.forms['myform'];

            function validateForm() {
                document.getElementById('Error1').textContent = '';
                document.getElementById('Error2').textContent = '';

                const password = form['password'].value;
                if (password.trim() === '') {
                    document.getElementById('Error1').textContent = 'Password is required';
                    return false;
                }

                const confirmPassword = form['confirmPassword'].value;
                if (confirmPassword.trim() === '') {
                    document.getElementById('Error2').textContent = 'Confirm password is required';
                    return false;
                }
                if (password !== confirmPassword) {
                    document.getElementById('Error2').textContent = 'Passwords do not match';
                    return false;
                }

                return true;
            }

            form.addEventListener('submit', function (event) {
                if (!validateForm()) {
                    event.preventDefault();
                }
            });
        });
    </script>

    <div class="wrapper">
        <form name="myform" method="POST">
            <img src="images/logo.png" class="logo" alt="">
            <h1>Reset Password</h1>
            <div class="input-box">
                <input type="password" id="password" name="password" placeholder="Password">
                <i class="bx bxs-user"></i>
                <p id="Error1" class="error-message"></p>
            </div>

            <div class="input-box">
                <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password">
                <i class="bx bxs-lock-alt"></i>
                <p id="Error2" class="error-message"></p>
            </div>

            <button type="submit" name="updatepassword" class="btn">Change Password</button>
            <input type="hidden" name="email" value="<?php echo $_GET['email']; ?>">
        </form>
    </div>
</body>

</html>

<?php
    } else {
        echo "<script>
            alert('Invalid or Expired link');
            window.location.href='resetpassword.php';
            </script>";
    }
} else {
    echo "<script>
        alert('Server down, try again later');
        window.location.href = 'resetpassword.php';
    </script>";
}
?>

<?php
if (isset($_POST['updatepassword'])) {
    $email = $_POST['email'];
    $pass = password_hash($_POST['confirmPassword'], PASSWORD_BCRYPT);
    $query = "UPDATE users SET password = ?, resettoken = NULL, resettokenexpire = NULL WHERE email = ?";
    $update = $conn->prepare($query);
    $update->bind_param("ss", $pass, $email);
    $update->execute();

    if ($update->affected_rows > 0) {
        echo "<script>
            alert('Password Updated Successfully');
            window.location.href = 'login.php';
        </script>";
    } else {
        echo "<script>
            alert('Server down, try again later');
            window.location.href = 'resetpassword.php';
        </script>";
    }
}
?>