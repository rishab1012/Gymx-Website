<?php

 include 'config.php';

 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\SMTP;
 use PHPMailer\PHPMailer\Exception;
 
 function sendMail($email, $reset_token){
 
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
     $mail->Subject = 'Password Reset';
     $mail->Body = "
<!DOCTYPE html>
<html lang=\"en\">
<head>
  <meta charset=\"UTF-8\">
  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
  <title>Password Reset - Gymx Fitness Club</title>
  <style>
    body {
      background-color: #f4f4f4;
      font-family: 'Arial', sans-serif;
    }

    .container {
      max-width: 600px;
      margin: 0 auto;
      background-color: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .header {
      text-align: center;
      padding: 10px 0;
    }

    .header img {
      max-width: 150px;
      height: auto;
    }

    .title {
      color: #333;
      font-size: 24px;
      font-weight: bold;
      text-align: center;
      margin: 20px 0;
    }

    .content {
      text-align: center;
    }

    .message {
      color: #555;
      font-size: 16px;
      line-height: 1.6;
      margin-bottom: 20px;
    }

    .button-container {
      margin-top: 20px;
    }

    .button {
      display: inline-block;
      background-color: #c04747;
      color: #fff;
      padding: 10px 20px;
      text-decoration: none;
      border-radius: 5px;
    }

    .button:hover {
      background-color: #a03232;
    }

    .footer {
      text-align: center;
      padding: 20px 0;
      font-size: 14px;
      color: #777;
    }

    a {
      color: #fff !important;
      text-decoration: none;
    }

    a:hover {
      text-decoration: underline;
    }

    a.white-link:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class=\"container\">
    <div class=\"header\">
      <img src=\"https://i.postimg.cc/RZ0dT8PQ/logo.png\" alt=\"Gymx Fitness Club\">
    </div>
    <div class=\"title\">
      Password Reset - Gymx Fitness Club
    </div>
    <div class=\"content\">
      <div class=\"message\">
        <p>We have received a request to reset your password. If this wasn't you, please ignore this email.</p>
        <p>To reset your password, please click the button below:</p>
      </div>
      <div class=\"button-container\">
        <a href=\"http://localhost/gymx/logandreg/updatepassword.php?email=$email&resettoken=$reset_token\" class=\"button\">Reset Password</a>
    <div class=\"footer\">
      If you didn't request this password reset or need further assistance, please contact us immediately.
    </div>
  </div>
</body>
</html>";


 
 
     $mail->send();
     return true;
 } catch (Exception $e) {
     return false;
 }
 }
 
 if (isset($_POST['email'])) {
    $email = $_POST['email'];
    
    $query = "SELECT * FROM `users` WHERE `email`=? AND `is_verified` = 1";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if ($result && mysqli_num_rows($result) == 1) {
        $reset_token=bin2hex(random_bytes(10));
        date_default_timezone_set('Asia/Kolkata');
        $date=date("Y-m-d");
        $email = $_POST['email']; // It's better to sanitize and validate user input before using it in SQL queries
$query = "UPDATE `users` SET `resettoken`='$reset_token', `resettokenexpire`='$date' WHERE `email`='$email'";
        if (mysqli_query($conn,$query) && sendMail($_POST['email'],$reset_token)){
          echo "
          <script>
          alert('Email Sent Succesfully');
          window.location.href='resetpassword.php';
          </script>
          ";
        }
        else{
        echo "
        <script>
        alert('Email Can't be sent server down');
        window.location.href='resetpassword.php';
        </script>
        ";
        }
    } else {
        echo "
        <script>
        alert('email not found');
        window.location.href='resetpassword.php';
        </script>
        ";
    }
    mysqli_stmt_close($stmt);
}
else{
    echo "
    <script>
    alert('cannot run query');
    window.location.href='resetpassword.php';
    </script>
    ";
}

?>