<?php
    include "connection.php";

    $id = $_GET['id'];
    
    $query = "DELETE FROM user WHERE id = $id";
    $data = mysqli_query($conn, $query);

    if($data){
        echo "<script>alert('Record Deleted from Database!')</script>";
        ?>

            <meta http-equiv="refresh" content="0; url= http://localhost/crud/display.php" />

        <?php
    }else{
        echo "<script>alert('Failed to Delete')</script>";
    }
?>