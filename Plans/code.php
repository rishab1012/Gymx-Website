<?php 
$conn= mysqli_connect("localhost","root","","gymx") or die("connection failed");



if(isset($_POST['checking_edit_btn'])){
    $s_id = $_POST['student_id'];
    // echo $return = $s_id;
    $result_array = [];

    $sql= "SELECT id,Plans_details,Amount FROM plans
    where id = '$s_id' ";
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
        $plan_id = $_POST['plan_id'];
        $plan_name = $_POST['plan_name'];
        $plan_amount = $_POST['amount'];

        $query = "UPDATE plans 
          SET id='$plan_id',
              Plans_details='$plan_name', 
              Amount='$plan_amount'
            WHERE id='$plan_id'";

        $query_run = mysqli_query($conn, $query);

        header("Location: http://localhost/gymx/plans/plansDetails.php");

    }


if(isset($_POST['delete_member'])){

    $id = $_POST['member_id'];

    $query = "DELETE FROm plans WHERE id = '$id' ";
    $query_run = mysqli_query($conn, $query);

    header("Location: http://localhost/gymx/plans/plansDetails.php");
}
?>