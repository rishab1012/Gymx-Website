<?php 
include 'config.php';

if(isset($_POST['query'])){
    $search=$_POST['query'];
    $stmt=$connection->prepare("SELECT * from members_list where Client_name like CONCAT('%',?,'%')");
    $stmt->bind_param("s",$search);
}
else{
    $stmt=$connection->prepare("SELECT * from members_list");
}
$stmt->execute();
$result=$stmt->get_result();

if ($result->num_rows>0){
    echo "<thead>
    <tr>
        <th>Member ID</th>
        <th>Member Name</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>";
    while($row=$result->fetch_assoc()){
        $status = $row["M_status"];
        $statusClass = ($status == 1) ? 'active' : 'inactive';
        $isChecked = ($status == 1) ? 'checked' : '';

        echo "<tr>
        <td class=\"stud_id\">" . $row["Enrollment_no"] . "</td>
        <td>" . $row["Client_name"] . "</td>
        <td>
          <label class=\"switch\">
            <input type=\"checkbox\" {$isChecked} data-toggle=\"toggle\" data-on=\"Active\" data-off=\"Inactive\">
            <span class=\"slider {$statusClass}\"></span>
          </label>
          <button class=\"notify-button\" data-membername=\"" . $row["Client_name"] . "\" data-phone=\"" . $row["phone_no"] . "\">Notify</button>
        </td>
        <td>
        <button type=\"button\" class=\"btn btn-primary view_btn\">View</button>
        <button type=\"button\" class=\"btn  btn-secondary  edit_btn\">Edit</button>
        <button type=\"button\" class=\"btn  custom-btn btn-danger delete_btn\">Delete</button>
        </td>
      </tr>";
      
  }
  
}
else{
    echo "<h3>No records found!<h3>";
}
?>

<!-- Custom CSS -->
<link rel="stylesheet" href="UserSide.css">
<link rel="stylesheet" href="members.css">
<link rel="stylesheet" href="css/member.css">

<!-- Remix Icon -->

<!-- Your custom JavaScript file -->
<script src="members.js"></script>

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

    /* .custom-btn{
        background-color: #cac7ff;
        border: #cac7ff;

      } */
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

      /* .custom-alert{
        background-color: #707070;
        border: 1px solid #707070;
        color: #fff;
      } */

      #memberName{
        color: #040d12 !important;
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

<?php 

