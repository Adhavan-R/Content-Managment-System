<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
  <title>Board of Studies</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- Imoprting Page AND Table CSS-->
  <link rel="stylesheet" href="/Project/CSS/Page.css" />
  <link rel="stylesheet" href="/Project/CSS/Album_View.css" />
  

  <!-- Importing Lato Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@1,500&display=swap" rel="stylesheet" />

  <!-- Importing Poppins Font -->
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&family=Poppins:wght@300&display=swap" rel="stylesheet" />

  <!-- Importing Dropdown Symbol -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
  <!-- Importing Favicon Symbol -->
  <link rel="icon" type="image/x-icon" href="/Project/Images/logo.png">
</head>

<body>
  <nav>
  <a href="/Project/1.Home/Home.html">
        <div class="logo">
          <img class="logo-img" src="/Project/Images/logo.png" alt="hlo">
       </div>
       <div class="logo-content">KRCE-IT</div>
      </a>
    <a href="/Project/1.Home/Home.html">Home</a>
    <a href="/Project/2.PEO/PEO.html">PEO,PO & PSO</a>
    <a href="/Project/3.Board/board.php">Board of Studies</a>
    <a href="/Project/4.Curriculum/curriculum.php">Curriculum Details</a>
    <a href="/Project/5.Faculty/Faculty_Member.php">Faculty Members</a>
    <a href="/Project/6.Lab/Lab_Details.php">Laboratory Details</a>
    <a href="/Project/7.Research/Research.php">Research</a>
    <div class="dropdown">
      <button class="more">More</button>
      <div class="dropdown-content">
        <a href="/Project/9.Publication/Publication.php">Publications</a>
        <a href="/Project/10.MOU/MOU.php">MOU</a>
        <a href="/Project/11.Consultancy/Consultancy.php">Consultancy</a>
        <a href="/Project/13.Activities/Activities.php">
          Activities
        </a>
        <a href="/Project/14.Gallery/gallery_album_view.php">Events Gallery</a>
      </div>
    </div>
    <div class="material-symbols-outlined">arrow_drop_down</div>
  </nav>
  <div class="container" style="height: 402px;">
    <img class="thumbnail" src="/Project/Images/Gallery.jpg" alt="hlo">
    <div class="heading">Gallery</div>
  </div>
  <section>
    <h2 s>Events</h2>
      <?php
      $flag = 1;
      $connect = mysqli_connect("localhost", "root", "", "department");
      if ($connect == false) {
        echo ("Error in Connecting with MySQL");
        $flag = 0;
      };

      $check_query = mysqli_query($connect, "SHOW TABLES LIKE 'gallery';");
      $check = mysqli_fetch_array($check_query);
      if ($check == null) {
        $flag = 0;
      }
      if ($flag) {
        $rows = mysqli_query($connect, "SELECT * FROM gallery;");
        $num_rows = mysqli_num_rows($rows);

        echo '<form action="gallery_image_view.php" method="post">';
        echo ' <div class="container1">';
        for ($i = 0; $i < $num_rows; $i++) {
          $row = mysqli_fetch_array($rows);
          $event_name = $row['event_name'];
          $photos = scandir("Images/$event_name");
          $tray =<<<ANYTHING
          <div class="tray1">
            <div class="thumbnail1">
              <img class="img-tray" src="Images/$event_name/$photos[2]">
            </div>
            <div class = "button1">
              <button class="tray-title" name="event_name" type="submit"       value="$event_name">
                $event_name
              </button>
            </div>
          </div>
          ANYTHING;
          echo $tray;
        }
        echo '</div>';
        echo '</form>';
      }

      ?>
    <?php
    if ($_SESSION['user'] == 'teacher') {
      $form = <<<ANYTHING
      <div class="add">
      <button onclick="display_add()">
        <img src="/Project/Images/add.png" class="add">
      </button>
      <p>Add Album</p>
      </div>
      <div id="add_album">
        <form action="gallery_add_album.php" method="post">
          <label for="event_name">
            Album Name :
          </label>
          <input type="text" name="event_name">
          <button type="submit">Add Album</button>
        </form>
      </div>
      ANYTHING;
      echo $form;
    }
    ?>
  </section>
  <footer>
  <div class="foot-content">2023 © K. Ramakrishnan college of Engineering All Rights Reserved.</div>
  </footer>
  <script>
    function display_add(){
      var foo = document.getElementById('add_album');
      if(foo.style.display == ''){
        foo.style.display = 'block';
      }
      else if(foo.style.display == 'none'){
        foo.style.display = 'block';
      }
      else{
        foo.style.display = 'none';
      }
    }
  </script>
</body>

</html>

