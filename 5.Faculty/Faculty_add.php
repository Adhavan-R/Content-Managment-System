<!DOCTYPE html>
<html>

<head>
    <title>Faculty Member</title>
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


    $check_query = mysqli_query($connect, "SHOW TABLES LIKE 'faculty';");
    $check = mysqli_fetch_array($check_query);
    if ($check == null) {
        $create_query = mysqli_query($connect, " CREATE TABLE faculty( 
                    s_no INT(10) PRIMARY KEY AUTO_INCREMENT, 
                    name VARCHAR(100) , 
                    degree VARCHAR(1000) , 
                    position VARCHAR(1000)
                );");
    }

    $name = $_POST['name'];
    $degree = $_POST['degree'];
    $position = $_POST['position'];
    $insert_query = mysqli_query(
        $connect,
        "INSERT INTO faculty(name , degree , position) VALUES ('$name' , '$degree' , '$position');"
    );
    echo '<div class="background-page">';
    echo '<div class="modal-box">';
    if ($insert_query == true) {
        echo '<div class="modal-msg">Added Successfully</div>';
        echo '<a href="/Project/5.Faculty/Faculty_Member.php"> Ok </a>';
    } else {
        echo '<div class="modal-msg">Cannot Addedd SuccessFully</div>';
        echo '<div class="field padding-bottom--24">';
        echo '<input type="submit" name="submit" value="Ok">';
        echo '</div>';
    }
    echo '</div>';
    echo '</div>';


    ?>
</body>

</html>