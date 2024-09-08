<!DOCTYPE html>
<html>

<head>
    <title>Board of Studies</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/Project/CSS/Modal.css">
    <!-- Importing Favicon Symbol -->
    <link rel="icon" type="image/x-icon" href="/Project/Images/logo.png">
</head>

<body>
    <?php

    $connect = mysqli_connect("localhost", "root", "", "department");
    if ($connect == false)  die("Error in Connecting with MySQL");


    $check_query = mysqli_query($connect, "SHOW TABLES LIKE 'board_of_studies';");
    $check = mysqli_fetch_array($check_query);
    if ($check == null) {
        $create_query = mysqli_query($connect, " CREATE TABLE board_of_studies( 
                    s_no INT(10) PRIMARY KEY AUTO_INCREMENT, 
                    name VARCHAR(100) , 
                    role VARCHAR(1000) , 
                    address VARCHAR(1000)
                );");
    }

    $name = $_POST['name'];
    $role = $_POST['role'];
    $address = $_POST['address'];
    $insert_query = mysqli_query(
        $connect,
        "INSERT INTO board_of_studies(name , role , address) VALUES ('$name' , '$role' , '$address');"
    );
    echo '<div class="background-page">';
    echo '<div class="modal-box">';
    if ($insert_query == true) {
        echo '<div class="modal-msg">Added Successfully</div>';
        echo '<a href="/Project/3.Board/board.php"> Ok </a>';
    } else {
        echo '<div class="modal-msg">Cannot Added SuccessFully</div>';
        echo '<div class="field padding-bottom--24">';
        echo '<input type="submit" name="submit" value="Ok">';
        echo '</div>';
    }
    echo '</div>';
    echo '</div>';


    ?>
</body>

</html>