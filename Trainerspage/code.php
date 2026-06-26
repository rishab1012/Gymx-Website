<?php 
$conn= mysqli_connect("localhost","root","","gymx") or die("connection failed");

if(isset($_POST['checking_viewbtn'])){
    $s_id = $_POST['student_id'];
    // echo $return = $s_id;

    $sql= "SELECT * FROM trainers_list where trainer_id = '$s_id' ";
    $result= mysqli_query($conn, $sql);

    if(mysqli_num_rows($result)>0){ 

        foreach($result as $row){
            echo $return = '
                <h5>ID: '.$row['trainer_id'].'</h5>
                <h5>Name: '.$row['trainer_name'].'</h5>
                <h5>gender: '.$row['gender'].'</h5>
                <h5>email: '.$row['trainer_email'].'</h5>
                <h5>phone.no: '.$row['trainer_phone_no'].'</h5>
                <h5>DOB: '.$row['trainer_dob'].'</h5>
                <h5>address: '.$row['trainer_address'].'</h5>
                <h5>joining date: '.$row['trainer_joining_date'].'</h5>
                <h5>salary: '.$row['trainer_salary'].'</h5>
            

            ';

        }

    }
    else{
        echo $return = "<h5>no records found</h5>";
    }
 
}
if(isset($_POST['checking_edit_btn'])){
    $s_id = $_POST['student_id'];
    // echo $return = $s_id;
    $result_array = [];

    $sql= "SELECT trainer_id,trainer_name,trainer_address,trainer_phone_no,trainer_dob,trainer_email,trainer_joining_date,trainer_salary,gender FROM trainers_list 
    where trainer_id = '$s_id' ";
    $result= mysqli_query($conn, $sql);

    if(mysqli_num_rows($result)>0){ 

        foreach($result as $row){
            array_push($result_array, $row);
            header('content-type: application/json');
            echo json_encode($result_array);

        }
    }
    else{
        echo $return = "<h5>no records found</h5>";
    }
 
}

if(isset($_POST['update_student']))
    {
        $trainerid = $_POST['id'];
        $trainername = $_POST['name'];
        $trainergender = $_POST['gender'];
        $trainerphone_no = $_POST['phone_no'];
        $traineremail = $_POST['Email'];
        $trainerdob = $_POST['dob'];
        $traineraddress = $_POST['address'];
        $trainerjoiningdate = $_POST['joining_date'];
        $trainersalary = $_POST['salary'];

        $query = "UPDATE trainers_list 
          SET trainer_id='$trainerid',
              trainer_name='$trainername', 
              gender='$trainergender', 
              trainer_phone_no='$trainerphone_no', 
              trainer_email='$traineremail', 
              trainer_dob='$trainerdob', 
              trainer_address='$traineraddress', 
              trainer_joining_date='$trainerjoiningdate', 
              trainer_salary='$trainersalary'
              WHERE trainer_id='$trainerid'";

        $query_run = mysqli_query($conn, $query);

        header("Location: http://localhost/gymx/Trainerspage/trainers.php");

    }
    if(isset($_POST['delete_member'])){

        $id = $_POST['member_id'];
    
        $query = "DELETE FROm trainers_list WHERE trainer_id = '$id' ";
        $query_run = mysqli_query($conn, $query);
    
        header("Location: http://localhost/gymx/Trainerspage/trainers.php");
    }
?>
