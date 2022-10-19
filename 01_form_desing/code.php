<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<!-- Persional information -->
<label for="stud_name">Student Name:</label> <?php echo $_REQUEST['stud_name']; ?> <br>
    <label for="Father_name">Father Name:</label> <?php echo $_REQUEST['Father_name']; ?> <br>
    <label for="Mother_name">Mother Name:</label> <?php echo $_REQUEST['Mother_name']; ?> <br>

    <!-- Gender -->
    <label for="">Gender </label> <?php echo $_REQUEST['redy']; ?>
    <br>
    <!-- Date of birth -->
    <label for="">Date Of Birth </label><?php
                                        $new_date = date('d-m-Y', strtotime($_REQUEST['d']));
                                        echo $new_date;
                                        ?>
    <br>
    <!-- Email ID -->
    <label for="Email_id">Mother Name:</label> <?php echo $_REQUEST['User_email']; ?> <br>

    <!-- Phone number -->
    <label for="Phone_no">Phone No</label> <?php echo $_REQUEST['Phone_no']; ?> <br>

    <!-- addresss -->
    <label for="address">Address</label> <?php echo $_REQUEST['address']; ?><br>

    <!-- Hobbies -->
    <label for="Hobbies">Hobbies</label><br>
    <?php
    if (isset($_REQUEST['check1'])) {
        echo $_REQUEST['check1'] . "<br>";
    }

    if (isset($_REQUEST['check2'])) {
        echo $_REQUEST['check2'] . "<br>";
    }

    if (isset($_REQUEST['check3'])) {
        echo $_REQUEST['check3'] . "<br>";
    }

    if (isset($_REQUEST['check4'])) {
        echo $_REQUEST['check4'] . "<br>";
    }
    ?>

    <!-- Quelification -->
    <label for="Qulification">Choose a Qulification:</label><br>
    <?php if (isset($_REQUEST["location"])) {
        foreach ($_REQUEST["location"] as $place) {
            echo $place . "<br>";
        }
    } ?>

    <!-- image upload -->
    <?php
    // images:- image directory create

    // print_r($_FILES["stud_image"]);
    echo $_FILES["stud_image"]["name"];
   
    ?>
</body>
</html>