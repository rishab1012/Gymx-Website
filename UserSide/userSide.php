<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Bootstrap -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoI..."
    />

    <!-- remixicon -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="css/UserSide.css" />

    

    <title>User Page</title>
    <link rel="icon" type="image/x-icon" href="logo.ico">


  </head>
  <style>
    .custom-d-block{
      width: 500px;
      height: 500px;
    }
    .profile-pic {
     margin-left: 90px;
  }
    .navbar-nav .dropdown .dropdown-toggle::after {
    display: none;
}
#h,#c,#e{
  max-width: 90px;
    position: relative;
    left: 40%;
}

#btnj{
  position: relative;
    left: 1030px;
    background-color: #B80000;
    border: none;
}

#btnj:hover{
  background-color: #820300;
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

.profile-pic{
  max-width: 50px;
  
}

.profile-pic img {
      width: 40px; 
      height: 40px;
      border-radius: 50%; 
    }
    

    .card{
    padding: 1.5em .5em .5em;
    text-align: left;
    border-radius: 0.5em;
    box-shadow: 0 0 15px rgba(227, 197, 197, 0.1);;
    background: rgb(0,0,0);
    background: linear-gradient(40deg, rgba(0,0,0,1) 30%, rgba(121,9,9,1) 75%);
    color: white;
}
.card-text{
    color: white !important; 
    right: 30px;
    background: none;
}

  </style>
  <body>
     <div class="container-fluid">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="#">
            <img class="logo" src="images/logo.png" alt="" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto"> <!-- Use mr-auto to move Home, Contact, and Join Now to the left -->
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
            <?php
            session_start();

            if(isset($_GET['logout'])) {
              unset($_SESSION['username']);
          }
            ?>
            <?php

              if(!isset($_SESSION['username'])) {
              ?>
            <button type="button" class="btn btn-primary" id="btnj">
                Join Now
            </button>
            </ul>
            <?php
            }
            else{
              $username=$_SESSION['username'];
            ?>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 profile-menu">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="profile-pic">
                            <img src="https://i.postimg.cc/x1d5bwR4/blank-profile-picture-973460-1920.png" alt="Profile Picture">
                        </div>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="?logout=1"><i class="fas fa-sign-out-alt fa-fw"></i> Log Out</a></li>
                    </ul>
                </li>
            </ul>
            <h6 style="color:white";><?php echo $username; ?></h6>

            <?php
    }
    ?>
        </div>
    </nav>
</div>

      <div class="row">
        <div class="col-lg-12 col-md-10 col-sm-8">
          <div class="section_container header_container">
            <div class="header_content">
              <span class="bg_blur"></span>
              <span class="bg_blur header_blur"></span>

              <h1><span>MAKE </span>YOUR BODY SHAPE</h1>
              <p>
              Unlock your true potential, sculpt your strength, and redefine your limits with GymX. Elevate your fitness journey, where dedication meets transformation, and every drop of sweat tells a story of perseverance. 
              Embrace the challenge, embrace the change.
              </p>
              <!-- <button type="button" class="btn btn-primary" id="btn">
                Get Started
              </button> -->
            </div>
            <div class="header_image">
              <img src="" alt="" />
            </div>
          </div>
        </div>
      </div>

      <div class="pricing">
        <h2>Explore Our Pricing</h2>
      </div>

      <?php
// Database configuration
$host = "localhost"; // Change this to your database host
$username = "root"; // Change this to your database username
$password = ""; // Change this to your database password
$database = "gymx"; // Change this to your database name

// Create a database connection
$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM plans";
$result = $conn->query($sql);

// Fetch data and store it in the $plans array
$plans = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $plans[] = $row;
    }
}

// Close the database connection
$conn->close();
?>

