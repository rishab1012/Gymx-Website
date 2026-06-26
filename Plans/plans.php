<?php session_start(); ?>
<?php
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
    <title>Add Plan</title>
    <link rel="icon" type="image/x-icon" href="logo.ico">

    <!-- stylesheet -->
    <link rel="stylesheet" href="booking.css"/>

    <link rel="stylesheet" href="navbar.css">
    
    <link rel="stylesheet" href="footer.css">

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

      // Validation for Enrollment Number
      const planid = form['plan_id'].value;
      const numericRegex = /^[0-9]+$/; // Regular expression to match only numbers

      if (planid.trim() === '') {
        document.getElementById('Error').textContent = 'plan id is required';
        return false;
      } else if (!numericRegex.test(planid)) {
        document.getElementById('Error').textContent = 'Only numbers are allowed for plan id';
        return false;
      }


      // Validation for Client Name
      const planName = form['plan_name'].value;

    if (planName.trim() === '') {
      document.getElementById('Error1').textContent = 'Plan Detail is required';
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

    // Validation for Amountr
    const amount = form['plan_amount'].value;

      if (amount.trim() === '') {
        document.getElementById('Error2').textContent = 'plan Amount is required';
        return false;
      }
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
      .error-message {
        color: red;
        margin-top: 5px; /* Add some spacing between input and error message */
      }
      .container1{
    position: relative;
    top: 50px;
    max-width: 500px;
    width: 400px;
    background: rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(40px);
    padding: 25px;
    border-radius: 8px;
    box-shadow: 0 0 15px rgba(227, 197, 197, 0.1);
    left: 36%;
    display: flex;
    flex-wrap: wrap;
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
        <!-- Nav Bar -->s
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


  <div class="container-fluid">
    <section class="container1">
      <header style="text-align: center;">
        <h2>Add Plan</h2>
      </header>

      
      <form action="savedata.php" class="form1" name="myform" method="post" enctype="multipart/form-data">


        <div class="input-box">
          <label>Plan ID</label>
          <input type="text" placeholder="Enter ID" name="plan_id" . />
          <p id="Error" class="error-message"></p>
        </div>
        <div class="input-box">
          <label>Plan Duration</label>
          <input type="text" placeholder="Enter Name" name="plan_name" . />
          <p id="Error1" class="error-message"></p>
        </div>
        <div class="input-box">
          <label>Plan Amount (Rs.)</label>
          <input type="text" placeholder="Enter Name" name="plan_amount" . />
          <p id="Error2" class="error-message"></p>
        </div>
        
        <input type="submit" value="save" name="details_save" class="btn"  >

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


    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
    <script src="booking.js"></script>
</body>


</html>
<?php
        }
?>