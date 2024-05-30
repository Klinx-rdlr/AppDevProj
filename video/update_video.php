<?php 
    require_once('video.classes.php');
    require_once('../admin_logs/admin_action.classes.php');
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $index = $_GET["index"];
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["action"] == "update") {
        $index = $_POST["index"];

        // video being edited
        $old_video = $_SESSION["video_collection"][$index];

        // updated information
        $title = strip_tags($_POST["title"]);
        $director = strip_tags($_POST["director"]);
        $summary = strip_tags($_POST["summary"]);
        $starring = strip_tags($_POST["starring"]);
        $genre = strip_tags($_POST["genre"]);
        $dvd = $_POST['dvd'];
        $blu_ray = $_POST['blu_ray'];
        $uhd = $_POST['uhd']; 
        $digital = $_POST['digital'];

        $thumbnail; 

        if ($old_video->is_set_thumbnail()) {
            $thumbnail = $old_video->get_thumbnail();
        } else {
            $thumbnail = "No Image";
        }

        $genre = trim(strtolower($_POST['genre']));
        if (!in_array($genre, $_SESSION['genre_categories'])) {
            $_SESSION['genre_categories'][] = $genre; 
        }
        
        if (isset($_FILES["thumbnail"])) {
            if ($_FILES["thumbnail"]["error"] == UPLOAD_ERR_NO_FILE) {
                $_SESSION['video_collection'][$index]->set_thumbnail("../thumbnails/no_poster_available.jpg");
            } else {

                $target_dir = "../thumbnails/";
                $target_file = $target_dir . basename($_FILES["thumbnail"]["name"]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                
                if (move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $target_file)) {
                    $_SESSION['video_collection'][$index]->set_thumbnail($target_thumbnail);
                }  
                $new_thumbnail = $target_file;
            }
            
        }

       
        
        // record the update of video to admin logs
        $update_details = 
        "UPDATE DETAILS<br>" .
        "Title: " . $old_video->get_title() . " -> " . $title . "<br>" .
        "Director: " . $old_video->get_director() . " -> " . $director . "<br>" .
        "Summary: " . $old_video->get_summary() . " -> " . $summary . "<br>" .
        "Starring: " . $old_video->get_starring() . " -> " . $starring . "<br>" .
        "Genre: " . $old_video->get_genre() . " -> " . $genre . "<br>" .
        "Year: " . $old_video->get_release_year() . " -> " . $_POST["year"] . "<br>" .
        "DVDs: " . $old_video->get_dvd() . " -> " . $dvd . "<br>" .
        "Blu-ray: " . $old_video->get_blu_ray() . " -> " . $blu_ray . "<br>" .
        "UHD: " . $old_video->get_uhd() . " -> " . $uhd . "<br>" .
        "Digital: " . $old_video->get_digital() . " -> " . $digital . "<br>" .
        "Thumbnail: " . $old_video->get_thumbnail() . " -> " . $new_thumbnail . "<br>";

        $_SESSION["video_collection"][$index]->set_title($title);
        $_SESSION["video_collection"][$index]->set_director($director);
        $_SESSION["video_collection"][$index]->set_summary($summary);
        $_SESSION["video_collection"][$index]->set_starring($starring);
        $_SESSION["video_collection"][$index]->set_genre($genre);
        $_SESSION["video_collection"][$index]->set_release_year($_POST["year"]);
        $_SESSION["video_collection"][$index]->set_dvd($dvd);
        $_SESSION["video_collection"][$index]->set_blu_ray($blu_ray);
        $_SESSION["video_collection"][$index]->set_uhd($uhd);
        $_SESSION["video_collection"][$index]->set_digital($digital);
        $_SESSION["video_collection"][$index]->set_thumbnail($new_thumbnail);

        
        $_SESSION['admin_logs'][] = new AdminAction($_SESSION['adminID'], "Updated Video", 
            date("Y-m-d h:i:sa"), $update_details);
          
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


    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="action" value="update">
        <input type="hidden" name="index" value="<?php echo $_GET["index"]?>">
        
        Title: <input type="text" id="title" name="title" required
            value="<?php echo $video->get_title();?>"> <br>
        Director: <input type="text" id="director" name="director" required="required"
            value="<?php echo $video->get_director();?>"> <br>
        Summary: <textarea name="summary" id="summary" rows="5" cols="60">
            <?php echo $video->get_summary();?>
        </textarea> <br>
        Starring: <input type="text" id="starring" name="starring" required
            value="<?php echo $video->get_starring();?>"> <br>
        Genre: <input type="text" id="genre" name="genre" required
            value="<?php echo $video->get_genre();?>"> <br>
        Year Released: <input type="text" id="year" name="year" minlength='4' maxlength='4' required
            value="<?php echo $video->get_release_year();?>"> <br>
        DVD: <input type="number" id="copies" name="copies" required
            value="<?php echo $video->get_dvd();?>"> <br>
        Blu-ray: <input type="number" id="copies" name="copies" required
            value="<?php echo $video->get_blu_ray();?>"> <br>
        UHD: <input type="number" id="copies" name="copies" required
            value="<?php echo $video->get_uhd();?>"> <br>
        Digital: <input type="number" id="copies" name="copies" required
            value="<?php echo $video->get_digital();?>"> <br>

        Video Thumbnail: <input type="file" id="thumbnail" name="thumbnail"> <br>
        <input type="submit" value="Update Video">
    </form>

</body>
</html>
