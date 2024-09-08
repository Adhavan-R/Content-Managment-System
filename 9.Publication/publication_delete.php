<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Publications</title>
  <link rel="stylesheet" href="/Project/CSS/Form.css" />
  <link rel="stylesheet" href="/Project/CSS/Modal.css" />
  <!-- Importing Favicon Symbol -->
  <link rel="icon" type="image/x-icon" href="/Project/Images/logo.png">
</head>

<body>
  
            <?php

                $connect = mysqli_connect("localhost", "root", "", "department");
                if ($connect == false)  die("Error in Connecting with MySQL");

                
                $check_query = mysqli_query($connect, "SHOW TABLES LIKE 'publication';");
                $check = mysqli_fetch_array($check_query);
                if ($check == null) {
                  $create_query = mysqli_query($connect, " CREATE TABLE publication( 
                        s_no INT(10) PRIMARY KEY, 
                        title VARCHAR(100) ,  
                        company VARCHAR(100) ,  
                        amount VARCHAR(100) ,  
                        date VARCHAR(100) ,  
                        year VARCHAR(100) ,  
                        file VARCHAR(1000)
                        );");
                }

                $rows = mysqli_query($connect, "SELECT * FROM publication ;");
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
                    $myarray[] = array("title" => $row['title'], "company" => $row['company'], "amount" => $row['amount'],"date" => $row['date'],"year" => $row['year'],"file" => $row['file']);
                  }
                }

                if ($flag == 1) {
                   

                    $truncate_query = mysqli_query(
                      $connect,
                      "TRUNCATE TABLE publication;"
                    );

                    for($i = 0; $i < $num_rows-1; $i++){
                        $insert_query = mysqli_query(
                          $connect,
                          "INSERT INTO publication( title,company,amount,date,year,file) VALUES ('".$myarray[$i]['title']."' , '".$myarray[$i]['company']."' , '".$myarray[$i]['amount']."','".$myarray[$i]['date']."','".$myarray[$i]['year']."','".$myarray[$i]['file']."');"
                        );
                    }
                    echo '<div class="background-page">';
                    echo '<div class="modal-box">';
                    if ($truncate_query == true) {
                        echo '<div class="modal-msg">Deleted Successfully</div>';
                        echo '<a href="/Project/9.Publication/Publication.php"> Ok </a>';
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