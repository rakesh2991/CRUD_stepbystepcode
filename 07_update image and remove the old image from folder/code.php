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
    $image = $_FILES['stud_image']['name'];

    $allowed_extension = array('gif', 'png', 'jpg', 'jpeg');
    $filename = $_FILES['stud_image']['name'];
    $file_exttension = pathinfo($filename, PATHINFO_EXTENSION);
    if(!in_array($file_exttension, $allowed_extension))   //is jaga wrong hogaya ta          //in_array in use to array data
    {
        $_SESSION['status'] = "<b>" ."you are allowed with only jpg, png, jpeg and gif" . "</b>";
        header('Location: index.php');
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
                $_SESSION['status'] = "Image Store Sucessfull";          
                header('location: form.php'); 
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

//  extension mission hai

if(isset($_POST['update_btn']))
{
    // print_r($_POST);     //chacking perpose
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
    // ------------------------------
    $new_image = $_FILES['stud_image']['name']; //new iage ko insert karaya ja rh hai new edit.php se
    $old_image = $_POST['stud_image_old'];  //jo id mera hidden pass ho rha hai, post method mai aa rha hai
    // ------------------------------------

        // new image insert karne per
    if($new_image != '')   //!= one time condation exicuted
    {       // image update ko  new
         $update_filename = $new_image; //$new_image
    }
    else //null is not condition is true, upload a old image
    {       // photo ko upload nhi kar ne per puren file ko upload kare ga
        $update_filename  =  $old_image;
    }

    $allowed_extension = array('gif', 'png', 'jpg', 'jpeg');
    $filename = $_FILES['stud_image']['name'];
    $file_exttension = pathinfo($filename, PATHINFO_EXTENSION);
    if(!in_array($file_exttension, $allowed_extension))   //is jaga wrong hogaya ta          //in_array in use to array data
    {
        $_SESSION['status'] = "<b>" ."you are allowed with only jpg, png, jpeg and gif " . "</b>";
        header('Location: index.php');  
        // note: edit.php show error, because edit.php data pass by id
    }
    else
    {
        if(file_exists("upload/" . $_FILES['stud_image']['name']))  //file_exists("apna path image" . your_postfile)
        {
            $filename =  $old_image;  //image ke over right ko chack kare ga
            $_SESSION['status'] = "Image already Exist "  .$filename; //same image mai msg dislay show kare ga
            header('Location: index.php');         //location set kare ga
        }else{
            move_uploaded_file($_FILES['stud_image']["tmp_name"], "upload/".$_FILES["stud_image"]["name"]);
            unlink("upload/".$old_image);    // old image remove hogaya
        }
        $query = "UPDATE student set stud_name='$name', father_name=' $father', mother_name='$mother', gender='$gender_box', dob='$dobs', User_email='$email', Phone_no='$ph_no', u_address='$add', hobbies='$up_hobbstr', languages='$lang',  stud_image='$update_filename' WHERE id='$stud_id' "; 
        $query_run = mysqli_query($conn,$query);   

        if($query_run)
        {
            $_SESSION['status'] = "Data update sucessfully";
             header("Location: index.php");
        }
        else
        {
            $_SESSION['status'] = "Data not update sucessfully";
            header("Location: index.php");
        }
    }
}

?>