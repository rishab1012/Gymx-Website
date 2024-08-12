<?php
      session_start();

            if(isset($_GET['logout'])) {
              unset($_SESSION['adminusername']);
          }
          ?>
<?php
        if(!isset($_SESSION['adminusername'])){
          echo "<script>
                        window.location.href='http://localhost/gymx/AdminLogin/login.php';
                    </script>";
        }
        else{

  ?>
<?php
$conn = mysqli_connect("localhost", "root", "", "gymx") or die("Connection failed");

$activeMembers = "SELECT COUNT(Enrollment_no) AS activeMembers FROM members_list WHERE M_status = 1";
$inactiveMembers = "SELECT COUNT(*) AS inactiveMembers FROM members_list WHERE M_status = 0";
$totalMembers = "SELECT COUNT(*) AS totalMembers FROM members_list";

$result_active_members = $conn->query($activeMembers);
$result_inactive_members = $conn->query($inactiveMembers);
$result_total_members = $conn->query($totalMembers);

$total_members = $result_total_members->fetch_assoc();
$active_members = $result_active_members->fetch_assoc();
$inactive_members = $result_inactive_members->fetch_assoc();

$conn->close();
?>

<span style="font-family: verdana, geneva, sans-serif;">
  
  <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Dashboard</title>
  <link rel="icon" type="image/x-icon" href="logo.ico">
  <link rel="stylesheet" href="admindashboardstyle.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<style>
  h1{
      position: relative;
      left: 8px;
  }
  body {
    background: #040D12 !important;
  }
  .logo img{
  width: 70px;
  height: 70px;
  border-radius: 25%;
  background-color: #fcf8f8;
}
  #membersPieChart {
    position: relative;
    right: 354px;
    top: 74;
  }
  .alert {
    width: 100%;
    height: 40px;
    border-radius: 10px;
    background-color: wheat;
    padding:  10px 10px 10px 10px;
  }
  .nav-item:hover {
      cursor: pointer;
    }
    a{
      padding: 1px;
    }

    .chart-container{
      max-width: 100%;
      position: relative;
      left: 110px;
    }
    nav{
      width: 34em;
    }

    .inactive {
      position: relative;
      top: 18em;
      right: 24em;
      background: linear-gradient(90deg, rgba(148,18,25,1) 0%, rgba(134,31,31,1) 35%, rgba(85,15,15,1) 100%);
      
    }
    .inactive {
    /* box-shadow: 0 4px 8px; Add a shadow effect */
    overflow-y: auto; /* Enable vertical scrolling */
    max-height: 370px; /* Set the maximum height of the box */
    border-radius: 5px;
    box-shadow: 0 0 15px rgba(222, 197, 197, 0.1);
  }

  table {
    border-collapse: collapse;
    border-spacing: 0;
  }

  th, td {
    width: 300px;
    height: 66px;
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
    color: #fff;

  }

  th {
    background: linear-gradient(90deg, rgba(148,18,25,1) 0%, rgba(134,31,31,1) 35%, rgba(85,15,15,1) 100%);
    position:static;
  }

  .scrollbar {
    overflow-y: auto;
  }

  .scrollbar::-webkit-scrollbar {
    width: 8px;
  }

  .scrollbar::-webkit-scrollbar-thumb {
    background-color: rgba(0, 0, 0, 0.2);
    border-radius: 10px;
  }

  .scrollbar::-webkit-scrollbar-track {
    background-color: rgba(0, 0, 0, 0.1);
  }
</style>
<body>
  <div class="container">
    <nav>
      <ul>
        <li>
          <a href="#" class="logo">
            <img src="./images/logo.png" alt="">
            <span class="nav-item">DashBoard</span>
          </a>
        </li>
        <li>
          <a title="Home" href="http://localhost/gymx/dashboard/admindashboard.php">
            <i class="fas fa-home"></i>
            <span class="nav-item">Home</span>
          </a>
        </li>
        <li>
          <a title="Members " href="http://localhost/gymx/Members/members.php">
            <i class="fas fa-users"></i>
            <span class="nav-item">Member Management</span>
          </a>
        </li>
        <li>
          <a title="Trainers" href="http://localhost/gymx/Trainerspage/trainers.php">
            <i class="fas fa-user"></i>
            <span class="nav-item">Trainer Management</span>
          </a>
        </li>
        <li>
          <a title="Booking" href="http://localhost/gymx/Admin side booking page/Booking.php">
            <i class="fas fa-book"></i>
            <span class="nav-item">Book Membership</span>
          </a>
        </li>
        <li>
          <a title="Plans" href="http://localhost/gymx/plans/plansDetails.php">
            <i class="fas fa-list"></i>
            <span class="nav-item">Plan Management</span>
          </a>
        </li>
        <li>
          <a href="?logout=1" class="logout">
            <i class="fas fa-sign-out-alt"></i>
            <span class="nav-item">Log out</span>
          </a>
        </li>
      </ul>
    </nav>
    <section class="main">
      <div class="main-top">
        <h1>Member Information</h1>
      </div>
      <?php 
        if(isset($_SESSION['status']) && $_SESSION != ''){
          ?>
          <div class="alert custom-alert " role="alert">
            <strong>Data</strong> <?php echo $_SESSION['status']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
      <?php 
          unset($_SESSION['status']);
        }
      ?>
      <div class="main-skills">
        <div class="card">
          <h3>Active Members</h3>
          <h2><?php echo $active_members['activeMembers'];?></h2>
        </div>
        <div class="card">
          <h3>Non-Active Members</h3>
          <h2><?php echo $inactive_members['inactiveMembers'];?></h2>
        </div>
        <div class="card">
          <h3>Total Members</h3>
          <h2><?php echo $total_members['totalMembers'];?></h2>
        </div>
      </div>
      <div class="chart-container">
        <canvas id="membersPieChart" width="400" height="400"></canvas>
      </div>
    </section>
    <div class="inactive">
  <table>
    <thead>
      <tr>
        <th>Id</th>
        <th>inactive members</th>
      </tr>
    </thead>
    <?php
    include 'config.php';
    $stmt = $connection->prepare("SELECT * FROM members_list WHERE M_status = 0");
    $stmt->execute();
    $result = $stmt->get_result();

    echo "<tbody class='scrollbar'>"; // Add a tbody with class 'scrollbar' for styling

    while ($row = $result->fetch_assoc()) {
      echo "<tr>
              <td class=\"stud_id\">" . $row["Enrollment_no"] . "</td>
              <td>" . $row["Client_name"] . "</td>
            </tr>";
    }
    echo "</tbody>"; // Close the tbody

    $connection->close();
    ?>

  </table>
</div>
  </div>

  <div></div>

  <script>
    var totalMembersCount = <?php echo $total_members['totalMembers'];?>;
    var activeMembersCount = <?php echo $active_members['activeMembers'];?>;
    var inactiveMembersCount = <?php echo $inactive_members['inactiveMembers'];?>;

    var ctx = document.getElementById('membersPieChart').getContext('2d');
    var membersPieChart = new Chart(ctx, {
      type: 'pie',
      data: {
        labels: ['Active Members', 'Non-Active Members'],
        datasets: [{
          data: [activeMembersCount, inactiveMembersCount],
          backgroundColor: ['rgb(148,18,25)', '#286a2d'],
        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            position: 'bottom', // Set legend position to bottom
          },
        },
      },
    });
  </script>

  

</body>
</html>

<?php
  }
?>