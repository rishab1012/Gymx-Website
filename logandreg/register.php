<?php
require 'config.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendMail($email, $v_code){

    require('PHPMailer/PHPMailer.php');
    require('PHPMailer/SMTP.php');
    require('PHPMailer/Exception.php');

    $mail = new PHPMailer(true);

try {
    //Server settings
   // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'unknownlegend52@gmail.com';                     //SMTP username
    $mail->Password   = 'sewg lrec ijmx yeps';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('unknownlegend52@gmail.com', 'GYMX Fitness Club');
    $mail->addAddress($email);     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Email Verification';
    $mail->Body = "
    <!DOCTYPE html>
    <html lang=\"en\">
    <head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>Welcome to Gymx Fitness Club!</title>
    <style>
    .body{
    background-color:#F0F8FF;
    }
    </style>
    </head>
    <body>
    <table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"max-width: 600px;\">
      <tr>
        <td align=\"center\" bgcolor=\"#ffffff\" style=\"padding: 40px 0 30px 0;\">
          <img src=\"https://i.postimg.cc/RZ0dT8PQ/logo.png\" alt=\"Gymx Fitness Club\" width=\"300\" height=\"auto\" style=\"display: block;\">
        </td>
      </tr>
      <tr>
        <td bgcolor=\"#ffffff\" style=\"padding: 40px 30px 40px 30px;\">
          <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
            <tr>
              <td style=\"color: #153643; font-family: Arial, sans-serif; font-size: 24px; text-align: center;\">
                <strong>Welcome to Gymx Fitness Club!</strong>
              </td>
            </tr>
            <tr>
              <td style=\"padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 24px; text-align: center;\">
                <p>We’re excited to have you join us for a transformative fitness journey!</p>
                <p>Before you dive into our amenities and beginner-friendly classes, please verify your email address by clicking the button below:</p>
                <p><a href=\"http://localhost/gymx/logandreg/verify.php?email=$email&v_code=$v_code\" style=\"background-color: #007bff; color: #ffffff; display: inline-block; padding: 10px 20px; text-decoration: none; border-radius: 5px;\">Verify Your Email</a></p>
                <p>If the above button doesn't work, you can copy and paste the following URL into your web browser's address bar:</p>
                <p>http://localhost/gymx/logandreg/verify.php?email=$email&v_code=$v_code</p>
              </td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td bgcolor=\"#ffffff\" style=\"padding: 20px 30px 20px 30px; font-family: Arial, sans-serif; font-size: 14px; text-align: center;\">
          <p>If you have any questions or need assistance, feel free to contact us. We're here to help!</p>
        </td>
      </tr>
    </table>
    </body>
    </html>";


    $mail->send();
    return true;
} catch (Exception $e) {
    return false;
}
}
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get user input from the form
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];

    // Check if the password and confirm password match
    if ($password != $confirmPassword) {
        echo "<script>
                        alert('password doesnt match');
                        window.location.href='http://localhost/gymx/logandreg/registration2.php';
                    </script>";
        
        exit();
    }

    // Check if the email is already present in the database
$checkEmailQuery = "SELECT * FROM users WHERE email = '$email'";
$resultEmail = $conn->query($checkEmailQuery);

// Check if the email already exists
if ($resultEmail->num_rows > 0) {
    echo "<script>
      alert('Email already exists');
    </script>";
    echo "<script>
        window.location.href='http://localhost/gymx/logandreg/registration2.php';
    </script>";
    exit(); // Stop further execution
}


    $v_code=bin2hex(random_bytes(16));
    $hashpassword=($password=password_hash($_POST['password'],PASSWORD_BCRYPT));
        // If all checks pass, insert the data into the database
    $query = "INSERT INTO users (username, email, password, verification_code, is_verified) VALUES ('$username', '$email', '$hashpassword', '$v_code','0')";

    if ($conn->query($query) === TRUE) {
        echo "Registration successful!";
        // You may want to redirect to a success page or handle this success differently
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }

    if (sendMail($email,$v_code)){

        echo"
        <script>
        alert('Registration Successful');
        window.location.href='login.php';
        </script>
        ";

    }
    else{

        echo"
        <script>
        alert('Server Down');
        window.location.href='login.php';
        </script>
        ";

    }



    
    // Close the database connection
    $conn->close();
}
?>
