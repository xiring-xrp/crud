<?php
    session_start();
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
    <title>Login Page</title>
</head>
<body>
    <main class="login">
        <form action="#" method="POST">
            <h1>Login</h1>
            <input class="input" type="text" name="username" placeholder="Username"><br>
            <input class="input" type="password" name="password" placeholder="Password"><br>
            <input id="login-btn" type="submit" name="login" value="Log in">
            <button class="signup-btn"><a href="signup.php">Sign up</a></button>
        </form>
    </main>
</body>
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
        // echo "Login Failed";
    }
?>