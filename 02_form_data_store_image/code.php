<?php
session_start();
#databses name      xyz_db
#table name         student
$conn = mysqli_connect("localhost", "root", "", "xyz_db");  
if(!$conn)
{
    die("connection Failed");
}
echo "connection sucessfull <hr/>";

if(isset($_POST['save_btn']))
{
    $name = $_POST['stud_name'];
    $father = $_POST['father_name'];
    $mother = $_POST['mother_name'];
    $gender_box = $_POST['gender'];
    $dobs = $_POST['dob'];
    $email = $_POST['User_email'];
    $ph_no = $_POST['Phone_no'];
    $add = $_POST['u_address'];
    $hobb =  $_POST['hobbies']; //convert a array to string  [hobbies] => Array ( [0] => Reading
    // echo $hobb;         //1.error show ho rha hai output: "array" type ka aa rha hai
    // $hobbstr =  implode($hobb);     //2.convert string mai
    // echo $hobbstr; //"2.convert to string" output: ReadingBloggingPainting
    $hobbstr =  implode(",",$hobb);
    // echo "$hobbstr";    //output: Blogging,Painting,Photography
    // https://www.php.net/manual/en/function.implode.php
    // implode — Join array elements with a string

    $lang = $_POST['languages'];
    $image = $_FILES['stud_image'];

    //   stud_name,father_name sql ke table ka name hai
    $query = "INSERT INTO student(stud_name,father_name,mother_name,gender,dob,User_email,Phone_no,u_address,hobbies,languages,stud_image)
    VALUE  ('$name','$father','$mother','$gender_box','$dobs','$email','$ph_no','$add','$hobbstr','$lang','$image')";

    $query_run = mysqli_query($conn,$query);

    if($query_run)
    {
        // --------------------------move_uploaded_file-------------------
        //photo nmae ke shat moves hoag   
        move_uploaded_file($_FILES['stud_image']["tmp_name"], "upload/".$_FILES["stud_image"]["name"]);
        
        //display one time he hoga
        $_SESSION['status'] = "Image Store Sucessfull";          
        header('location: form.php'); 
    }
    else
    {
        $_SESSION['status'] = "image upload failed ";
        header('location: form.php'); 
    }
}

// note: is mai "array" return hoga sql data base mai imag wale jae per
//or image pass hoga folder mai


?>