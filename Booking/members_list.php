<!DOCTYPE html>
<html lang="en">
<head>
    <title>member records</title>
</head>
<body>
    <h1>Records</h1>
    <?php 
    $conn = mysqli_connect("localhost","root","","gymx") or die("Connection failed");
    $sql = "SELECT * FROM members_list";
    $result = mysqli_query($conn, $sql) or die("Query Failed");

    if(mysqli_num_rows($result)>0){

    ?>
    <table border="1" cellpadding="5" >
        <thead>
            
            <th>id</th>
            <th>name</th>
            <th>address</th>
            <th>phone no</th>
            <th>dob</th>
            <th>medical issue</th>
            <th>emergency name</th>
            <th>emergency address</th>
            <th>emergency no.</th>
            <th>status</th>
        </thead>

        <tbody bgcolor="lightgreen">
            <?php while($row = mysqli_fetch_assoc($result)){
            
            ?>
            <tr>
            
            <td><?php echo $row['Enrollment_no'] ?></td>
            <td><?php echo $row['Client_name'] ?></td>
            <td><?php echo $row['Present_address'] ?></td>
            <td><?php echo $row['phone_no'] ?></td>
            <td><?php echo $row['DOB'] ?></td>
            <td><?php echo $row['Medical_issues'] ?></td>
            <td><?php echo $row['Em_name'] ?></td>
            <td><?php echo $row['Em_address'] ?></td>
            <td><?php echo $row['Em_phone_no'] ?></td>
            <td><?php echo $row['status'] ?></td>
            </tr>

            <?php } ?>
        </tbody>
    </table>

    <?php }
    
    mysqli_close($conn);
    ?>

    
</body>
</html>