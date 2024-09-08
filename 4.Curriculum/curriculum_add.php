<!DOCTYPE html>
<html>
    <head>
        <title>Curriculum</title>
        <link rel="stylesheet" href="/Project/CSS/Modal.css">
        <!-- Importing Favicon Symbol -->
    <link rel="icon" type="image/x-icon" href="/Project/Images/logo.png">
    </head>
    <body>
        <?php

            $connect = mysqli_connect("localhost","root","","department");
            if($connect == false)  die("Error in Connecting with MySQL");
            
            $check_query = mysqli_query($connect,"SHOW TABLES LIKE 'curriculum';");
            $check = mysqli_fetch_array($check_query);
            if($check == null){
                $create_query = mysqli_query( $connect ," CREATE TABLE curriculum( 
                    s_no INT(10) PRIMARY KEY AUTO_INCREMENT, 
                    name VARCHAR(100) ,  
                    file VARCHAR(1000)
                );");
            }
            
            $flag = 1;
            $name = $_POST['name'];
            $file = basename($_FILES['file']['name']);
            $insert_query = mysqli_query($connect ,
                            "INSERT INTO curriculum (name , file) VALUES ('$name' , '$file');"
                            );

            $phpFileUploadErrors = array(
                0 => 'There is no error, the file uploaded with success',
                1 => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
                2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
                3 => 'The uploaded file was only partially uploaded',
                4 => 'No file was uploaded',
                6 => 'Missing a temporary folder',
                7 => 'Failed to write file to disk.',
                8 => 'A PHP extension stopped the file upload.',
            );

            $file_name = "Files/" . $file;
            if(!move_uploaded_file($_FILES['file']['tmp_name'], $file_name)){
                $flag = 0;
                echo ($phpFileUploadErrors[$_FILES['file']['error']]);
            }
            
            echo '<div class="background-page">';
            echo '<div class="modal-box">';
            if ($insert_query == true) {
                echo '<div class="modal-msg">Added Successfully</div>';
                echo '<a href="/Project/4.Curriculum/curriculum.php"> Ok </a>';
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