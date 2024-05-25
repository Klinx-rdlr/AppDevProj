<?php 
    require_once('video.classes.php');
    require_once('../admin_logs/admin_action.classes.php');
    session_start();


    if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["action"] == "add") {
        $_SESSION['video_collection'][] = new Video(
            $_POST['title'],
            $_POST['director'],
            $_POST['genre'],
            $_POST['year'],
            $_POST['copies'],
            $_POST['format']
        );

        $_SESSION['admin_logs'][] = new AdminAction($_SESSION['adminID'], "Added Video", date("Y-m-d h:i:sa"));
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
    <form action="" method="post">
        <input type="hidden" name="action" value="add">
        Title: <input type="text" id="title" name="title" required>
        Director: <input type="text" id="director" name="director" required>
        Genre: <input type="text" id="genre" name="genre" required>
        Year Released: <input type="text" id="year" name="year" minlength='4' maxlength='4' required>
        No. of Copies: <input type="number" id="copies" name="copies" min='1' required>
        Format: <select name="format" id="format" required="required">
            <option value="DVD"> DVD </option>
            <option value="Blu-ray"> Blu-ray </option>
            <option value="Digital"> Digital </option>
        </select>
        <input type="submit" value="Add Video">
    </form>
    <a href="video_catalog.php">Back to Video Catalog</a>
    
</body>
</html>