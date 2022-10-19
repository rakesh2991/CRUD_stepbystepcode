<?php
// echo $id = $_GET['id']; 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    // pop up use a display msg data update
    if(isset($_SESSION['status']) && $_SESSION != '')
    {
        echo $_SESSION['status'];
        unset($_SESSION['status']);      //unset close kardena
    }
?>

<B>Edit from </B> <br>

<?php
$conn = mysqli_connect("localhost", "root", "", "xyz_db");  //database code
$id = $_GET['id'];                                  //'id' URLS mai show kare ga 
$query = "SELECT * FROM student WHERE id='$id' ";   //$id pass a $_GET['id'] 
$query_run = mysqli_query($conn, $query);

if(mysqli_num_rows($query_run) > 0 )
{
    foreach($query_run as $row)
    {
        ?>
        <form action="code.php" method="POST" enctype="multipart/form-data">

        <input type="hidden" name="stud_id" value="<?php echo $row['id']; ?>" />  <!-- //this line imp -->
        
        <label for="stud_name">Student Name:</label><br>
        <input type="text" id="stud_name" name="stud_name" value="<?php echo $row['stud_name']; ?>"><br>

        <label for="Father_name">Father Name:</label><br>
        <input type="text" id="father_name" name="father_name" value="<?php echo $row['father_name']; ?>" ><br>

        <label for="mother_name">Mother Name:</label><br>
        <input type="text" id="fname" name="mother_name" value="<?php echo $row['mother_name']; ?>"><br>

        <!-- name="redy" value same rha ga -->
        <label for="">Gender</label><br>
        <input type="radio"  name="gender" value="Male"
        <?php
        if($row['gender'] == "Male")          // == comparisition ke use kiya jata hai 
        {
            echo "checked";
        }
        ?>
        >

        <label for="Gender1">Male</label><br>
        <input type="radio"  name="gender" value="Female"
        <?php
        if($row['gender'] == "Female")         
        {
            echo "checked";
        }
        ?>
        >
        <label for="Gender2">Female</label><br>
        <input type="radio"  name="gender" value="Other"
        <?php
        if($row['gender'] == "Other")         
        {
            echo "checked";   //checked attribut kiya jata hai
        }
        ?>
        >
        <label for="Gender3">Other</label>
        <br>

        <label for="Date of bitrh:">Date of bitrh:</label><br>         
        <br>
        <input type="date" name="dob" value="<?php echo  $row['dob']; ?>">
        <br>
        <label for="Email_id">Email ID</label><br>
        <input type="email" name="User_email" value="<?php echo  $row['User_email']; ?>">
        <br>
        <label for="Phone_no">Phone No</label><br>
        <input type="tel" name="Phone_no" value="<?php echo  $row['Phone_no']; ?>">
        <br>

        <label for="address">Address</label><br>
        <textarea id="" name="u_address" rows="4" cols="50" >
                <?php echo  $row['u_address']; ?>    
        </textarea>
        <br>

        <?php
        $old_hobiess =  $row['hobbies'];    //Reading,Painting Hobbies     cheacking process
        // echo $old_hobiess;
        $store_hobiess = explode(",",$old_hobiess);    //string ko array mai convert karta hai
        // echo $store_hobiess;  //Array to string conversion   array convert hpgya hai
        ######################
        // array indexing ko chack karen ne ke liya "print_r()" ka use karte hai.
        // print_r($store_hobiess);    //ArrayArray ( [0] => Reading [1] => Painting )
        ############################
        ?>  
        <br>
        <label for="Hobbies">Hobbies</label>
        <br>
        <input type="checkbox" id="Hobbies1" value="Reading" name="hobbies[]"
        <?php
        if(in_array("Reading",$store_hobiess)) 
        {
            echo "checked";
        }
        ?>
        >
        <label for="Hobbies1"> Reading</label><br>
        <input type="checkbox" id="Hobbies2" value="Blogging" name="hobbies[]"
        <?php
        if(in_array("Blogging",$store_hobiess)) 
        {
            echo "checked";
        }
        ?>
        >
        <label for="Hobbies2"> Blogging</label><br>
        <input type="checkbox" id="Hobbies3" value="Painting"name="hobbies[]"
        <?php
        if(in_array("Painting",$store_hobiess)) 
        {
            echo "checked";
        }
        ?>
        > 
        <label for="Hobbies3"> Painting</label><br>
        <input type="checkbox" id="Hobbies4" value="Photography" name="hobbies[]"
        <?php
        if(in_array("Photography",$store_hobiess)) 
        {
            echo "checked";
        }
        ?>
        >
        <label for="Hobbies4"> Photography</label>
        <br><br>

        <label for="Languages">Languages:</label><br>
        <?php
        // echo $row['languages'];   //testing processing
        ?>
        <select name="languages" id="lang">
            <!-- note:1. value="" php code in side 2. is note use value <option ""php code in side" >  -->
            <option>---Select Language---</option>
            <option value="English"
            <?php
                if($row['languages'] == "English")
                {
                    echo "selected";
                }
            ?>
            >English</option>
            <option value="Hindi" 
            <?php
                if($row['languages'] == "Hindi")
                {
                    echo "selected";
                }
            ?>
            >Hindi</option>
        </select>
        <br><br>
        <!-- -------------------- -->
        <!-- type="file" image or file ko insert karte hai  -->
        <input type="file" accept="image/*" name="stud_image"> 
        <!-- previous old image ke data ko call kiya gaya hai "value" under or type="text" chack process hai or type="hidden" pass kiya hai-->
        <input type="hidden" name="stud_image_old" value="<?php echo $row['stud_image'] ?>" >
        <!-- ---------------- -->
        <br>

         <!-- display old image upload -->
         <img src="<?php echo "upload/".$row['stud_image']; ?>" width="100px;">

         <button type="submit" name="update_btn">Update Data</button>         
        
</form>

        <?php
    }
}
?>


</body>
</html>