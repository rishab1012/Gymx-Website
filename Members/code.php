<?php 
$conn= mysqli_connect("localhost","root","","gymx") or die("connection failed");

if(isset($_POST['checking_viewbtn'])){
    $s_id = $_POST['student_id'];
    // echo $return = $s_id;

    $sql= "SELECT Enrollment_no,Client_name,Present_address,phone_no,DOB,Medical_issues,Em_name,Em_address,Em_phone_no,
    M_status,start_date,plan_id,plans.Plans_details FROM members_list INNER JOIN plans ON members_list.plan_id = plans.id
    where Enrollment_no = '$s_id' ";
    $result= mysqli_query($conn, $sql);

    if(mysqli_num_rows($result)>0){ 

        foreach($result as $row){
            echo $return = '
                <h5>ID: '.$row['Enrollment_no'].'</h5>
                <h5>Name: '.$row['Client_name'].'</h5>
                <h5>address: '.$row['Present_address'].'</h5>
                <h5>Phone No: '.$row['phone_no'].'</h5>
                <h5>DOB: '.$row['DOB'].'</h5>
                <h5>Medical Issues: '.$row['Medical_issues'].'</h5>
                <h5>Emergency person: '.$row['Em_name'].'</h5>
                <h5>Emergency Address: '.$row['Em_address'].'</h5>
                <h5>Emergency Phone No: '.$row['Em_phone_no'].'</h5>
                <h5>Start Date: '.$row['start_date'].'</h5>
                <h5>Plans: '.$row['Plans_details'].'</h5>



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

    $sql= "SELECT Enrollment_no,Client_name,Present_address,phone_no,DOB,Medical_issues,Em_name,Em_address,Em_phone_no,
    M_status,start_date,plan_id,plans.Plans_details FROM members_list INNER JOIN plans ON members_list.plan_id = plans.id
    where Enrollment_no = '$s_id' ";
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
        $id = $_POST['id'];
        $name = $_POST['name'];
        $address = $_POST['address'];
        $phone_no = $_POST['phone_no'];
        $dob = $_POST['dob'];
        $medical_issues = $_POST['medical_issues'];
        $em_name = $_POST['Ename'];
        $em_address = $_POST['Eaddress'];
        $em_phone_no = $_POST['Ephone_no'];
        $status = $_POST['status'];
        $start_date = $_POST['start_date'];
        $plans = $_POST['plans_id'];

        $query = "UPDATE members_list 
          INNER JOIN plans ON members_list.plan_id = plans.id 
          SET Enrollment_no='$id',
              Client_name='$name', 
              Present_address='$address', 
              phone_no='$phone_no', 
              DOB='$dob', 
              Medical_issues='$medical_issues', 
              Em_name='$em_name', 
              Em_address='$em_address', 
              Em_phone_no='$em_phone_no', 
              M_status='$status', 
              start_date='$start_date', 
              plan_id='$plans' ,
              end_date = date_add('$start_date',INTERVAL 35 day)
          WHERE Enrollment_no='$id'";

        $query_run = mysqli_query($conn, $query);

        header("Location: http://localhost/gymx/members/members.php");

    }


if(isset($_POST['delete_member'])){

    $id = $_POST['member_id'];

    $query = "DELETE FROm members_list WHERE Enrollment_no = '$id' ";
    $query_run = mysqli_query($conn, $query);

    header("Location: http://localhost/gymx/members/members.php");
}
?>