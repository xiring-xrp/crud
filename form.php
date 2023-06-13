<?php include "connection.php"?>

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
        <h1>Registration Form</h1>

        <label>Image Upload</label>
        <input type="file" name="uploadfile"><br>

        <label for="fname">First Name:</label>
        <input type="text" name="fname" id="fname" required><br>

        <label for="lname">Last Name:</label>
        <input type="text" name="lname" id="lname" required><br>

        <label for="pwd">Password:</label>
        <input type="password" name="pwd" id="pwd" required><br>

        <label for="confpwd">Confirm Password:</label>
        <input type="password" name="confpwd" id="confpwd" required><br>

        <label for="gender">Gender</label>
        <select name="gender" id="gender" required>
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
        <input type="radio" name="caste" value="General" id="general"><label for="general" required>General</label>
        <input type="radio" name="caste" value="OBC" id="obc" required><label for="obc">OBC</label>
        <input type="radio" name="caste" value="SC" id="sc" required><label for="sc">SC</label>
        <input type="radio" name="caste" value="SD" id="sd" required><label for="sd">SD</label><br>

        <label for="">Languages</label>
        <input type="checkbox" name="language[]" value="Nepali" id="nepali"><label for="nepali">Nepali</label>
        <input type="checkbox" name="language[]" value="English" id="english"><label for="english">English</label>
        <input type="checkbox" name="language[]" value="Japanese" id="japanese"><label for="japanese">Japanese</label><br>

        <label for="address">Address:</label>
        <input type="text" name="address" id="address" required><br>
        <input type="submit" value="Register" name="register" >
    </form>
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