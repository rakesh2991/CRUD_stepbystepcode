<?php session_start(); ?>

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

 <B>Registration from </B> <br>
<form action="code.php" method="post" enctype="multipart/form-data">
<!-- Persional information -->
        <label for="stud_name">Student Name:</label><br>
        <input type="text" id="stud_name" name="stud_name" required><br>
        <label for="Father_name">Father Name:</label><br>
        <input type="text" id="father_name" name="father_name" required><br>
        <label for="mother_name">Mother Name:</label><br>
        <input type="text" id="fname" name="mother_name"><br>

        <!-- Gender -->
        <!-- error: blank submit -->
        <!-- 
       Warning: Undefined array key "gender" in C:\xampp\htdocs\semple_profile\06_fetch data and edit image with data\code.php on line 17
        -->
        
        <!-- name="redy" value same rha ga -->
        <label for="">Gender</label><br>
        <input type="radio"  name="gender" value="Male" required>
        <label for="Gender1">Male</label><br>
        <input type="radio"  name="gender" value="Female" required>
        <label for="Gender2">Female</label><br>
        <input type="radio"  name="gender" value="Other" required>
        <label for="Gender3">Other</label>
        <br>
   

        Date of bitrh: 
        <br>
        
        <input type="date" name="dob" required value="<?php echo date('d-m-Y') ?>">
        <br>
        <label for="Email_id">Email ID</label><br>
        <input type="email" name="User_email" required>
        <br>
        <label for="Phone_no">Phone No</label><br>
        <input type="tel" name="Phone_no" required>
        <br>

        <label for="address">Address</label><br>
        <textarea id="" name="u_address" rows="4" cols="50" required>
        </textarea>
        <br>
        <label for="Hobbies" required>Hobbies</label>
        <!-- 
            Warning: Undefined array key "hobbies" in C:\xampp\htdocs\semple_profile\06_fetch data and edit image with data\code.php on line 22 
         -->
         
        <br>
        <input type="checkbox" id="Hobbies1" name="hobbies[]" value="Reading">
        <label for="Hobbies1"> Reading</label><br>
        <input type="checkbox" id="Hobbies2" name="hobbies[]" value="Blogging">
        <label for="Hobbies2"> Blogging</label><br>
        <input type="checkbox" id="Hobbies3" name="hobbies[]" value="Painting">
        <label for="Hobbies3"> Painting</label><br>
        <input type="checkbox" id="Hobbies4" name="hobbies[]" value="Photography">
        <label for="Hobbies4"> Photography</label>
        <br>

        <label for="Languages">Languages:</label><br>
        <select name="languages" id="lang" required>
            <option value="">---Select Language---</option>
            <option value="English">English</option>
            <option value="Hindi">Hindi</option>
        </select>
        <br><br>
        <!-- image upload -->
        <input type="file" accept="image/*" name="stud_image" required> <br>
     
        <br>
        <!-- submite button form ke under rha ga -->
        <button type="submit" name="save_btn">Submit </button>



</form>


<br>
</body>
</html>