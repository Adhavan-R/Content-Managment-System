<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="/Project/CSS/Gallery_view.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@1,500&display=swap" rel="stylesheet" />
    <title>Document</title>
    <!-- Importing Favicon Symbol -->
    <link rel="icon" type="image/x-icon" href="/Project/Images/logo.png">
</head>
<body>
    <?php
        $event_name = $_POST['event_name'];
    ?>
    <header>
        <a href="/Project/14.Gallery/gallery_album_view.php">Go Back</a>
        <div class="heading">
            <?php
                echo '<h2>'.$event_name.' Album </h2>';
            ?> 
        </div>
    </header>
    <div class="slot">
        <?php
            $dir_name = "Images/".$event_name;
            $images = array_diff(scandir($dir_name), array('..', '.'));
            $count = count($images);
            for($i = 2; $i < $count+2 ; $i++){
                echo'<img src="'.$dir_name.'/'.$images[$i].'" alt="'.$event_name.'">';
            }
        ?>
    </div>
    
    
</body>
</html>