if(isset($_SESSION['status']) && $_SESSION != ''){
  ?>
  <div class="alert custom-alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Data</strong> <?php echo $_SESSION['status']; ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>

<?php 
  
  unset($_SESSION['status']);
}
?>


  <!-- Member-View-Modal -->
  <div class="modal fade " id="studentviewmodel" tabindex="-1" role="dialog" aria-labelledby="studentviewmodel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content custom-modal-content">
        <div class="modal-header">
          <img class="logo" src="images/logo.png" alt="">
          <h5 class="modal-title" id="studentviewmodel">Member Information</h5>
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
  <!-- Member-View-Modal -->

  <!-- member-edit-modal -->
  <div class="modal fade" id="editStudentModal" tabindex="-1" aria-labelledby="editStudentModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content custom-modal-content">
        <div class="modal-header">
          <img src="images/logo.png" class="logo" alt="">
          <h1 class="modal-title fs-5" id="editStudentModal">Edit Member Information</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="code.php" method="POST">
            <div class="mb-3">
              <label for="" class="form-label">Id</label>
              <input type="number" class="form-control" id="id" name="id" aria-describedby="">
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Name</label>
              <input type="text" class="form-control" id="name" name="name" aria-describedby="">
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Address</label>
              <input type="text" class="form-control" id="address" name="address" aria-describedby="">
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Phone No</label>
              <input type="number" class="form-control" id="phone_no" name="phone_no" aria-describedby="">
            </div>
            <div class="mb-3">
              <label for="" class="form-label">DOB</label>
              <input type="date" class="form-control" id="dob" name="dob" aria-describedby="">
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Medical Issues</label>
              <input type="text" class="form-control" id="medical_issues" name="medical_issues">
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Emergency Person</label>
              <input type="text" class="form-control" id="Ename" name="Ename">
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Emergency Address</label>
              <input type="text" class="form-control" id="Eaddress" name="Eaddress">
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Emergency Phone No</label>
              <input type="number" class="form-control" id="Ephone_no" name="Ephone_no">
            </div>
            <!-- <div class="mb-3">
              <label for="" class="form-label">Status</label>
              <input type="boolean" class="form-control" id="status" name="status">
            </div> -->
            <div class="mb-3">
              <label for="" class="form-label">Start date</label>
              <input type="date" class="form-control" id="start_date" name="start_date">
            </div>
            <div class="mb-3">
            <label>Plans</label><br>
          <select id="plans_id" name="plans_id" style="border-radius: 5px; width: 450px; height: 54px; color: #707070">
            <option value="-1">(please select your plan)</option>
            <?php
            $conn = mysqli_connect("localhost", "root", "", "gymx") or die("connection failed");

            $sql = "SELECT * FROM  plans";
            $result = mysqli_query($conn, $sql) or die("query unsuccessful.");


            while ($row = mysqli_fetch_assoc($result)) {
            ?>
              <option value="<?php echo $row['id'] ?>"><?php echo $row['Plans_details'] ?></option>

            <?php } ?>
          </select>
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
          <h5 class="modal-title" id="studentdeletemodel">Delete Member Information</h5> 
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

  <!-- Notify Modal -->
  <div class="modal fade" id="notifyModal" tabindex="-1" role="dialog" aria-labelledby="notifyModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="notifyModalLabel">Send Notification</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>Do you want to send a notification to <strong id="memberName"></strong>?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-primary" onclick="sendNotification()">Yes</button>
        </div>
      </div>
    </div>
  </div>

  <div id="response"></div>

  <script>
    var currentPhone;

    $(".notify-button").click(function() {
      var memberName = $(this).data("membername");
      var phone = $(this).data("phone");

      $("#memberName").text(memberName);
      currentPhone = phone;
      currentMember = memberName;
      $("#notifyModal").modal("show");
    });

    function sendNotification() {
      var phone = currentPhone;
      var member = currentMember;
      $("#notifyModal").modal("hide");
      sendWhatsApp(phone, member);
    }

    function sendWhatsApp(phone, member) { 
      var apiSecret = "28e15e6cefbf7fba604b5ad50e79938ee7db5a6a";
      var account = "17074653670e230b1a582d76526b7ad7fc62ae937d65c5da976c9b3";
      var phone = "+91" + phone;
      var message = `Hi ${member}! 🌟 
        Renew today and join us on a fitness journey at the gym. 🏋‍♂ Embrace a fitter, happier you with exclusive access to our wellness programs and community support.

        Don't miss out on the opportunity to make every day healthier and more energetic! 🚀 Your commitment to renewal is the first step towards a revitalized you.

        Ready to conquer fitness goals together? 🤝 Renew now!

        Best regards,
        GYMX Fitness Club`;

      var params = new URLSearchParams({
        "secret": apiSecret,
        "account": account,
        "recipient": phone,
        "type": "text",
        "message": message
      });

      fetch("https://www.cloud.smschef.com/api/send/whatsapp?" + params, {
          method: 'POST',
        })
        .then(response => response.json())
        .then(result => {
          alert(document.getElementById("response").innerHTML = "Response: " + JSON.stringify(result));
        })
        .catch(error => {
          alert(console.error('Error:', error));
        });
    }
    function attachEventListeners(){
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
        $('#id').val(value['Enrollment_no']);
        $('#name').val(value['Client_name']);
        $('#address').val(value['Present_address']);
        $('#phone_no').val(value['phone_no']);
        $('#dob').val(value['DOB']);
        $('#medical_issues').val(value['Medical_issues']);
        $('#Ename').val(value['Em_name']);
        $('#Eaddress').val(value['Em_address']);
        $('#Ephone_no').val(value['Em_phone_no']);
        $('#status').val(value['M_status']);
        $('#start_date').val(value['start_date']);
        $('#plans_id').val(value['plan_id']);

      });
      $('#editStudentModal').modal('show');
    }
  });

});

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
});
    }
    $(document).ready(function() {
  attachEventListeners();
});
  </script>
<?php
echo "</tbody>
    </table>";
    ?>