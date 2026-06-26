<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="icon" type="image/x-icon" href="logo.ico">
    <link rel="stylesheet" href="style2reg.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <script>
       document.addEventListener('DOMContentLoaded', function () {
        // Form reference
        const form = document.forms['myform'];

        // Validate function
        function validateForm() {
          document.getElementById('Error1').textContent = '';
          document.getElementById('Error2').textContent = '';
          document.getElementById('Error3').textContent = '';
          document.getElementById('Error4').textContent = '';

          // Validation for User Name
          const username = form['username'].value;

          if (username.trim() === '') {
            document.getElementById('Error1').textContent = 'User Name is required';
            return false;
          }

          if (username.length > 50) {
              document.getElementById('Error1').textContent = 'User Name should not exceed 50 characters';
              return false;
          }

          const onlyLettersRegex = /^[A-Za-z]+$/;
          if (!onlyLettersRegex.test(username)) {
            document.getElementById('Error1').textContent = 'User Name should not contain numbers or Special';
            return false;
          }  

          const noSpecialCharsRegex = /^[A-Za-z\s]+$/;
          if (!noSpecialCharsRegex.test(username)) {
            document.getElementById('Error1').textContent = 'User Name should not contain special characters';
            return false;
          }

          // Validation for Email
          const email = form['email'].value;
          if (email.trim() === '') {
            document.getElementById('Error2').textContent = 'Enter Email Address';
            return false;
          }
        
          if (!validateEmail(email)) {
            document.getElementById('Error2').textContent = 'Invalid Email Address';
            return false;
          }

          // Validation for Password
          const password = form['password'].value;
          if (password.trim() === '') {
            document.getElementById('Error3').textContent = 'Password is required';
            return false;
          }

          if (password.length < 8 || password.length > 15) {
            document.getElementById('Error3').textContent = 'Password should be between 8 to 15 characters';
            return false;
          }

          const mixedCharRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,15}$/;
          if (!mixedCharRegex.test(password)) {
            document.getElementById('Error3').textContent = 'Password should contain at least one lowercase letter, one uppercase letter, and one digit';
            return false;
          }

          // Validation for Confirm Password
          const confirmPassword = form['confirmPassword'].value;
          if (confirmPassword.trim() === '') {
            document.getElementById('Error4').textContent = 'Confirm Your Password';
            return false;
          }

          if (password !== confirmPassword) {
            document.getElementById('Error4').textContent = 'Passwords do not match';
            return false;
          }

          return true; // If all validations pass
        }

        // Email validation function
        function validateEmail(email) {
          const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
          return emailRegex.test(email);
        }

        // Form submission handler
        form.addEventListener('submit', function (event) {
          if (!validateForm()) {
            // Prevent form submission if validation fails
            event.preventDefault();
          }
        });
      });
    </script>
    <style>
        .error-message {
            color: red;
            margin-top: 5px; /* Add some spacing between input and error message */
          }
          .L{
            position: relative;
            left: 10px;
            bottom: 10px;
          }
    </style>
</head>
<body>
    <div class="wrapper">
        <form action="register.php" name="myform" method="POST">
            <img src="images/logo.png" alt="" class="logo">
            <h1>REGISTRATION</h1>
            <div class="input-box">
              <label for="username" class="L">Name:</label>
                <input type="text" id="username" name="username" placeholder="Enter Name">
                <i class='bx bxs-user' ></i>
                <p id="Error1" class="error-message"></p>
            </div>

            <div class="input-box">
              <label for="email" class="L">Email:</label>
                <input type="email" id="email" name="email" placeholder="Enter Email" >
                <i class='bx bx-envelope' ></i>
                <p id="Error2" class="error-message"></p>
            </div>

            <div class="input-box">
              <label for="password" class="L">Password:</label>
                <input type="password" id="password" name="password" placeholder="Enter Password" >
                <i class='bx bxs-lock-alt'></i>
                <p id="Error3" class="error-message"></p>
            </div>

            <div class="input-box">
              <label for="confirmPassword" class="L">Confirm Password:</label>
                <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Enter Confirm Password" >
                <i class='bx bxs-lock-alt'></i>
                <p id="Error4" class="error-message"></p>
            </div>

            <button type="submit" class="btn">Register</button>

            <div class="register-link">
                <p>Do You Have an Account? 
                <a href="login.php">Login</a></p>

            </div>
        </form>
    </div>  
</body>
</html>
