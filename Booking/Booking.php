
<?php
session_start();
        if(!isset($_SESSION['username'])){
          echo "<script>
                        window.location.href='http://localhost/gymx/logandreg/registration2.php';
                    </script>";
        }
        else{
  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Booking</title>
    <link rel="icon" type="image/x-icon" href="logo.ico">
    
    <!-- stylesheet -->
    <link rel="stylesheet" href="booking.css?v=<?php echo time(); ?>"/>


    <link rel="stylesheet" href="navbar.css"/>

    <link rel="stylesheet" href="footer.css"/>

    <link rel="stylesheet" href="orderSummary.css"/>

    

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

    <script src="booking.js"></script>


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
      document.getElementById('Error11').textContent = '';



      // Validation for Client Name
      const clientName = form['client_name'].value;

    if (clientName.trim() === '') {
      document.getElementById('Error1').textContent = 'Please enter the client name';
      return false;
    }
    if (clientName.length > 50) {
          document.getElementById('Error1').textContent = 'Please enter a Client name that does not exceed 50 characters';
          return false;
        }
        const onlyLettersRegex = /^[A-Za-z\s]+$/; // \s allows for spaces
if (!onlyLettersRegex.test(clientName)) {
  document.getElementById('Error1').textContent = 'Please enter Client name that does not contain numbers or special characters';
  return false;
}




      // Validation for Present Address
      const presentAddress = form['present_address'].value;
      if (presentAddress.trim() === '') {
        document.getElementById('Error2').textContent = 'Please enter the present address';
        return false;
      }
      if (presentAddress.length > 100) {
          document.getElementById('Error2').textContent = 'Please enter present address that does not exceed 100 characters';
          return false;
        }


      // Validation for Email
      const email = form['email'].value;
      if (email.trim() === '') {
        document.getElementById('Error3').textContent = 'Please enter the email address';
        return false;
      }
      if (!validateEmail(email)) {
        document.getElementById('Error3').textContent = 'Please enter your email address in format: yourname@example.com';
        return false;
      }


      //phone number validation 
      const Phone_no = form['ph_no'].value;
      if (Phone_no.trim() === '') {
          document.getElementById('Error4').textContent = 'Please enter the phone number';
          return false;
      }
      if (!/^\d{10}$/.test(Phone_no)) {
          document.getElementById('Error4').textContent = 'Please enter your phone number in format: eg 9111134456';
          return false;
      }


      // DOB validation
      const Dob = form['dob'].value;
      if (!Dob) {
      document.getElementById('Error5').textContent = 'Please select your date of birth';
      return false;
      }

      //Plans validation
     var plans = document.getElementById('membershipPlanSelect').value;
      if (plans == -1 ) {
        document.getElementById('Error6').textContent = 'Please select a plan!';
        return false;
      }

      //Joinig date validation
      const start_date = form['start_date'].value;
      if (!start_date) {
      document.getElementById('Error7').textContent = 'Please select the start date  ';
      return false;
      }

     //medical validation 
     const medical = form['medical_issues'].value;
      if (medical.trim() === '' || /\d/.test(medical)) {
          document.getElementById('Error8').textContent = 'Please enter medical issue, Note:if no medical issues enter none.';
          return false;
      }
      if (medical.length > 100) {
          document.getElementById('Error8').textContent = 'Medical issue should not exceed 100 characters';
          return false;
        }
      
    // Emergency person name validation 
    const emname = form['em_name'].value;
      if (emname.trim() === '') {
          document.getElementById('Error9').textContent = 'Please enter the emergency person name';
          return false;
      }
      if (emname.length > 50) {
          document.getElementById('Error9').textContent = 'Emergency person Name should not exceed 50 characters';
          return false;
        }
      const containsNumbers = /\d/.test(emname);
      if (containsNumbers) {
          document.getElementById('Error9').textContent = 'Please enter a valid emergency person name';
          return false;
      }
      
       // Emergency person address validation 
       const emaddress = form['em_address'].value;
      if (emaddress.trim() === '' ) {
      document.getElementById('Error10').textContent = 'Please enter the emergency address';
      return false;
      }
      if (emaddress.length > 100) {
          document.getElementById('Error10').textContent = 'Emergency Address should not exceed 100 characters';
          return false;
        }

       // Emergency person phone no. validation 
       const emphone = form['em_ph_no'].value;
      if (emphone.trim() === '' ) {
      document.getElementById('Error11').textContent = 'Please enter the emergency person phone no.';
      return false;
      }
      if (!/^\d{10}$/.test(emphone)) {
          document.getElementById('Error11').textContent = 'Please enter your phone number in format: eg 9111134456 it should contain only numbers';
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
      else{
        displayCard();
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
                    <a class="nav-link" title="Home" id="h" href="http://localhost/gymx/UserSide/userSide.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="c" title="Contact"
                        href="http://localhost/gymx/contact/contact_page/contact.html">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="e" title="Booking"
                        href="http://localhost/gymx/Booking/Booking.php">Booking</a>
                </li>
            </ul>
          </div>
        </nav>
        </div>
    </div>


  <div class="container">
    <section class="container1">
      <header style="text-align: center;">
        <h2>Book Membership</h2>
      </header>
      <form action="http://localhost/gymx/gateway/checkout.php" class="form1" name="myform" method="post" enctype="multipart/form-data">

        <div class="item1">
        <div class="input-box">
          <label>Enrollment Id</label>
          <input type="text" placeholder="Enter id" name="er_no" disabled />
          <p id="Error" class="error-message"></p>
        </div>
        <div class="input-box">
          <label>Client Name</label>
          <input type="text" placeholder="Enter Fullname" name="client_name" . />
          <p id="Error1" class="error-message"></p>
        </div>
      </div>

      <div class="item1">
        <div class="input-box">
          <label>Present Address</label>
          <input type="text" placeholder="Enter Address" name="present_address" />
          <p id="Error2" class="error-message"></p>
        </div>
        
        <div class="input-box">
                    <label>Email</label>
                    <input type="text" placeholder="Enter Email" name="email"/>
                    <p id="Error3" class="error-message"></p>
        </div>
      </div>

      <div class="item1">
        <div class="column">
          <div class="input-box">
            <label>Phone No</label>
            <input type="text" placeholder="Enter Phone Number" name="ph_no" />
            <p id="Error4" class="error-message"></p>
          </div>

          <div class="input-box">
            <label>Date Of Birth</label>
            <input type="date" placeholder="Enter Birth Date" name="dob" id="dob"/>
            <p id="Error5" class="error-message"></p>
          </div>
        </div>
      </div>

      <div class="item1">
        <div class="input-box">
          <label>Plans</label><br>
          <select  id="membershipPlanSelect" name="plans_id" style="border-radius: 5px; width: 345px; height: 54px; color: #707070">
            <option value="-1">(please select your plan)</option>
            <?php
            $conn = mysqli_connect("localhost", "root", "", "gymx") or die("connection failed");

            $sql = "SELECT * FROM plans";
            $result = mysqli_query($conn, $sql) or die("query unsuccessful.");


            while ($row = mysqli_fetch_assoc($result)) {
            ?>
              <option value="<?php echo $row['id'] ?>"><?php echo $row['Plans_details'] ?><?php echo "(" ?><?php echo $row['Amount'] ?><?php echo ")" ?></option>

            <?php } ?>
          </select>
          <p id="Error6" class="error-message"></p>
        </div>
        <input type="hidden" id="selectedPlanId" name="selectedPlanId" value="">

        <input type="hidden" id="selectedPlanDetails" name="selectedPlanDetails" value="">

        <input type="hidden" id="selectedAmount" name="selectedAmount" value="">
        
        

        <div class="input-box">
          <label>Start Date</label>
          <input type="date" placeholder="Enter starting Date" name="start_date" id="date-input"/>
          <p id="Error7" class="error-message"></p>
        </div>
            </div>

            <div class="item1">
        <div class="input-box">
          <label>Medical Issue</label>
          <input type="text" placeholder="Enter medical issues" . name="medical_issues" />
          <p id="Error8" class="error-message"></p>
        </div>
            </div>
        <br>
  
        <header style="margin-top:40px;">
          <h2>Incase of emergency contact person</h2>
        </header>

        <div class="item1">
        <div class="input-box">
          <label>Emergency Person</label>
          <input type="text" placeholder="Enter Name" name="em_name" . />
          <p id="Error9" class="error-message"></p>
        </div>

        <div class="input-box">
          <label>Emergency Person Address</label>
          <input type="text" placeholder="Enter Address" name="em_address" . />
          <p id="Error10" class="error-message"></p>
        </div>
            </div>

            <div class="item1">
        <div class="input-box">
          <label>Emergency Person Phone No</label>
          <input type="text" placeholder="Enter Phone Number" name="em_ph_no" . />
          <p id="Error11" class="error-message"></p>
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

<script>
let card=document.getElementById("card-id");

function displayCard(){
  card.classList.add("display-card");
}
function hideCard(){
  card.classList.remove("display-card");
}

function changeMembershipPlan() {
  let membershipPlanSelect = document.getElementById("membershipPlanSelect");

  if (membershipPlanSelect) {
    membershipPlanSelect.focus();
  }

}

    document.getElementById('membershipPlanSelect').addEventListener('change', function () {
            var selectedOption = this.options[this.selectedIndex];
            document.getElementById('selectedPlanId').value = selectedOption.value;
            document.getElementById('selectedPlanDetails').value = selectedOption.text;
            document.getElementById('selectedAmount').value = selectedOption.text.match(/\(([^)]+)\)/)[1];
        });

        function prepareAndSubmitForm() {
  document.myform.submit();
}

</script>
  <script src="booking.js"></script>
</body>

</html>

<?php
        }
?>