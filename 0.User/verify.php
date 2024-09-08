<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/Project/CSS/Modal.css">
    <!-- Importing Favicon Symbol -->
    <link rel="icon" type="image/x-icon" href="/Project/Images/logo.png">
    <title>Document</title>
</head>

<body>
    <?php
    $connect = mysqli_connect("localhost", "root", "", "department");
    if ($connect == false)  die("Error in Connecting with MySQL");


    $check_query = mysqli_query($connect, "SHOW TABLES LIKE 'user';");
    $check = mysqli_fetch_array($check_query);

    $flag = 1;
    $flag2 = 0;
    if ($check == null) {
        $create_query = mysqli_query($connect, " CREATE TABLE user( 
                s_no INT(10) PRIMARY KEY AUTO_INCREMENT, 
                user_name VARCHAR(1000) , 
                password VARCHAR(1000)
            );");
    }
    $rows = mysqli_query($connect, "SELECT * FROM user ;");
    $num_rows = mysqli_num_rows($rows);
    if ($num_rows == 0) {
        echo "No User Found";
        $flag = 0;
    }
    if ($flag) {
        for ($i = 0; $i < $num_rows; $i++) {
            $row = mysqli_fetch_array($rows);
            if ($_POST['user_name'] == $row['user_name'] && $_POST['password'] == $row['password']) {

                $_SESSION['user'] = "teacher";
                echo "You Are Signed In";
                $flag2 = 1;
                header("Location: /Project/1.Home/Home.html");
                break;
            }
        }
        echo '<div class="background-page">';
         echo '<div class="modal-box">';
        if (!$flag2) {
            echo '<div class="modal-msg">Credentials Do Not Match</div>';
        echo '<a href="/Project/0.User/staff.php"> Ok </a>';
        }
        echo '</div>';
        echo '</div>';
    }
    ?>
</body>

</html>