<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <a href="form.php">Registration form</a>
    <br><br>
    <center><h4>PHP IMAGE CRUD - featch Image</h4></center> 
    <br>

    <?php
    $conn = mysqli_connect("localhost","root","","xyz_db");
    $query = "SELECT * FROM student";
    $query_run = mysqli_query($conn,$query);
    ?>

    <table width=100%>
        <thead align=left>
            <th>ID</th>
            <th>Name</th>
            <th>Father</th>
            <th>Mother</th>
            <th>Gender</th>
            <th>Date of Birth</th>
            <th>Email</th>
            <th>Phone_no</th>
            <th>Address</th>
            <th>Hobbies</th>
            <th>Photo</th>
            <th>Edit</th>
            <th>Delete</th>
        </thead>

        <tbody>
            <?php
            if(mysqli_num_rows($query_run)>0)
            {
                foreach($query_run as $row)
                {
                    ?>
                    <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['stud_name']; ?></td>
                    <td><?php echo $row['father_name']; ?></td>
                    <td><?php echo $row['mother_name']; ?></td>
                    <td><?php echo $row['gender']; ?></td>
                    <td><?php echo $row['dob']; ?></td>
                    <td><?php echo $row['User_email']; ?></td>
                    <td><?php echo $row['Phone_no']; ?></td>
                    <td><?php echo $row['u_address']; ?></td>
                    <td><?php echo $row['hobbies']; ?></td>
                    <td><?php echo $row['languages']; ?></td>
                   

                    <td>
                    <img src="<?php echo "upload/".$row['stud_image']; ?>" width="100px" alt="Image">  
                    </td>
                        
                    <td>
                    <a href="">Edit</a>
                    </td>
                    <td>
                    <a href="">Delete</a>
                    </td>
                </tr>

                    <?php
                }
            }
            else
            {
                ?>
                <tr>
                <td>No Record Available</td>
               </tr>

               <?php
            }
            ?>
                

        </tbody>
    </table>

</body>
</html>