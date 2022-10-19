<?php
session_start();
#databses name      xyz_db
#table name         student
$conn = mysqli_connect("localhost", "root", "", "xyz_db");  
if(!$conn)
{
    die("connection Failed");
}
// echo "connection sucessfull <hr/>";

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
    $image = $_FILES['stud_image']['name'];

    $allowed_extension = array('gif', 'png', 'jpg', 'jpeg');
    $filename = $_FILES['stud_image']['name'];
    $file_exttension = pathinfo($filename, PATHINFO_EXTENSION);
    if(!in_array($file_exttension, $allowed_extension))   //is jaga wrong hogaya ta          //in_array in use to array data
    {
        $_SESSION['status'] = "<b>" ."you are allowed with only jpg, png, jpeg and gif" . "</b>";
        header('Location: form.php');
    }
    else
    { 
        // ----------------------------file_exists-------------------------
        if(file_exists("upload/" . $_FILES['stud_image']['name']))  //file_exists("apna path image" . your_postfile)
        {
            $filename =  $_FILES['stud_image']['name'];
            $_SESSION['status'] = "Image already Exist" .$filename; //filename: image ke name ko display kar rha hai
            header('location:form.php');
        }
        else
        {
            $query = "INSERT INTO student(stud_name,father_name,mother_name,gender,dob,User_email,Phone_no,u_address,hobbies,languages,stud_image)
            VALUE  ('$name','$father','$mother','$gender_box','$dobs','$email','$ph_no','$add','$hobbstr','$lang','$image')";
            $query_run = mysqli_query($conn,$query);
            
            if($query_run)
            {

                // --------------------------move_uploaded_file-------------------
                //photo nmae ke shat moves hoag
                move_uploaded_file($_FILES['stud_image']["tmp_name"], "upload/".$_FILES["stud_image"]["name"]);
                    
                    //display one time he hoga
                    $_SESSION['status'] = "Image Store Sucessfull" . "<br>";
                    header('location: index.php');   //use nhi kar na hai
                    // echo "<script>alert('Record update')</script>";                         
                ?>
                <!-- <meta http-equiv="Refresh" content="0; url='http://localhost/semple_profile/09_redirect%20page%20and%20load%20-%20Copy/'" /> -->
                <?php               
                
            }
            else
            {
                $_SESSION['status'] = "Data Not Store";
                header('location: form.php'); 
            }
                
        }

    }
}

// note: is mai "array" return hoga sql data base mai imag wale jae per
//or image pass hoga folder mai


// ---------------------------------Edit/updata data---------------------------- 

if(isset($_POST['update_btn']))
{
    $stud_id = $_POST['stud_id'];
    $name = $_POST['stud_name'];
    $father = $_POST['father_name'];
    $mother = $_POST['mother_name'];
    $gender_box = $_POST['gender'];
    $dobs = $_POST['dob'];
    $email = $_POST['User_email'];
    $ph_no = $_POST['Phone_no'];
    $add = $_POST['u_address'];
    
    $hobb =  $_POST['hobbies'];
    $up_hobbstr =  implode(",",$hobb);

    $lang = $_POST['languages'];
    $new_image = $_FILES['stud_image']['name'];
    $old_image = $_POST['stud_image_old'];

        // image update condication create kare gaye
    if($new_image != '') 
    {       // image update ko 
         $update_filename = $_FILES['stud_image']['name'];
    }
    else
    {       // photo ko upload nhi kar ne per puren file ko upload kare ga
        $update_filename  =  $old_image;
    }

    if($_FILES['stud_image']['name'] !='')  //file_exists("apna path image" . your_postfile)
    {
        if(file_exists("upload/" . $_FILES['stud_image']['name']))  //file_exists("apna path image" . your_postfile)
        {
            $filename =  $_FILES['stud_image']['name'];  //image ke over right ko chack kare ga
            $_SESSION['status'] = "<b>" . "Image already Exist"  .$filename . "</b>"; //same image mai msg dislay show kare ga
            header('Location: index.php');         //location set kare ga
        }
    }
    else
    {
        $query = "UPDATE student set stud_name='$name', father_name=' $father', mother_name='$mother', gender='$gender_box', dob='$dobs', User_email='$email', Phone_no='$ph_no', u_address='$add', hobbies='$up_hobbstr', languages='$lang',  stud_image='$update_filename' WHERE id='$stud_id' "; 
        $query_run = mysqli_query($conn,$query);
    }

    if($query_run)
    {
        if($_FILES['stud_image']['name'] !='')
        {
            move_uploaded_file($_FILES['stud_image']["tmp_name"], "upload/".$_FILES["stud_image"]["name"]);
            unlink("upload/".$old_image);    // old image remove hogaya
        }
        $_SESSION['status'] = "Data update sucessfully";      
        header("Location: index.php");
    }
    else
    {
        $_SESSION['status'] = "Data not update sucessfully";
        header("Location: index.php");
    }

}


// -------------------- deleted---------------------------
if(isset($_POST['stud_del']))
{
    
    $stud_id = $_POST['stud_del_id'];
    $stud_img = $_POST['stud_del_img'];

    $query = "DELETE FROM student WHERE id='$stud_id' ";
    $query_run = mysqli_query($conn,$query);

    if($query_run)
    {
        unlink("upload/". $stud_img);
        $_SESSION['status'] = "Data and image deleted sucessfully";
        header("Location: index.php");
    }
    else
    {
        $_SESSION['status'] = "Data not deleted";
        header("Location: index.php");
    }

}

?>