<?php 
    require_once('video.classes.php');
    require_once('../admin_logs/admin_action.classes.php');
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $index = $_GET["index"];
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["action"] == "update") {
        $index = $_POST["index"];
        $_SESSION["video_collection"][$index]->set_title($_POST["title"]);
        $_SESSION["video_collection"][$index]->set_director($_POST["director"]);
        $_SESSION["video_collection"][$index]->set_genre($_POST["genre"]);
        $_SESSION["video_collection"][$index]->set_release_year($_POST["year"]);
        $_SESSION["video_collection"][$index]->set_copies($_POST["copies"]);
        $_SESSION["video_collection"][$index]->set_format($_POST["format"]);
        $_SESSION['admin_logs'][] = new AdminAction($_SESSION['adminID'], "Updated Video", date("Y-m-d h:i:sa"));
          
        header("Location: video_catalog.php");
        exit;
    }

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
        $video = $_SESSION['video_collection'][$index];
    ?>


    <form action="" method="post">
        <input type="hidden" name="action" value="update">
        <input type="hidden" name="index" value="<?php echo $_GET["index"]?>">
        
        Title: <input type="text" id="title" name="title" required
            value="<?php echo $video->get_title();?>">
        Director: <input type="text" id="director" name="director" required="required"
            value="<?php echo $video->get_director();?>">
        Genre: <input type="text" id="genre" name="genre" required
            value="<?php echo $video->get_genre();?>">
        Year Released: <input type="text" id="year" name="year" minlength='4' maxlength='4' required
            value="<?php echo $video->get_release_year();?>">
        No. of Copies: <input type="number" id="copies" name="copies" min='1' required
            value="<?php echo $video->get_copies();?>">
        Format: <select name="format" id="format" required="required">
            <option value="DVD"> DVD </option>
            <option value="Blu-ray"> Blu-ray </option>
            <option value="Digital"> Digital </option>
        </select>
        <input type="submit" value="Update Video">
    </form>

   
                
</body>
</html>