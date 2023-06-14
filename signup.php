<?php
    error_reporting(0);
    include "connection.php"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div id="signup">
        <form action="#" method="POST" enctype="multipart/form-data">
            <h1 class="h1">Registration Form</h1>

            <label for="img-upload">Image Upload</label>
            <input class="upload-file" type="file" name="uploadfile" id="img-upload"><br>

            <label for="fname">First Name:</label>
            <input type="text" name="fname" id="fname" required><br>

            <label for="lname">Last Name:</label>
            <input type="text" name="lname" id="lname" required><br>

            <label for="pwd">Password:</label>
            <input type="password" name="pwd" id="pwd" required><br>

            <label for="confpwd">Confirm Password:</label>
            <input type="password" name="confpwd" id="confpwd" required><br>

            <label for="gender">Gender</label>
            <select class="select-gender" name="gender" id="gender" required>
                <option value="" disabled selected >Select</option>
                <option value="male" >Male</option>
                <option value="female" >Female</option>
                <option value="others" >Others</option>
            </select><br>
            <label for="email">Email Address:</label>
            <input type="email" name="email" id="email" required><br>

            <label for="phno">Phone Number:</label>
            <input type="text" name="phno" id="phno" required><br>

            <label for="caste">Caste</label>
            <input class="input-caste" type="radio" name="caste" value="General" id="general"><label class="caste" for="general" required>General</label>
            <input class="input-caste" type="radio" name="caste" value="OBC" id="obc" required><label class="caste" for="obc">OBC</label>
            <input class="input-caste" type="radio" name="caste" value="SC" id="sc" required><label class="caste" for="sc">SC</label>
            <input class="input-caste" type="radio" name="caste" value="SD" id="sd" required><label class="caste" for="sd">SD</label><br>

            <label for="">Languages</label>
            <input class="input-language" type="checkbox" name="language[]" value="Nepali" id="nepali"><label class="language"  for="nepali">Nepali</label>
            <input class="input-language" type="checkbox" name="language[]" value="English" id="english"><label class="language"  for="english">English</label>
            <input class="input-language" type="checkbox" name="language[]" value="Japanese" id="japanese"><label class="language"  for="japanese">Japanese</label><br>

            <label for="address">Address:</label>
            <input type="text" name="address" id="address" required><br>

            <input class="signup-btn" type="submit" value="Sign up" name="register" >
        </form>
    </div>
</body>
</html>

<?php     
    if($_POST['register']){

        // print_r($_FILES["uploadfile"]);
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
        $caste = $_POST['caste'];
        $lang = $_POST['language'];
        $language = implode(",",$lang);
        $address = $_POST['address'];

        $query = "INSERT INTO user (img_source, firstname, lastname, password, confpassword, gender, email, phone, caste, language, address) values ('$folder', '$fname', '$lname', '$pwd', '$confpwd', '$gender', '$email', '$phone', '$caste', '$language', '$address')";

        $data = mysqli_query($conn, $query);

        if($data){
            echo "<script>alert('Data Inserted Into Database')</script>";
        }else{
            echo "<script>alert('Failed to insert Data into Database')</script>";
        }
    }
?>