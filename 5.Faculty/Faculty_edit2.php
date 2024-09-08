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

    $s_no = $_POST['s_no'];
    $name = $_POST['name'];
    $degree = $_POST['degree'];
    $position = $_POST['position'];
    $insert_query = mysqli_query(
        $connect,
        "UPDATE faculty SET name = '$name' , degree = '$degree' , position = '$position' WHERE s_no = $s_no;"
    );
    echo '<div class="background-page">';
    echo '<div class="modal-box">';
    if ($insert_query == true) {
        echo '<div class="modal-msg">Edited Successfully</div>';
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