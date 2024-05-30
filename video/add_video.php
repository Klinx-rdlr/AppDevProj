<?php 
    require('video.classes.php');
    require_once('../admin_logs/admin_action.classes.php');
    session_start();
    
    if (!isset($_SESSION['video_collection'])) {
        $_SESSION['video_collection'] = [];
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["action"] == "add") {
       
        // add new video 
        $_SESSION['video_collection'][] = new Video(
            strip_tags($_POST['title']),
            strip_tags($_POST['director']),
            strip_tags($_POST['summary']),
            strip_tags($_POST['starring']),
            strip_tags($_POST['genre']),
            $_POST['year'],
            $_POST['copies'],
            $_POST['format']
        );

        $video_collection_size = count($_SESSION['video_collection']);
      
        if (isset($_FILES["thumbnail"])) {
            if ($_FILES["thumbnail"]["error"] == UPLOAD_ERR_NO_FILE) {
                $_SESSION['video_collection'][$video_collection_size-1]->set_thumbnail("../thumbnails/no_poster_available.jpg");
            } else {
                $target_dir = "../thumbnails/";
                $target_file = $target_dir . basename($_FILES["thumbnail"]["name"]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                
                $_SESSION['video_collection'][$video_collection_size-1]->set_thumbnail($target_file);
                if (move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $target_file)) {
                    $_SESSION['video_collection'][$video_collection_size-1]->set_thumbnail($target_file);
                }  
            }
        }

        // record the addition of new video to admin logs
        $details = 
        "New Video<br>" . 
        "Title    : " . strip_tags($_POST['title']) . "<br>" .
        "Director : " . strip_tags($_POST['director']) . "<br>" .
        "Summary  : " . strip_tags($_POST['summary']) . "<br>" .
        "Starring : " . strip_tags($_POST['starring']) . "<br>" .
        "Genre    : " . strip_tags($_POST['genre']) . "<br>" .
        "Year     : " . $_POST['year'] . "<br>" .
        "Copies   : " . $_POST['copies'] . "<br>" .
        "Format   : " . $_POST['format'] . "<br>";

        $_SESSION['admin_logs'][] = new AdminAction($_SESSION['adminID'], 
            "Added Video", date("Y-m-d h:i:sa"), $details);
            
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
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="action" value="add">
        Title: <input type="text" id="title" name="title" required> <br>
        Director: <input type="text" id="director" name="director" required> <br>
        Summary: <textarea name="summary" id="summary" rows="5" cols="60"></textarea> <br>
        Starring: <input type="text" id="starring" name="starring"> <br>
        Genre: <input type="text" id="genre" name="genre" required> <br>
        Year Released: <input type="text" id="year" name="year" minlength='4' maxlength='4' required> <br>
        No. of Copies: <input type="number" id="copies" name="copies" min='1' required> <br>
        Format: <select name="format" id="format" required="required">
            <option value="DVD"> DVD </option>
            <option value="Blu-ray"> Blu-ray </option>
            <option value="Digital"> Digital </option>
        </select> <br>

        Video Thumbnail: <input type="file" id="thumbnail" name="thumbnail"> <br>
        <input type="submit" value="Add Video">
    </form>
    <a href="video_catalog.php">Back to Video Catalog</a>
    
</body>
</html>
