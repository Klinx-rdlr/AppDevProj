<?php 
    require_once('video.classes.php');
    require_once('../admin_logs/admin_action.classes.php');
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $index = $_GET["index"];
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["action"] == "delete") {
        unset($_SESSION["video_collection"][$_POST["index"]]);
        $_SESSION['admin_logs'][] = new AdminAction($_SESSION['adminID'], "Deleted Video", date("Y-m-d h:i:sa"));
        header("Location: video_catalog.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Video</title>
</head>
<body>
    <?php  
        $video = $_SESSION['video_collection'][$index];
        echo "<p> Are you sure you want to delete the video: <b>" . $video->get_title() . "</b>?</p>";
    ?>

    
    <form action="" method="post">
        <input type="hidden" name="action" value="delete">
        <input type="hidden" name="index" value="<?php echo $_GET["index"]?>">
        <button type="submit" value="Confirm Delete"> Confirm Delete </button>
    </form>
</body>
</html>