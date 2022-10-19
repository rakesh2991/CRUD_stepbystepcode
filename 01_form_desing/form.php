<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form action="code.php" method="post" enctype="multipart/form-data">
<!-- Persional information -->
<label for="stud_name">Student Name:</label><br>
        <input type="text" id="stud_name" name="stud_name"><br>
        <label for="Father_name">Father Name:</label><br>
        <input type="text" id="Father_name" name="Father_name"><br>
        <label for="Mother_name">Mother Name:</label><br>
        <input type="text" id="fname" name="Mother_name"><br>

        <!-- Gender -->
        <!-- name="redy" value same rha ga -->
        <label for="">Gender</label><br>
        <input type="radio" name="redy" value="Male">
        <label for="Gender1">Male</label><br>
        <input type="radio" name="redy" value="Female">
        <label for="Gender2">Female</label><br>
        <input type="radio" name="redy" value="Other">
        <label for="Gender3">Other</label>
        <br>

        Date of bitrh: 
        <br>
        <input type="date" name="d" value="<?php echo date('d-m-Y') ?>">
        <br>
        <label for="Email_id">Email ID</label><br>
        <input type="email" name="User_email">
        <br>
        <label for="Phone_no">Phone No</label><br>
        <input type="tel" name="Phone_no">
        <br>

        <label for="address">Address</label><br>
        <textarea id="" name="address" rows="4" cols="50">
        </textarea>
        <br>
        <label for="Hobbies">Hobbies</label>
        <br>
        <input type="checkbox" id="Hobbies1" name="check1" value="Reading">
        <label for="Hobbies1"> Reading</label><br>
        <input type="checkbox" id="Hobbies2" name="check2" value="Blogging">
        <label for="Hobbies2"> Blogging</label><br>
        <input type="checkbox" id="Hobbies3" name="check3" value="Painting">
        <label for="Hobbies3"> Painting</label><br>
        <input type="checkbox" id="Hobbies4" name="check4" value="Photography">
        <label for="Hobbies4"> Photography</label>
        <br><br>

        <label for="Qulification">Choose a Qulification:</label>

        <select name="location[]" id="Qulification">
            <option value="BCA">BCA</option>
            <option value="MCA">MCA</option>
            <option value="PGDCA">PGDCA</option>
            <option value="PHD">PHD</option>
        </select>
        <br><br>
        <!-- image upload -->
        <input type="file" name="stud_image"> <br>
     
        <br>
        <!-- submite button form ke under rha ga -->
        <button type="submit">Submit </button>



</form>


<br>
</body>
</html>