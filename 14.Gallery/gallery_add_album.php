<!DOCTYPE html>
<html>
    <head>
        <title>Gallery</title>
        <link rel="stylesheet" href="/Project/CSS/Gallery_Modal.css">
        <link rel="stylesheet" href="/Project/CSS/Form.css">
        <!-- Importing Favicon Symbol -->
    <link rel="icon" type="image/x-icon" href="/Project/Images/logo.png">
    </head>
    <body>
        <?php
            $connect = mysqli_connect("localhost","root","","department");
            if($connect == false)  die("Error in Connecting with MySQL");

            $event_name = $_POST['event_name'];

            $check_query = mysqli_query($connect,"SHOW TABLES LIKE 'gallery';");
            $check = mysqli_fetch_array($check_query);
            if($check == null){
                mysqli_query( $connect ,"CREATE TABLE gallery( 
                    s_no INT(10) PRIMARY KEY AUTO_INCREMENT, 
                    event_name VARCHAR(1000) NOT NULL
                );");
            }

            $flag = 0;
            $result = mysqli_query($connect , "SELECT * FROM gallery");
            $num_rows = mysqli_num_rows($result);
            for($i = 0 ; $i < $num_rows ; $i++){
                $row = mysqli_fetch_array($result);
                if($row['event_name'] == $event_name){
                    $flag = 1;
                    die("Event Name is Already There ");
                }
            }
            if($flag == 0){
                mysqli_query($connect , "INSERT INTO gallery(event_name) VALUES ('$event_name');");
                mkdir("Images/$event_name");
                echo '<div id="modal-box">';
                echo '<div class="modal-msg">Album Created Successfully</div>';
                echo '<button onclick = "closed()"> Ok </a>';
                echo '</div>';
            
            } 
        ?>
        <div class="login-root" id = "login">
          <div class="box-root flex-flex flex-direction--column" style="min-height: 100vh;      flex-grow: 1">
            <div class="loginbackground box-background--white padding-top--64">
              <div class="loginbackground-gridContainer">
                <div class="box-root flex-flex" style="grid-area: top / start / 8 / end">
                  <div class="box-root" style="
                        background-image: linear-gradient(
                          white 0%,
                          rgb(247, 250, 252) 33%
                        );
                        flex-grow: 1;
                      "></div>
                </div>
                <div class="box-root flex-flex" style="grid-area: 4 / 2 / auto / 5">
                  <div class="box-root box-divider--light-all-2 animationLeftRight tans3s"      style="flex-grow: 1"></div>
                </div>
                <div class="box-root flex-flex" style="grid-area: 6 / start / auto / 2">
                  <div class="box-root box-background--blue800" style="flex-grow: 1"></div>
                </div>
                <div class="box-root flex-flex" style="grid-area: 7 / start / auto / 4">
                  <div class="box-root box-background--blue animationLeftRight" style="flex-grow:       1"></div>
                </div>
                <div class="box-root flex-flex" style="grid-area: 8 / 4 / auto / 6">
                  <div class="box-root box-background--gray100 animationLeftRight tans3s"       style="flex-grow: 1"></div>
                </div>
                <div class="box-root flex-flex" style="grid-area: 2 / 15 / auto / end">
                  <div class="box-root box-background--cyan200 animationRightLeft tans4s"       style="flex-grow: 1"></div>
                </div>
                <div class="box-root flex-flex" style="grid-area: 3 / 14 / auto / end">
                  <div class="box-root box-background--blue animationRightLeft" style="flex-grow:       1"></div>
                </div>
                <div class="box-root flex-flex" style="grid-area: 4 / 17 / auto / 20">
                  <div class="box-root box-background--gray100 animationRightLeft tans4s"       style="flex-grow: 1"></div>
                </div>
                <div class="box-root flex-flex" style="grid-area: 5 / 14 / auto / 17">
                  <div class="box-root box-divider--light-all-2 animationRightLeft tans3s"      style="flex-grow: 1"></div>
                </div>
              </div>
            </div>
            <div class="box-root padding-top--24 flex-flex flex-direction--column" style="flex-grow:        1; z-index: 9">
              <div class="box-root padding-top--48 padding-bottom--24 flex-flex         flex-justifyContent--center">
                <h1>Please Add Photots To Your Album !</h1>
              </div>
              <div class="formbg-outer">
                <div class="formbg">
                  <div class="formbg-inner padding-horizontal--48">
                    <form id="stripe-login" action="gallery_add_image.php" method="post"        enctype="multipart/form-data">
                      <div class="field padding-bottom--24">
                        <label for="file"> Upload File : </label>
                        <input name="images[]" type="file"  multiple>
                      </div>
                      <div class="field padding-bottom--24">
                        <?php
                            echo '<Button type="submit" name="event_name" value="'.$event_name.     '">Submit</Button>';
                        ?>
                        <Button type="reset" value="Reset">Reset</Button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <script>
            function closed(){
                var modal = document.getElementById("modal-box");
                modal.style.display = "none";
                document.body.style.backgroundColor = "white";
                document.body.style.display = "block";
                var login = document.getElementById("login");
                login.style.display = "block";
            }
        </script>
    </body>
</html>

