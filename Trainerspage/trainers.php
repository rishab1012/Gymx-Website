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
<html>
<head>
  <title>Trainers</title>
  <link rel="icon" type="image/x-icon" href="logo.ico">
  <!-- remixicon -->
  <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/Trainers.css">

  <link rel="stylesheet" href="navbar.css">

  <link rel="stylesheet" href="footer/UserSide.css">


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


  <script src="trainers.js"></script>

  <style>
    .custom-modal-content {
      background-color: #040d12;
      color: white;
      font-family: 'Poppins', sans-serif;
    }

    .custom-modal-content .modal-title {
      position: relative;
      left: 90px;
      font-family: 'Poppins', sans-serif;
    }
    .navbar{
        background-color: #040D12;
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

      th{
        text-align: center;
      }
      td{
        text-align: center;
      }
      td {
      padding: 8px;
      
      /* text-align: center; */
      border-bottom: 1px solid #313131 !important;
      font-size: 22px;
      font-family: 'Poppins', sans-serif;
      color: white;
    }

    tr:hover {
      background-color: #313131 !important;
    }

    .custom-btn:hover {
        background-color: #820300;

      }

      .custom-btn {
        background-color: #B80000;
        border: 1px solid #B80000;
      }
      .plus-button {
        width: 40px;
        height: 40px;
        background-color: #B80000; /* Blue background color */
        color: #ffffff; /* White text color */
        font-size: 24px;
        border: none;
        border-radius: 50%; /* Make it round */
        cursor: pointer;
        transition: background-color 0.3s; 
      }

      .plus-button:hover {
        background-color: #820300; /* Darker blue on hover */
      }

      .plus-button a{
        color: #ffffff;
        text-decoration: none; 
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
</head>
<body>
<div class="container-fluid" id="container">
      <div class="row">

        <!-- header -->
        <!-- Nav Bar -->
        <nav class="navbar navbar-expand-lg navbar-dark">
          <a class="navbar-brand" href="#"
            ><img class="logo" src="images/logo.png" alt="logo-img"
          /></a>
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
            <button class="plus-button" id="plus-button" title="add Trainer"><a href="http://localhost/gymx/Trainerspage/TrainerBooking.php">+</a></button>
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
            <!-- <button type="button" class="btn btn-primary" id="btn">
              Join Now
            </button> -->
          </div>
        </nav>
        </div>
    </div>

  <div class="container-fluid">

  <h1>Trainers</h1>
  <table>
    <thead>
    <tr>
      <th>Trainer ID</th>
      <th> Trainer Name</th>
      <th>Action</th>
    </tr>
    </thead>
    <tbody>
  

        <?php
        include 'config.php';
        $stmt = $connection->prepare("SELECT * from trainers_list");
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
          echo "<tr>
              <td class=\"stud_id\">" . $row["trainer_id"] . "</td>
              <td>" . $row["trainer_name"] . "</td>
              <td>
              <button type=\"button\" class=\"btn btn-primary view_btn\">View</button>
              <button type=\"button\" class=\"btn btn-secondary edit_btn\">Edit</button>
              <button type=\"button\" class=\"btn custom-btn btn-danger delete_btn\">Delete</button>
              </td>
            </tr>";
        }
        $connection->close();
        ?>
    </tbody>
  </table>

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
  <!-- Trainer-View-Modal -->
  <div class="modal fade " id="studentviewmodel" tabindex="-1" role="dialog" aria-labelledby="studentviewmodel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content custom-modal-content">
        <div class="modal-header">
          <img class="logo" src="images/logo.png" alt="">
          <h5 class="modal-title" id="studentviewmodel">Trainers Information</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="student_viewing_data">

          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <!-- trainer-View-Modal -->
  <!-- member-edit-modal -->
  <div class="modal fade" id="editStudentModal" tabindex="-1" aria-labelledby="editStudentModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content custom-modal-content">
        <div class="modal-header">
          <img src="images/logo.png" class="logo" alt="">
          <h1 class="modal-title fs-5" id="editStudentModal">Edit trainer Information</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="code.php" method="POST">
          <div class="mb-3">
              <label for="" class="form-label" hidden>id</label>
              <input type="text" class="form-control" id="id" name="id" aria-describedby="" hidden>
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Name</label>
              <input type="text" class="form-control" id="name" name="name" aria-describedby="" required>
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Address</label>
              <input type="text" class="form-control" id="address" name="address" aria-describedby="" required> 
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Phone No</label>
              <input type="number" class="form-control" id="phone_no" name="phone_no" aria-describedby="" required>
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Gender</label>
              <input type="text" class="form-control" id="gender" name="gender" aria-describedby="" required>
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Joining Date</label>
              <input type="date" class="form-control" id="joining_date" name="joining_date" required >
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Salary</label>
              <input type="text" class="form-control" id="salary" name="salary" required>
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Email</label>
              <input type="text" class="form-control" id="Email" name="Email" required>
            </div>
            <div class="mb-3">
              <label for="" class="form-label">DOB</label>
              <input type="date" class="form-control" id="dob" name="dob" required>
            </div>
            <div class="mb-3">
            
          
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" name="update_student">Save changes</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- member-edit-modal -->

  <!-- member delete-modal -->
  <div class="modal fade " id="studentdeletemodel" tabindex="-1" role="dialog" aria-labelledby="studentdeletemodel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content custom-modal-content">
        <div class="modal-header">
          <img class="logo" src="images/logo.png" alt="">
          <h5 class="modal-title" id="studentdeletemodel">Delete trainer Information</h5> 
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="code.php" method="POST">
          <div class="modal-body">
            <input type="hidden" name="member_id" id="delete_id">
            <h4>Are you sure, you want delete this data?</h4>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" name="delete_member" class="btn btn-danger" data-bs-dismiss="modal">Delete</button>
          </div>
        </form>
    </div>
  </div>
  </div>
  <!-- member delete-modal -->


  <!-- JS -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script src=".js"></script>

  <script>
    $(document).ready(function() {

      $('.view_btn').click(function(e) {
        e.preventDefault();

        var stud_id = $(this).closest('tr').find('.stud_id').text();
        // console.log(stud_id);

        $.ajax({
          type: "POST",
          url: "code.php",
          data: {
            'checking_viewbtn': true,
            'student_id': stud_id,
          },
          success: function(response) {
            // console.log(response);
            $('.student_viewing_data').html(response);
            $('#studentviewmodel').modal('show');
          }
        })

      });
      $('.edit_btn').click(function(e) {
        e.preventDefault();

        var stud_id = $(this).closest('tr').find('.stud_id').text();
        // console.log(stud_id);

        $.ajax({
          type: "POST",
          url: "code.php",
          data: {
            'checking_edit_btn': true,
            'student_id': stud_id,
          },
          success: function(response) {
            // console.log(response);
            $.each(response, function(key, value) {
              // console.log(value['Client_name'])
              $('#id').val(value['trainer_id']);
              $('#name').val(value['trainer_name']);
              $('#address').val(value['trainer_address']);
              $('#phone_no').val(value['trainer_phone_no']);
              $('#gender').val(value['gender']);
              $('#Email').val(value['trainer_email']);
              $('#dob').val(value['trainer_dob']);
              $('#joining_date').val(value['trainer_joining_date']);
              $('#salary').val(value['trainer_salary']);

            });
            $('#editStudentModal').modal('show');
          }
        });

      });

      $('.delete_btn').click(function(e) {
        e.preventDefault();

        var stud_id = $(this).closest('tr').find('.stud_id').text();
        // console.log(stud_id);
        $('#delete_id').val(stud_id);
        $('#studentdeletemodel').modal('show');

      });
    });
  </script>


  </div>
  <script>var today = new Date();
var todayISOString = new Date("1980-01-01").toISOString().split('T')[0];
document.getElementById("dob").setAttribute("min", todayISOString);


var today = new Date();
var todayISOString = new Date("2000-01-01").toISOString().split('T')[0];
document.getElementById("dob").setAttribute("max", todayISOString);

var today = new Date();
var todayISOString = new Date("2023-01-01").toISOString().split('T')[0];
document.getElementById("joining_date").setAttribute("min", todayISOString);


var today = new Date();
var todayISOString = new Date("2024-03-26").toISOString().split('T')[0];
document.getElementById("joining_date").setAttribute("max", todayISOString);</script>
</body>
</html>
<?php
        }
?>