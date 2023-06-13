<?php
    session_start();
?>

<html>
    <head>
        <title>Display</title>
        <style>
            /* body{
                background-color: #34495E;
            } */
            table{
                background-color: white;
                padding: 20px;
                /* border: 3px solid black; */
                border-radius: 7px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.9);
                position: relative;
                top:25px;
            }
            .heading{
                color: white;
                font-size:25px;
                padding:10px;
                position: relative;
                top:20px;
                z-index: -1;
            }
            .update, .delete{
                background-color: #218721;
                color: white;
                cursor: pointer;
                border: none;
                border-radius: 5px;
                padding: 6px 15px;
                font-weight: bold;
            }
            .update:hover{
                background-color: #335b39;;
            }
            .delete{
                background-color: red;
            }
            .delete:hover{
                background-color: #b30b00;
            }
            .img{
                border-radius: 50px;
            }
            .table{
                text-align: center;
            }
            .link{
                padding: 10px 16px;
                border:1px solid black;
                border-radius: 5px;
                cursor: pointer;
                float: right;
                position: relative;
                top: 25px;
                right: 35px;
                background-color: #271b6c;
                color:white;
                font-weight: bold;
                font-size: 16px;
            }
        </style>
    </head>
    </html>

    <a href="logout.php"><input type="submit" value="LogOut" class="link"></a>

<?php
    include "connection.php";

    $username = $_SESSION['username'];

    if($username == true){

    }else{
        header('location: login.php');
    }

    $query = "SELECT * FROM user";
    $data = mysqli_query($conn, $query);

    $total = mysqli_num_rows($data);
    // echo $total;

    if($total != 0){

        ?>
            <h2 align="center" class="heading">User Records</h2>
            <table border="1px" cellspacing="7" align="center" width="100%">
                <tr>
                    <th width="3%">ID</th>
                    <th width="3%">Image</th>
                    <th width="7%">First Name</th>
                    <th width="7%">Last Name</th>
                    <th width="6%">Gender</th>
                    <th width="20%">Email</th>
                    <th width="8%">Phone</th>
                    <th width="7%">Caste</th>
                    <th width="15%">Language</th>
                    <th width="7%">Address</th>
                    <th width="14%">Opertaions</th>
                </tr>
        <?php
        while($result = mysqli_fetch_assoc($data)){
            echo "<tr class='table'>
                    <td>".$result['id']."</td>
                    <td><img src= '".$result['img_source']."' height='50px' width='50px' class='img'></td>
                    <td>".$result['firstname']."</td>
                    <td>".$result['lastname']."</td>
                    <td>".$result['gender']."</td>
                    <td>".$result['email']."</td>
                    <td>".$result['phone']."</td>
                    <td>".$result['caste']."</td>
                    <td>".$result['language']."</td>
                    <td>".$result['address']."</td>

                    <td><a href='update_design.php?id=$result[id]'><input type='submit' value='Update' class='update'></a>
                    <a href='delete.php?id=$result[id]'><input type='submit' value='Delete' class='delete' onclick = 'return checkDelete()'></a>
                    </td>
            </tr>";
        }
    }else{
        echo "No records found!!!";
    }
?>
</table>

<script>
    function checkDelete(){
        return confirm('Are you sure want to delete this record ?');
    }
</script>


echo "# crud" >> README.md
git init
git add README.md
git commit -m "first commit"
git branch -M main
git remote add origin https://github.com/xiring-xrp/crud.git
git push -u origin main