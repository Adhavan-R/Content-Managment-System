<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Lab Details</title>
  <link rel="stylesheet" href="/Project/CSS/Form.css" />
  <link rel="stylesheet" href="/Project/CSS/Modal.css" />
  <!-- Importing Favicon Symbol -->
  <link rel="icon" type="image/x-icon" href="/Project/Images/logo.png">
</head>

<body>
 
            <?php

                $connect = mysqli_connect("localhost", "root", "", "department");
                if ($connect == false)  die("Error in Connecting with MySQL");

                
                $check_query = mysqli_query($connect, "SHOW TABLES LIKE 'lab';");
                $check = mysqli_fetch_array($check_query);
                if ($check == null) {
                  $create_query = mysqli_query($connect, " CREATE TABLE lab( 
                        s_no INT(10) PRIMARY KEY, 
                        name VARCHAR(100) , 
                        file VARCHAR(1000) 
                        
                        );");
                }

                $rows = mysqli_query($connect, "SELECT * FROM lab;");
                $num_rows = mysqli_num_rows($rows);
                if ($num_rows == 0) {
                  die("No Data Found ! ");
                }
                $flag = 0;
                for ($i = 0; $i < $num_rows; $i++) {
                  $row = mysqli_fetch_array($rows);
                  if ((int)$_POST['s_no'] == (int)$row['s_no']) {
                    $s_no = $row['s_no'];
                    $flag = 1;
                  }
                  else{
                    $myarray[] = array("name" => $row['name'], "file" => $row['file']);
                  }
                }

                if ($flag == 1) {
                   

                    $truncate_query = mysqli_query(
                      $connect,
                      "TRUNCATE TABLE lab;"
                    );

                    for($i = 0; $i < $num_rows-1; $i++){
                        $insert_query = mysqli_query(
                          $connect,
                          "INSERT INTO lab(name ,file) VALUES ('".$myarray[$i]['name']."' , '".$myarray[$i]['file']."' );"
                        );
                    }
                    echo '<div class="background-page">';
                    echo '<div class="modal-box">';
                    if ($truncate_query == true) {
                        echo '<div class="modal-msg">Deleted Successfully</div>';
                        echo '<a href="/Project/6.Lab/Lab_Details.php"> Ok </a>';
                    } else {
                        echo '<div class="modal-msg">Cannot Addedd SuccessFully</div>';
                        echo '<div class="field padding-bottom--24">';
                        echo '<input type="submit" name="submit" value="Ok">';
                        echo '</div>';
                    }
                    echo '</div>';
                    echo '</div>';
                }else echo "Not Found Any Matching Data";
            ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>