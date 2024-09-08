<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Publications</title>
  <link rel="stylesheet" href="/Project/CSS/Form.css" />
  <!-- Importing Favicon Symbol -->
  <link rel="icon" type="image/x-icon" href="/Project/Images/logo.png">
</head>

<body>
  <div class="login-root">
    <div class="box-root flex-flex flex-direction--column" style="min-height: 100vh; flex-grow: 1">
      <div class="loginbackground box-background--white padding-top--64">
        <div class="loginbackground-gridContainer">
          <div class="box-root flex-flex" style="grid-area: top / start / 8 / end">
            <div class="box-root" style="
                  background-image: linear-gradient(
                    white 0%,
                    rgb(247, 250, 252) 33%
                  );
                  flex-grow: 1;
                ">
            </div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 4 / 2 / auto / 5">
            <div class="box-root box-divider--light-all-2 animationLeftRight tans3s" style="flex-grow: 1"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 6 / start / auto / 2">
            <div class="box-root box-background--blue800" style="flex-grow: 1"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 7 / start / auto / 4">
            <div class="box-root box-background--blue animationLeftRight" style="flex-grow: 1"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 8 / 4 / auto / 6">
            <div class="box-root box-background--gray100 animationLeftRight tans3s" style="flex-grow: 1"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 2 / 15 / auto / end">
            <div class="box-root box-background--cyan200 animationRightLeft tans4s" style="flex-grow: 1"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 3 / 14 / auto / end">
            <div class="box-root box-background--blue animationRightLeft" style="flex-grow: 1"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 4 / 17 / auto / 20">
            <div class="box-root box-background--gray100 animationRightLeft tans4s" style="flex-grow: 1"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 5 / 14 / auto / 17">
            <div class="box-root box-divider--light-all-2 animationRightLeft tans3s" style="flex-grow: 1"></div>
          </div>
        </div>
      </div>
      <div class="box-root padding-top--24 flex-flex flex-direction--column" style="flex-grow: 1; z-index: 9">
        <div class="box-root padding-top--48 padding-bottom--24 flex-flex flex-justifyContent--center">
          <h1>Publications</h1>
        </div>
        <div class="formbg-outer">
          <div class="formbg">
            <div class="formbg-inner padding-horizontal--48">
            <?php

                $connect = mysqli_connect("localhost", "root", "", "department");
                if ($connect == false)  die("Error in Connecting with MySQL");

                $check_query = mysqli_query($connect, "SHOW TABLES LIKE 'publication';");
                $check = mysqli_fetch_array($check_query);
                if ($check == null) {
                    $create_query = mysqli_query($connect, " CREATE TABLE publication( 
                                s_no INT(10) PRIMARY KEY AUTO_INCREMENT, 
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
                        $title = $row['title'];
                        $company = $row['company'];
                        $amount = $row['amount'];
                        $date = $row['date'];
                        $year = $row['year'];
                        $file = $row['file'];
                        $flag = 1;
                    }
                }
              if ($flag == 1) {
                $form = <<<ANYTHING
                    <form id="stripe-login" action="publication_edit2.php" method="post" enctype="multipart/form-data">
                    <div class="field padding-bottom--24">
                        <label for="s_no">
                            Serial No :
                        </label>
                        <input type="text" name="s_no" value = "$s_no" readonly>
                    </div>  
                     <div class="field padding-bottom--24">
                         <label for="title"> Title : </label>
                         <input type="text" name="title" value="$title"/>
                      </div>
                      <div class="field padding-bottom--24">
                         <label for="company"> Company : </label>
                         <input type="text" name="company" value="$company"/>
                      </div>
                      <div class="field padding-bottom--24">
                         <label for="amount"> Amount : </label>
                         <input type="text" name="amount" value="$amount"/>
                      </div>
                      <div class="field padding-bottom--24">
                         <label for="date"> Date : </label>
                         <input type="text" name="date" value="$date"/>
                      </div>
                      <div class="field padding-bottom--24">
                            <label for="year"> Year : </label>
                            <input type="text" name="year" value="$year"/>
                      </div>
                      <div class="field padding-bottom--24">
                        <label for="file">
                            File Name : 
                        </label>
                        <input type="file" name="file" >
                      </div>
                      <div class="field padding-bottom--24">
                        <Button type="submit" name="old_file" value="$file">Submit</Button>
                        <Button type="reset" value="Reset">Reset</Button>
                      </div>
                    </form>
                    ANYTHING;
                echo $form;
              } else echo "Not Found Any Matching Data";
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>