<?php
session_start();
        if(!isset($_SESSION['adminusername'])){
          echo "<script>
                        window.location.href='http://localhost/gymx/AdminLogin/login.php';
                    </script>";
        }
        else{

  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add Trainers</title>
    <link rel="icon" type="image/x-icon" href="logo.ico">
    
    <!-- stylesheet -->
    <link rel="stylesheet" href="booking.css?v=<?php echo time(); ?>"/>


    <link rel="stylesheet" href="navbar.css"/>

    <link rel="stylesheet" href="footer.css"/>

    

    <!-- remix icon -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">

    <!-- bootstrap -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


    <script>
  document.addEventListener('DOMContentLoaded', function () {
    // Form reference
    const form = document.forms['myform'];

    // Validate function
function validateForm() {
  // Reset error messages
  document.getElementById('Error').textContent = '';
  document.getElementById('Error1').textContent = '';
  document.getElementById('Error2').textContent = '';
  document.getElementById('Error3').textContent = '';
  document.getElementById('Error4').textContent = '';
  document.getElementById('Error5').textContent = '';
  document.getElementById('Error6').textContent = '';
  document.getElementById('Error7').textContent = '';
  document.getElementById('Error8').textContent = '';
  document.getElementById('Error9').textContent = '';
  document.getElementById('Error10').textContent = '';

  // Validation for id
  const id = form['id'].value;
  const numericRegex = /^[0-9]+$/; // Regular expression to match only numbers

  if (id.trim() === '') {
    document.getElementById('Error').textContent = 'Please enter the trainer id';
    return false;
  } else if (!numericRegex.test(id)) {
    document.getElementById('Error').textContent = 'Please enter only numbers in the trainer id field';
    return false;
  }
  if (id.length > 10) {
    document.getElementById('Error').textContent = 'Trainer id should not exceed 10 digits.';
    return false;
  }

  // Validation for trainer Name
  const trainerName = form['trainer_name'].value;

  if (trainerName.trim() === '') {
    document.getElementById('Error1').textContent = 'Trainer Name is required';
    return false;
  }
  const onlyLettersRegex = /^[A-Za-z\s]+$/; // Allow spaces in the name
  if (!onlyLettersRegex.test(trainerName)) {
    document.getElementById('Error1').textContent = 'Trainer Name should only contain letters';
    return false;
  }  

  // Validation for Present Address
  const trainerAddress = form['trainer_address'].value;
  if (trainerAddress.trim() === '') {
    document.getElementById('Error2').textContent = 'Present Address is required';
    return false;
  }

  // Validation for Email
  const trainerEmail = form['trainer_email'].value;
  const emailRegex = /\S+@\S+\.\S+/; // Basic email validation regex
  if (trainerEmail.trim() === '' || !emailRegex.test(trainerEmail)) {
    document.getElementById('Error3').textContent = 'Invalid Email Address';
    return false;
  }

  // Phone number validation 
  const trainerPhoneNo = form['trainer_phone_no'].value;
  if (trainerPhoneNo.trim() === '') {
    document.getElementById('Error4').textContent = 'Phone number cannot be empty.';
    return false;
  }
  if (!/^\d{10}$/.test(trainerPhoneNo)) {
    document.getElementById('Error4').textContent = 'Invalid Phone number. It should be 10 digits and contain only numbers.';
    return false;
  }

  // DOB validation
  const dob = form['trainer_dob'].value;
  if (!dob) {
    document.getElementById('Error5').textContent = 'Please select your date of birth';
    return false;
  }

  // Joining date validation
  const trainerJoiningDate = form['trainer_joining_date'].value;
  if (!trainerJoiningDate) {
    document.getElementById('Error7').textContent = 'Please select the joining date';
    return false;
  }

  const gender = form['gender'].value;
  if (gender.trim() === '') {
    document.getElementById('Error8').textContent = 'Please select Gender';
    return false;
  }
  
  const salary = form['trainer_salary'].value;
  if (salary.trim() === '') {
    document.getElementById('Error10').textContent = 'Please enter the trainer salary';
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

    <style>
      .navbar{
        background-color: var(--primary-color);
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        z-index: 1000;
        box-shadow: 0 0 15px rgba(222, 197, 197, 0.1);
      }
      .row{
        background-color: #040d12;
        padding-bottom: 120px;
      }

      .btn{
        background-color: #B80000;
        color: white;
      }
      .btn:hover{
        background-color: #820300;
        color: white;
      }
      body{
        height: 50px;
      }
      .error-message {
        color: red;
        margin-top: 5px; /* Add some spacing between input and error message */
      }
                 
.footer_container{
    position: relative;
    display: grid;
    grid-template-columns: 400px repeat(3, 1fr);
    gap: 2rem;
    padding-top: 30px;
}

.footer_logo{
  position: relative;
  top: 230px;
    max-width: 150px;
    margin-bottom: 2rem;
}

.footer_col p{
    position: relative;
    left: 230px;
    top: 120px;
    margin-bottom: 2rem;
    color: var(--text-light);
}

.footer_socials{
  position: relative;
  left: 60em;
  bottom: -20px;
    display: flex;
    align-items: center;
    gap: 1rem;
}

.footer_bar{
  position: relative;
  left: 70em;
  bottom: 50px;
    max-width: var(--max-width);
    margin: auto;
    padding: 2px;
    font-size: 0.8rem;
    color: var(--white);
}
    </style>

<body id="body1">

<div class="container-fluid" id="container">
      <div class="row">

        <!-- header -->
        <!-- Nav Bar -->
        <nav class="navbar navbar-expand-lg navbar-dark">
          <a class="navbar-brand" href="#"
            ><img class="logo" src="images/logo.png" alt="logo-img"/></a>
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
           <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
          
          <li class="nav-item active">
              <a class="nav-link" title="Home" href="http://localhost/gymx/dashboard/admindashboard.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" title="Members" href="http://localhost/gymx/Members/members.php">Members</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" title="Trainers" href="http://localhost/gymx/Trainerspage/trainers.php">Trainers</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" title="Booking" href="http://localhost/gymx/Admin side booking page/Booking.php">Booking</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" title="Plans" href="http://localhost/gymx/plans/plansDetails.php">plans</a>
            </li>
            </ul>
          </div>
        </nav>
        </div>
    </div>


  <div class="container">
    <section class="container1">
      <header style="text-align: center;">
        <h2>Add Trainer</h2>
      </header>
      <form action="http://localhost/gymx/Trainerspage/savedata.php" class="form1" name="myform" method="post" enctype="multipart/form-data">

        <div class="item1">
        <div class="input-box">
          <label>Trainer Id</label>
          <input type="text" placeholder="Enter ID" name="id" required/>
          <p id="Error" class="error-message"></p>
        </div>
        <div class="input-box">
          <label>Trainer Name</label>
          <input type="text" placeholder="Enter Name" name="trainer_name" required />
          <p id="Error1" class="error-message"></p>
        </div>
      </div>

      <div class="item1">
        <div class="input-box">
          <label>Trainer Address</label>
          <input type="text" placeholder="Enter Address" name="trainer_address" required />
          <p id="Error2" class="error-message"></p>
        </div>
        
        <div class="input-box">
                    <label>Email</label>
                    <input type="text" placeholder="Enter Email" name="trainer_email" required/>
                    <p id="Error3" class="error-message"></p>
        </div>
      </div>

      <div class="item1">
        <div class="column">
          <div class="input-box">
            <label>Phone No</label>
            <input type="text" placeholder="Enter Phone Number" name="trainer_phone_no" required/>
            <p id="Error4" class="error-message"></p>
          </div>

          <div class="input-box">
            <label>DOB</label>
            <input type="date" placeholder="Enter Birth Date" name="trainer_dob" id="trainer_dob" required/>
            <p id="Error5" class="error-message"></p>
          </div>
        </div>
      </div>

      <div class="item1">
      <div class="input-box">
          <label>Gender</label>
          <input type="text" placeholder="Enter Gender" name="gender" required/>
          <p id="Error7" class="error-message"></p>
        </div>

        <div class="input-box">
          <label>Joining Date</label>
          <input type="date" placeholder="Enter starting Date" name="trainer_joining_date" id="date-input" required/>
          <p id="Error8" class="error-message"></p>
        </div>
            </div>
          
            <div class="item1">
            <div class="input-box">
          <label>Salary</label>
          <input type="text" placeholder="Enter Salary" name="trainer_salary" required/>
          <p id="Error10" class="error-message"></p>
        </div>
      </div>
  
        <input type="submit" value="Submit" name="details_save" class="btn">

      </form>
    </section>

    <footer class="section_container footer_container">
        <div class="footer_col">
          <div class="footer_logo"><img src="images/logo.png" alt="logo"></div>
          <p class="p">
            take the first step towards a healthier, stronger you with our 
            unbeatable pricing plan. let's sweat, achieve, and conquer together!
          </p>
          <div class="footer_socials">
            <a href="https://www.instagram.com/gymx.fitness.club?igsh=MTI3YWlnNGpwdWV5NA=="><i class="ri-instagram-line"></i></a>
          </div>
        </div>
      </footer>
      <div class="footer_bar">
        Copyright © 2023. All rights reserved.
      </div>
  </div>
    </div>

</div>


</script>

  <script>var today = new Date();
var todayISOString = new Date("1980-01-01").toISOString().split('T')[0];
document.getElementById("trainer_dob").setAttribute("min", todayISOString);


var today = new Date();
var todayISOString = new Date("2000-01-01").toISOString().split('T')[0];
document.getElementById("trainer_dob").setAttribute("max", todayISOString);

var today = new Date();
var todayISOString = new Date("2023-01-01").toISOString().split('T')[0];
document.getElementById("date-input").setAttribute("min", todayISOString);


var today = new Date();
var todayISOString = new Date("2024-03-26").toISOString().split('T')[0];
document.getElementById("date-input").setAttribute("max", todayISOString);</script>
</body>

</html>

<?php
        }
?>
