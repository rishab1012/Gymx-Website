<?php

session_start();

require 'config.php';
require_once ('C:/xampp/htdocs/gymx/tcpdf/tcpdf.php');
require_once ('C:/xampp/htdocs/gymx/tcpdf/tcpdf_autoconfig.php');

if (!empty($_POST)){
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

    // Clear the session variable if needed

    // razorpay response
    $razorpay_order_id = $_POST['razorpay_order_id'];
    $razorpay_signature = $_POST['razorpay_signature'];
    $razorpay_payment_id = $_POST['razorpay_payment_id'];

    $_SESSION['orderid'] = $razorpay_order_id;
    $_SESSION['signature'] = $razorpay_signature;
    $_SESSION['paymentid'] = $razorpay_payment_id;

    // generate a server side signature
    $generated_signature = hash_hmac('sha256',$order_id . "|" . $razorpay_payment_id, API_SECRET);
    $amount = $_POST['amount'];
    $display_amount=$amount / 100;
    if ($generated_signature == $razorpay_signature){

        // Check if email exists in the database
        $conn = mysqli_connect("localhost", "root", "", "gymx") or die("connection failed");
        $check_email_query = "SELECT * FROM members_list WHERE Email = '{$email}'";
        $check_email_result = mysqli_query($conn, $check_email_query);
        if (mysqli_num_rows($check_email_result) > 0) {
            // Email already exists, handle accordingly (display error message or redirect)
            echo "<script>
            alert('Email already exists');
          </script>";
          echo "<script>
              window.location.href='http://localhost/gymx/Booking/Booking.php';
          </script>";
            exit(); // Terminate script execution
        }

        // Insert new record into the database
        $sql = "INSERT INTO members_list(Client_name,Present_address,Email,phone_no,DOB,Medical_issues,start_date,Em_name,Em_address,Em_phone_no,plan_id,end_date) VALUES('{$name}','{$address}','{$email}','{$phone}','{$dob}','{$med_issues}','{$start_date}','{$em_name}','{$em_address}','{$em_phno}','{$planid}',date_add('{$start_date}',INTERVAL 35 day))";

        $result = mysqli_query($conn, $sql) or die("query unsuccessful.");

        mysqli_close($conn);

        // Display success message and redirect
        echo '<!DOCTYPE html>
        <html lang="en">
        <head>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
          <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
          <title>Payment Success - GymX Membership</title>
          <style>
            body {
              background-color: #000;
              color: #fff;
            }
            .container {
              margin-top: 100px; /* Adjusted margin-top for added space */
            }
            .icon-check {
              color: #28a745;
              font-size: 100px;
            }
            .redirect-message {
              background-color: #dc3545; /* Red color */
              color: #fff;
              padding: 10px;
              border-radius: 10px;
              margin-bottom: 40px;
            }
          </style>
        </head>
        <body>

        <div class="container text-center">
          <img src="https://i.postimg.cc/RZ0dT8PQ/logo.png" alt="GymX Logo" class="img-fluid" style="max-width: 100px; position: absolute; top: 10px; left: 10px;">
          <div class="row">
            <div class="col">
              <!-- Gym Logo -->
              <div id="redirect-message" class="redirect-message">
                You will be redirected to the homepage in <span id="countdown">15</span> seconds.
              </div>
              <i class="fas fa-check-circle icon-check"></i>
              <h1 class="mt-3">Payment Successful!</h1>
              <p class="lead">Thank you for choosing GymX Membership.</p>
              <a href="http://localhost/gymx/UserSide/userSide.php" class="btn btn-danger mt-3">Go to GymX Homepage</a>
              <a href="http://localhost/gymx/gateway/bill.php" class="btn btn-success mt-3">Download Booking Summary</a>
            </div>
          </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://kit.fontawesome.com/your-fontawesome-kit-id.js" crossorigin="anonymous"></script>

        <script>
          // Countdown script
          let countdown = 15;
          function updateCountdown() {
            document.getElementById(\'countdown\').innerText = countdown;
            if (countdown === 0) {
              window.location.href = "http://localhost/gymx/UserSide/userSide.php";
            } else {
              countdown--;
              setTimeout(updateCountdown, 1000);
            }
          }

          // Start countdown on page load
          setTimeout(updateCountdown, 1000);

        </script>

        </body>
        </html>
        ';
    }
    else{
      echo '
      <!DOCTYPE html>
      <html lang="en">
      
      <head>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
          <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
              integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+Wy2HS50S6S13S62S/gWu1Blb6FqktL+IAK" crossorigin="anonymous">
          <title>Payment Failed</title>
          <style>
              body {
                  background-color: #000;
                  color: #fff;
                  font-family: \'Arial\', sans-serif;
                  text-align: center;
                  display: flex;
                  flex-direction: column;
                  justify-content: center;
                  align-items: center;
                  height: 100vh;
                  margin: 0;
              }
      
              .container {
                  max-width: 400px;
                  background-color: #111; /* Darker background within container */
                  padding: 30px;
                  border-radius: 10px;
                  box-shadow: 0 0 10px rgba(255, 255, 255, 0.1);
              }
      
              h1 {
                  color: #dc3545;
              }
      
              p {
                  font-size: 18px;
                  margin-bottom: 20px;
              }
      
              .btn-redirect {
                  background-color: #dc3545;
                  color: #fff;
                  border: none;
                  border-radius: 5px;
                  padding: 10px 20px;
                  text-decoration: none;
                  cursor: pointer;
                  font-size: 16px;
                  transition: background-color 0.3s ease;
              }
      
              .btn-redirect:hover {
                  background-color: #bd2130;
              }
          </style>
      </head>
      
      <body>
          <div class="container">
              <h1 class="mb-4">Payment Failed</h1>
              <p>We apologize for the inconvenience, but it seems that your payment has failed. Please try again later.</p>
              <a href="http://localhost/gymx/UserSide/userSide.php" class="btn btn-redirect">Go to Homepage</a>
          </div>
      
          <!-- Bootstrap JS and dependencies -->
          <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
              integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
              crossorigin="anonymous"></script>
          <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
              integrity="sha384-eMN5Cg1VgESyKggHpsoS5wIBoqkPV8cG90FrZkFRQ4Ilt2JIO6rYdqqFiM1oyN9H"
              crossorigin="anonymous"></script>
          <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
              integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+Wy2HS50S6S13S62S/gWu1Blb6FqktL+IAK"
              crossorigin="anonymous"></script>
      </body>
      
      </html>
      ';
    }
}
?>
