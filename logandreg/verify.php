<?php

require 'config.php';

if (isset($_GET['email']) && isset($_GET['v_code'])){

    $email = $_GET['email'];
    $vCode = $_GET['v_code'];
    
    $query = "SELECT * FROM users WHERE email = '$email' AND verification_code = '$vCode'";
    $result=mysqli_query($conn,$query);
    if($result){
        if(mysqli_num_rows($result)==1){
            $result_fetch = mysqli_fetch_assoc($result);
            if ($result_fetch['is_verified']==0){
                $emailToUpdate = $result_fetch['email'];
                $update = "UPDATE users SET is_verified = '1' WHERE email = '$emailToUpdate'";
                if (mysqli_query($conn,$update)){
                    echo"
        <script>
        alert('Email verification is successful');
        window.location.href='login.php';
        </script>
        ";
                }
            }
            else{
                echo"
        <script>
        alert('Email is already registered');
        window.location.href='login.php';
        </script>
        ";
            }
        }
    }
    else{
        echo"
        <script>
        alert('Cannot Run Query');
        window.location.href='login.php';
        </script>
        ";
    }
}

?>