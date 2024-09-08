<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Board of Studies</title>
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
          <h1>Board of Studies</h1>
        </div>
        <div class="formbg-outer">
          <div class="formbg">
            <div class="formbg-inner padding-horizontal--48">
              <?php

              $connect = mysqli_connect("localhost", "root", "", "department");
              if ($connect == false)  die("Error in Connecting with MySQL");


              $check_query = mysqli_query($connect, "SHOW TABLES LIKE 'board_of_studies';");
              $check = mysqli_fetch_array($check_query);
              if ($check == null) {
                $create_query = mysqli_query($connect, " CREATE TABLE board_of_studies( 
                      s_no INT(10) PRIMARY KEY, 
                      name VARCHAR(100) , 
                      role VARCHAR(1000) , 
                      address VARCHAR(1000)
                      );");
              }

              $rows = mysqli_query($connect, "SELECT * FROM board_of_studies ;");
              $num_rows = mysqli_num_rows($rows);
              if ($num_rows == 0) {
                die("No Data Found ! ");
              }
              $flag = 0;
              for ($i = 0; $i < $num_rows; $i++) {
                $row = mysqli_fetch_array($rows);
                if ((int)$_POST['s_no'] == (int)$row['s_no']) {
                  $s_no = $row['s_no'];
                  $name = $row['name'];
                  $role = $row['role'];
                  $address = $row['address'];
                  $flag = 1;
                }
              }

              if ($flag == 1) {
                $form = <<<ANYTHING
                    <form id="stripe-login" action="board_edit2.php" method="post">
                      <div class="field padding-bottom--24">
                        <label for="name"> Name : </label>
                        <input type="text" name="name" value="$name"/>
                      </div>
                      <div class="field padding-bottom--24">
                        <label for="Role"> Role : </label>
                        <input type="text" name="role" value="$role"/>
                      </div>
                      <div class="field padding-bottom--24">
                        <label for="address"> Address : </label>
                        <input type="text" name="address" value="$address" />
                      </div>

                      <div class="field padding-bottom--24">
                        <Button type="submit" name="s_no" value="$s_no">Submit</Button>
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