<!DOCTYPE html>
<html>
    <head>
        <title>Publications</title>
        <link rel="stylesheet" href="/Project/CSS/Modal.css">
        <!-- Importing Favicon Symbol -->
    <link rel="icon" type="image/x-icon" href="/Project/Images/logo.png">
    </head>
    <body>
        <?php

            $connect = mysqli_connect("localhost","root","","department");
            if($connect == false)  die("Error in Connecting with MySQL");
            
            $check_query = mysqli_query($connect,"SHOW TABLES LIKE 'publication';");
            $check = mysqli_fetch_array($check_query);
            if($check == null){
                $create_query = mysqli_query( $connect ," CREATE TABLE publication( 
                    s_no INT(10) PRIMARY KEY AUTO_INCREMENT, 
                    title VARCHAR(100) ,  
                    company VARCHAR(100) ,  
                    amount VARCHAR(100) ,  
                    date VARCHAR(100) ,  
                    year VARCHAR(100) ,  
                    file VARCHAR(1000)
                );");
            }
            
            $flag = 1;
            $title = $_POST['title'];
            $company = $_POST['company'];
            $amount = $_POST['amount'];
            $date = $_POST['date'];
            $year = $_POST['year'];
            $file = basename($_FILES['file']['name']);
            $insert_query = mysqli_query($connect ,
                            "INSERT INTO publication (title ,company,amount,date,year, file) VALUES ('$title' ,'$company' ,'$amount' ,'$date' ,'$year' , '$file');"
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
                echo '<a href="/Project/9.Publication/Publication.php"> Ok </a>';
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