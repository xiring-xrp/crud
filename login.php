<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>
<body>
    <form action="#" method="POST">
        <h1>Login</h1>
        <input type="text" name="username" placeholder="Username"><br>
        <input type="password" name="password" placeholder="Password"><br>
        <input type="submit" name="login" value="Login">

        <div class="forget"><a href="#" onclick="message()">Forget password?</a></div>

        <div class="sign">New Member?<a href="form.php">SignIn</a> here</div>
    </form>
</body>
<script>
    function message(){
        alert("Try to remember your password!");
    }
</script>
</html>

<?php
    include "connection.php";

    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
    }

    $query = "SELECT * FROM user WHERE email = '$username' && password = '$password' ";
    $data = mysqli_query($conn, $query);
    
    $total = mysqli_num_rows($data);

    if($total == 1){

        $_SESSION['username'] = $username;
        header('location: display.php');
        
    }else{
        echo "Login Failed";
    }
?>