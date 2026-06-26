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
  <title>Plans</title>
  <link rel="icon" type="image/x-icon" href="logo.ico">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoI..." />
  <!-- CSS -->
  <link rel="stylesheet" href="UserSide.css" />
  <!-- stylesheet -->
  <link rel="stylesheet" href="members.css" />

  <!-- remix icon -->
  <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">

  <!-- bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>



  <link rel="stylesheet" href="css/member.css" />

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

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

      .custom-btn:hover {
        background-color: #820300;

      }

      .custom-btn {
        background-color: #B80000;
        border: 1px solid #B80000;
      }
      

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

      #memberName{
        color: #040d12 !important;
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
        <a class="navbar-brand" href="#"><img class="logo" src="images/logo.png" alt="logo-img" /></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">

            <button class="plus-button" id="plus-button" title="Add plan"><a href="http://localhost/gymx/plans/plans.php">+</a></button>
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
  <div id="searchresult"></div>
  <div class="container-fluid">
    <h1>Plans</h1>
    <table id="member-data">
      <thead>
        <tr>
          <th>Plan Id</th>
          <th>Plan Duration</th>
          <th>Plan Amount (Rs.)</th>
        </tr>
      </thead>
      <tbody>
        <?php
        include 'config.php';
        $stmt = $connection->prepare("SELECT * from plans");
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {

          echo "<tr>
              <td class=\"stud_id\">" . $row["id"] . "</td>
              <td>" . $row["Plans_details"] . "</td>
              <td>" . $row["Amount"] . "</td>
              <td>
              <button type=\"button\" class=\"btn  btn-secondary  edit_btn\">Edit</button>
              <button type=\"button\" class=\"btn  custom-btn btn-danger delete_btn\">Delete</button>
              </td>
            </tr>";
        }
        $connection->close();
        ?>
      </tbody>
    </table>
  </div>
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


  <!-- member-edit-modal -->
  <div class="modal fade" id="editStudentModal" tabindex="-1" aria-labelledby="editStudentModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content custom-modal-content">
        <div class="modal-header">
          <img src="images/logo.png" class="logo" alt="">
          <h1 class="modal-title fs-5" id="editStudentModal">Edit Plans</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="code.php" method="POST">
          <div class="mb-3">
              <label for="" class="form-label" hidden>Plan id</label>
              <input type="text" class="form-control" id="plan_id" name="plan_id" aria-describedby="" hidden>
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Plan Name</label>
              <input type="text" class="form-control" id="plan_name" name="plan_name" aria-describedby="">
            </div>
            <div class="mb-3">
              <label for="" class="form-label">plan Amount</label>
              <input type="text" class="form-control" id="amount" name="amount" aria-describedby="">
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
          <h5 class="modal-title" id="studentdeletemodel">Delete Plans</h5> 
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

  <div id="response"></div>


  <!-- JS -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script src="members.js"></script>

  <script>
    $(document).ready(function() {

      $('.delete_btn').click(function(e) {
        e.preventDefault();

        var stud_id = $(this).closest('tr').find('.stud_id').text();
        // console.log(stud_id);
        $('#delete_id').val(stud_id);
        $('#studentdeletemodel').modal('show');

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
              $('#plan_id').val(value['id']);
              $('#plan_name').val(value['Plans_details']);
              $('#amount').val(value['Amount']);

            });
            $('#editStudentModal').modal('show');
          }
        });

      });

    });
  </script>
</body>

</html>
<?php
        }
?>