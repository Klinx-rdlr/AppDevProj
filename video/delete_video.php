<?php 
    require_once('video.classes.php');
    require_once('../admin_logs/admin_action.classes.php');
    include_once  "../home/header.php";

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $index = $_GET["index"];
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["action"] == "delete") {
        $deleted_video = $_SESSION["video_collection"][$_POST["index"]];

        // record deletion of video to admin logs
        $deleted_details =
        "DELETE DETAILS<br>" . 
        "Title: " . $deleted_video->get_title() . "<br>" .
        "Director: " . $deleted_video->get_director() . "<br>" .
        "Summary: " . $deleted_video->get_summary() . "<br>" .
        "Starring: " . $deleted_video->get_starring() . "<br>" .
        "Genre: " . $deleted_video->get_genre() . "<br>" .
        "Year: " . $deleted_video->get_release_year() . "<br>" .
        "DVD: " . $deleted_video->get_dvd() . "<br>" .
        "Blu-ray: " . $deleted_video->get_blu_ray() . "<br>" .
        "UHD: " . $deleted_video->get_uhd() . "<br>" .
        "Digital: " . $deleted_video->get_digital() . "<br>";

        unset($_SESSION["video_collection"][$_POST["index"]]);
        
        $_SESSION['admin_logs'][] = new AdminAction($_SESSION['adminID'], "Deleted Video", 
            date("Y-m-d h:i:sa"), $deleted_details);

        header("Location: video_catalog.php");
        exit;
    }
?>

<body>

    <div class="card mt-4" style="margin: auto; width: 500px;">
        <div class="card-header">
            <p class="p-0 mt-1 mb-0 text-center" style="font-size: 22px;"> DELETE VIDEO</p>
        </div>
        <div class="card-body">
            <?php  
        $video = $_SESSION['video_collection'][$index];
        echo "<p class='text-center'> Are you sure you want to delete the video: <b>" . $video->get_title() . "</b>?</p>";
      ?>
            <form action="" method="post">
                <input type="hidden" name="action" value="delete">
                <input type="hidden" name="index" value="<?php echo $_GET["index"]?>">

        </div>

        <div class="card-footer">
            <button class="btn btn-block btn-dark" type="submit" value="Confirm Delete"> Confirm Delete </button>
            </form>

        </div>
    </div>


</body>

</html>