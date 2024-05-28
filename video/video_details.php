<?php
    require_once "video.classes.php";
    session_start(); 
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $video = $_SESSION['video_collection'][$_GET['index']];
    ?>

    <!-- Display Video Information --> 
    <div class="thumbnail">
        <img src="<?php echo $video->get_thumbnail(); ?>" alt="Thumbnail">
    </div>
    <h1> <?php echo $video->get_title(); ?> </h1>
    <p> Diretor: <?php echo $video->get_director(); ?> </p>
    <p> Starring: <?php echo $video->get_starring(); ?> </p>
    <p> Genre : <?php echo $video->get_genre(); ?> </p>
    <p> Release Year : <?php echo $video->get_release_year(); ?> </p>
    <p> Copies Available : <?php echo $video->get_copies(); ?> </p>

    <div class="summary">
        <h2> Summary: </h2>
        <p> <?php echo $video->get_summary(); ?> </p>
    </div>

    <!-- link to Rent Page -->
    <!-- Make sure Rent Page can be only accessed if user is logged in -->
    <button onclick="location.href='../rent/rent_page.php'" type="button">
        Rent
    </button> <br>

    <a href="../home/index.php"> Return Home </a>
</body>
</html>