<!-- Your HTML and PHP code for displaying plans -->
<div class="row">
    <?php foreach ($plans as $plan): ?>
        <div class="col-lg-3 col-md-6 col-sm-12" style="padding: 16px">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title"><?php echo $plan['Plans_details']; ?></h1>
                    
                        <p class="card-text"><?php echo "Rs " ?><?php echo $plan['Amount']; ?><?php echo "/-" ?></p>
                        <h4 class="card-text">Get started on your fitness journey today!</h4>
                        <p class="card-text"></p>
                    
                    <a href="http://localhost/gymx/Booking/Booking.php" class="btn btn-primary" id="btn">Book Membership</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>


      <div class="Carousel-gym">
        <h2>Explore Our Gym</h2>
      </div>

      <div class="row">
    <!-- carousel -->
    <div class="container">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" style="box-shadow: 0 0 15px rgba(227, 197, 197, 0.1)">
            <div class="carousel-inner">
                <!-- First slide -->
                <div class="carousel-item active">
                    <img src="images/IMG_5069.JPG" class="d-block w-100" alt="First Slide" style="width: 700px; height: 700px;">
                    <div class="carousel-caption d-none d-md-block">
                        <h5></h5>
                        <p></p>
                    </div>
                </div>
                <!-- Second slide -->
              <div class="carousel-item">
                <img
                  src="images/IMG_4883.JPG"
                  class="d-block w-100"
                  alt="Second Slide"
                  style="width: 700px; height: 700px;"
                />
                <div class="carousel-caption d-none d-md-block">
                  <h5></h5>
                  <p>
                    
                  </p>
                </div>
              </div>

              <!-- Second slide -->
              <div class="carousel-item">
                <img
                  src="images/IMG_4885.JPG"
                  class="d-block w-100"
                  alt="Second Slide"
                  style="width: 700px; height: 700px;"
                />
                <div class="carousel-caption d-none d-md-block">
                  <h5></h5>
                  <p>
                    
                  </p>
                </div>
              </div>

              <!-- Second slide -->
              <div class="carousel-item">
                <img
                  src="images/IMG_4903.JPG"
                  class="d-block w-100"
                  alt="Second Slide"
                  style="width: 700px; height: 700px;"
                />
                <div class="carousel-caption d-none d-md-block">
                  <h5></h5>
                  <p>
                    
                  </p>
                </div>
              </div>

              <!-- Second slide -->
              <div class="carousel-item">
                <img
                  src="images/IMG_4911.JPG"
                  class="d-block w-100"
                  alt="Second Slide"
                  style="width: 700px; height: 700px;"
                />
                <div class="carousel-caption d-none d-md-block">
                  <h5></h5>
                  <p>
                    
                  </p>
                </div>
              </div>

              <!-- Second slide -->
              <div class="carousel-item">
                <img
                  src="images/IMG_4918.JPG"
                  class="d-block w-100"
                  alt="Second Slide"
                  style="width: 700px; height: 700px;"
                />
                <div class="carousel-caption d-none d-md-block">
                  <h5></h5>
                  <p>
                    
                  </p>
                </div>
              </div>

              <!-- Second slide -->
              <div class="carousel-item">
                <img
                  src="images/IMG_4925.JPG"
                  class="d-block w-100"
                  alt="Second Slide"
                  style="width: 700px; height: 700px;"
                />
                <div class="carousel-caption d-none d-md-block">
                  <h5></h5>
                  <p>
                    
                  </p>
                </div>
              </div>
              <!-- Second slide -->
              <div class="carousel-item">
                <img
                  src="images/IMG_4938.JPG"
                  class="d-block w-100"
                  alt="Second Slide"
                  style="width: 700px; height: 700px;"
                />
                <div class="carousel-caption d-none d-md-block">
                  <h5></h5>
                  <p>
                    
                  </p>
                </div>
              </div>
              <!-- Second slide -->
              <div class="carousel-item">
                <img
                  src="images/IMG_4957.JPG"
                  class="d-block w-100"
                  alt="Second Slide"
                  style="width: 700px; height: 700px;"
                />
                <div class="carousel-caption d-none d-md-block">
                  <h5></h5>
                  <p>
                    
                  </p>
                </div>
              </div>
              <!-- Second slide -->
              <div class="carousel-item">
                <img
                  src="images/IMG_5056.JPG"
                  class="d-block w-100"
                  alt="Second Slide"
                  style="width: 700px; height: 700px;"
                />
                <div class="carousel-caption d-none d-md-block">
                  <h5></h5>
                  <p>
                    
                  </p>
                </div>
              </div>
              <!-- Second slide -->
              <div class="carousel-item">
                <img
                  src="images/IMG_5081.JPG"
                  class="d-block w-100"
                  alt="Second Slide"
                  style="width: 700px; height: 700px;"
                />
                <div class="carousel-caption d-none d-md-block">
                  <h5></h5>
                  <p>
                    
                  </p>
                </div>
              </div>
              <!-- Second slide -->
              <div class="carousel-item">
                <img
                  src="images/IMG_5108.JPG"
                  class="d-block w-100"
                  alt="Second Slide"
                  style="width: 700px; height: 700px;"
                />
                <div class="carousel-caption d-none d-md-block">
                  <h5></h5>
                  <p>
                    
                  </p>
                </div>
              </div>
              <!-- Second slide -->
              <div class="carousel-item">
                <img
                  src="images/IMG_5129.JPG"
                  class="d-block w-100"
                  alt="Second Slide"
                  style="width: 700px; height: 700px;"
                />
                <div class="carousel-caption d-none d-md-block">
                  <h5></h5>
                  <p>
                    
                  </p>
                </div>
              </div>
              <!-- Second slide -->
              <div class="carousel-item">
                <img
                  src="images/IMG_5140.JPG"
                  class="d-block w-100"
                  alt="Second Slide"
                  style="width: 700px; height: 700px;"
                />
                <div class="carousel-caption d-none d-md-block">
                  <h5></h5>
                  <p>
                    
                  </p>
                </div>
              </div>
            </div>
            <!-- Carousel controls -->
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </a>
        </div>
    </div>
</div>



      <section class="section_container join_container">
        <h2 class="section_header">
          WHY JOIN US?
        </h2>
        <p class="section_subheader">
          Our diverse membership base create a friendly and supportive
          atmosphere, where you can make friends and stay motivated.
        </p>
        <div class="join_image">
          <img src="images/IMG_5042.JPG" alt="img-1">
          <div class="join_grid">
            <div class="join_card">
              <span><i class="ri-user-star-fill"></i></span>
              <div class="join_card_content">
                <h4>Expert Trainers</h4>
                <p>Unlock your potential with our Expert Trainers.</p>
              </div>
            </div>
            <div class="join_card">
              <span><i class="ri-user-heart-line"></i></i></span>
              <div class="join_card_content">
                <h4>Healthy Enviroment</h4>
                <p>Elevate Your fitness with Healthy Enviroment.</p>
              </div>
            </div>
            <div class="join_card">
              <span><i class="ri-building-line"></i></span>
              <div class="join_card_content">
                <h4>Good Management</h4>
                <p>Supportive Management, for your fitness success.</p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <footer class="section_container footer_container">
        <span class="bg_blur"></span>
        <span class="bg_blur"></span>
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

    <!-- JS -->
    <!-- <script src="userSide.js"></script> -->
    <script>
      document.getElementById("btn").onclick = function() {
    window.location.href = "http://localhost/gymx/logandreg/registration2.php";
};

    </script>
    <script>
      document.getElementById("btnj").onclick = function() {
    window.location.href = "http://localhost/gymx/logandreg/registration2.php";
};

    </script>

    
  </body>
</html>
