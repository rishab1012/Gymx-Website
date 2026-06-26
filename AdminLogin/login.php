<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" type="image/x-icon" href="logo.ico">
    <link rel="stylesheet" href="loginstyle.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
    // Form reference
    const form = document.forms['myform'];

    // Validate function
    function validateForm() {
      document.getElementById('Error1').textContent = '';
      document.getElementById('Error2').textContent = '';


      // Validation for User Name
      const username = form['adminusername'].value;

    if (username.trim() === '') {
      document.getElementById('Error1').textContent = 'Please enter your name';
      return false;
    }
    if (username.length > 50) {
          document.getElementById('Error1').textContent = 'Please enter a name that does not exceed 50 characters';
          return false;
        }
    const onlyLettersRegex = /^[A-Za-z]+$/;
    if (!onlyLettersRegex.test(username)) {
      document.getElementById('Error1').textContent = 'Please enter name that does not contain numbers or special characters';
      return false;
    }  
    const noSpecialCharsRegex = /^[A-Za-z\s]+$/;
    if (!noSpecialCharsRegex.test(username)) {
      document.getElementById('Error1').textContent = 'Please enter name that does not contain special characters';
      return false;
    }


      // Validation for  password
      const password = form['adminpassword'].value;
      if (password.trim() === '') {
        document.getElementById('Error2').textContent = 'Please enter password';
        return false;
      }


      return true; // If all validations pass
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
</head>
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
<body>
    <div class="wrapper">
        <form action="adminverify.php" name="myform" method="POST">
            <img src="images/logo.png" class="logo" alt="">
            <h1>LOGIN</h1>
            <div class="input-box">
              <label for="adminusername" class="L">Name:</label>
                <input type="text" id="adminusername" name="adminusername" placeholder="Enter Name"  >
                <i class='bx bxs-user' ></i>
                <p id="Error1" class="error-message"></p>
            </div>

            <div class="input-box">
              <label for="adminpassword" class="L">Password:</label>
                <input type="password" id="adminpassword" name="adminpassword" placeholder="Enter Password" >
                <i class='bx bxs-lock-alt'></i>
                <p id="Error2" class="error-message"></p>
            </div>

            <button type="submit" class="btn">Login</button>
        </form>
    </div>
    
</body>
</html>