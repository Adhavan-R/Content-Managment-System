<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
  <title>Activtities</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- Imoprting Page AND Table CSS-->
  <link rel="stylesheet" href="/Project/CSS/Page.css" />
  <link rel="stylesheet" href="/Project/CSS/Table.css" />

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
        <a href="/Project/13.Activities/Activities.php">Activities</a>
        <a href="/Project/14.Gallery/gallery_album_view.php">Events Gallery</a>
      </div>
    </div>
    <div class="material-symbols-outlined">arrow_drop_down</div>
  </nav>
  <div class="container" style="height: 402px;">
    <img class="thumbnail" src="/Project/Images/Activity.jpg" alt="hlo" style="object-position: top
    ;" />
    <div class="heading">Activities</div>
  </div>
  <section>
    <div class="flx">
      <table class=" styled-table">
        <thead>
          <tr>
            <th>S.No</th>
            <th>Title</th>
            <th>Date</th>
            <th>Year</th>
            <th>File</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $flag = 1;
          $connect = mysqli_connect("localhost", "root", "", "department");
          if ($connect == false)  die("Error in Connecting with MySQL");


          $check_query = mysqli_query($connect, "SHOW TABLES LIKE 'activities';");
          $check = mysqli_fetch_array($check_query);
          if ($check == null) {
            $flag = 0;
          }
          if ($flag) {
            $rows = mysqli_query($connect, "SELECT * FROM activities ;");
            $num_rows = mysqli_num_rows($rows);
            for ($i = 0; $i < $num_rows; $i++) {
              $row = mysqli_fetch_array($rows);
              echo "<tr>";
              echo "<td>" . $row['s_no'] . "</td>";
              echo "<td>" . $row['title'] . "</td>";
              echo "<td>" . $row['date'] . "</td>";
              echo "<td>" . $row['year'] . "</td>";
              echo "<td>" . '<a href="Files/' . $row['file'] . '">' . $row['file'] . '</a>' . "</td>";
            }
          }
          ?>
        </tbody>
      </table>
    </div>
    <div class="flx">
    <?php
    if ($_SESSION['user'] == 'teacher') {
      $form = <<<ANYTHING
      <form action="activities_add_form.php">
          <button type="submit">Add</button>
      </form>
      <form action="activities_edit_form.php">
          <button type="submit">Edit</button>
      </form>
      <form action="activity_delete_form.php">
        <button type="submit" style="background-color:#e33653;">Delete</button>
      </form>
      ANYTHING;
      echo $form;
    }
    ?>
    </div>
  </section>
  <footer>
  <div class="foot-content">2023 © K. Ramakrishnan college of Engineering All Rights Reserved.</div>
  </footer>
</body>

</html>