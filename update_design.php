<?php
error_reporting(0);
include "connection.php";
session_start();

$id = $_GET['id'];

$username = $_SESSION['username'];

if($username == true){

}else{
    header('location: login.php');
}

$query = "SELECT * FROM user where id = $id";

$data = mysqli_query($conn, $query);

$result = mysqli_fetch_assoc($data);

$lang = $result['language'];
$language = explode(",", $lang);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <form action="#" method="POST" enctype="multipart/form-data">
        <h2>Update User Details</h2>
        
        <label>Image Upload</label>
        <input type="file" name="uploadfile"><br>
        
        <label for="fname">First Name:</label>
        <input type="text" name="fname" value="<?php echo $result['firstname'];?>" id="fname" required><br>

        <label for="lname">Last Name:</label>
        <input type="text" name="lname" value="<?php echo $result['lastname'];?>"  id="lname" required><br>

        <label for="pwd">Password:</label>
        <input type="password" name="pwd" value="<?php echo $result['password'];?>"  id="pwd" required><br>

        <label for="confpwd">Confirm Password:</label>
        <input type="password" name="confpwd" value="<?php echo $result['confpassword'];?>"  id="confpwd" required><br>

        <label for="gender">Gender</label>
        <select name="gender" id="gender" required>
            <option value="" disabled selected >Select</option>
            <option value="male"
                <?php if($result['gender'] == 'male'){
                    echo 'selected';
                } ?>
             >male</option>
            <option value="female" 
                <?php if($result['gender'] == 'female'){
                    echo 'selected';
                } ?>
            >female</option>
            <option value="others"
             >Others</option>
        </select><br>

        <label for="email">Email Address:</label>
        <input type="email" name="email" value="<?php echo $result['email'];?>"  id="email" required><br>

        <label for="phno">Phone Number:</label>
        <input type="text" name="phno" value="<?php echo $result['phone'];?>"  id="phno" required><br>

        <label for="caste">Caste</label>
        <input type="radio" name="caste" id="general" value="General" required
            <?php
                if($result['caste'] == 'General'){
                    echo 'checked';
                }
            ?>>
            <label for="general">General</label>
        <input type="radio" name="caste" id="obc" value="OBC" required
            <?php
                if($result['caste'] == 'OBC'){
                    echo 'checked';
                }
            ?>>
            <label for="obc">OBC</label>
        <input type="radio" name="caste" id="sc" value="SC" required
            <?php
                if($result['caste'] == 'SC'){
                    echo 'checked';
                }
            ?>>
            <label for="sc">SC</label>
        <input type="radio" name="caste" id="sd" value="SD" required
            <?php
                if($result['caste'] == 'SD'){
                    echo 'checked';
                }
            ?>>
            <label for="sd">SD</label><br>

        <label for="">Languages</label>
        <input type="checkbox" name="language[]" value="Nepali" id="nepali"
                <?php
                    if(in_array('Nepali',$language)){
                        echo 'checked';
                    }
                ?>
        ><label for="nepali">Nepali</label>
        <input type="checkbox" name="language[]" value="English" id="english"
                <?php
                    if(in_array('English',$language)){
                        echo 'checked';
                    }
                ?>
        ><label for="english">English</label>
        <input type="checkbox" name="language[]" value="Japanese" id="japanese"
                <?php
                    if(in_array('Japanese',$language)){
                        echo 'checked';
                    }
                ?>
        ><label for="japanese">Japanese</label><br>
            
        <label for="address">Address:</label>
        <textarea name="address" id="address" cols="30" rows="3" required><?php echo $result['address'];?>
        </textarea><br>
        <input type="submit" value="Update details" name="update" >
    </form>
</body>
</html>

<?php 
    if($_POST['update']){

        $filename = $_FILES["uploadfile"]["name"];
        $tempname = $_FILES["uploadfile"]["tmp_name"];
        $folder = "images/".$filename;
        move_uploaded_file($tempname, $folder);

        $fname   = $_POST['fname'];
        $lname   = $_POST['lname'];
        $pwd     = $_POST['pwd'];
        $confpwd = $_POST['confpwd'];
        $gender  = $_POST['gender'];
        $email   = $_POST['email'];
        $phone   = $_POST['phno'];
        $caste   = $_POST['caste'];
        $lang = $_POST['language'];
        $language = implode(",",$lang);
        $address = $_POST['address'];

        $query = "UPDATE user set img_source='$folder', firstname='$fname', lastname='$lname', password='$pwd', confpassword='$confpwd', gender='$gender', email='$email', phone='$phone', caste = '$caste', language = '$language', address='$address' WHERE id = $id";

        $data = mysqli_query($conn, $query);

        if($data){
            echo "<script>alert('Updated Details');</script>";
            ?>

                <meta http-equiv="refresh" content="0; url= http://localhost/crud/display.php" />

            <?php
        }else{
            echo "<script>alert('Failed to Update details);</script>";
        }
    }
?>