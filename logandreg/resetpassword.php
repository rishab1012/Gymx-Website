
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
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
        
      // Validation for Email
    const email = form['email'].value;
      if (email.trim() === '') {
        document.getElementById('Error1').textContent = 'Enter Email Address';
        return false;
      }
      
      if (!validateEmail(email)) {
        document.getElementById('Error1').textContent = 'Invalid Email Address';
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
      .btn:hover{
        background-color: #820300;
      }
</style>
<body>
    <div class="wrapper">
        <form action="resetpass.php" name="myform" method="POST">
            <img src="images/logo.png" class="logo" alt="">
            <h1>RESET PASSWORD</h1>
            <div class="input-box">
                <input type="text" id="email" name="email" placeholder="Email"  >
                <i class='bx bxs-user' ></i>
                <p id="Error1" class="error-message"></p>
            </div>
              <button type="submit" class="btn">Send Link</button>
        </form>
    </div>
    
</body>
</html>