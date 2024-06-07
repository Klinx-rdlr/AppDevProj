<?php 
    require_once('video.classes.php');
    require_once('../admin_logs/admin_action.classes.php');
    include_once "../home/header.php";

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


<body>
    <?php 
        $video = $_SESSION['video_collection'][$index];
    ?>
    <script src="update_video.js"></script>
    <div class="row" style="width: 100%; margin: auto; margin-left: 140px; padding: 20px 80px 0px 80px;">
        <div class="col-6 card mt-2 mr-5 p-0" style="width: 600px;">
            <div class="card-header p-0">
                <p class="p-0 mt-1 mb-0 text-center" style="font-size: 22px;"> Edit Video </p>
            </div>

            <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="action" value="update">
                <input type="hidden" name="index" value="<?php echo $_GET["index"]?>">
                <div class="card-body">
                    <div class="form-group">
                        <label for=""> Title: </label>
                        <input type="text" id="title" name="title" required value="<?php echo $video->get_title();?>">
                    </div>
                    <div class="form-group">
                        <label for=""> Director:</label>
                        <input type="text" id="director" name="director" required
                            value="<?php echo $video->get_director();?>">
                    </div>

                    <div class="form-group">
                        <label for="summary"> Summary: </label>
                        <textarea name="summary" id="summary" rows="5" cols="60">
                        <?php echo $video->get_summary();?>
                        </textarea>
                    </div>

                    <div class="form-group">
                        <label for="">
                            Starring: </label>
                        <input type="text" id="starring" name="starring" value="<?php echo $video->get_starring();?>">
                    </div>

                    <div class="form-group">
                        <label for="">
                            Genre: </label>
                        <input type="text" id="genre" name="genre" required value="<?php echo $video->get_genre();?>">
                    </div>

                    <div class="form-group">
                        <label for="">
                            Year Released: </label>
                        <input type="text" id="year" name="year" minlength='4' maxlength='4' required
                            value="<?php echo $video->get_release_year();?>">
                    </div>

                    <div class="form-group">
                        <label for="">
                            No. of DVDs:</label>
                        <input type="number" id="dvd" name="dvd" required value="<?php echo $video->get_dvd();?>">
                    </div>

                    <div class="form-group">
                        <label for="">
                            No. of Blu-rays: </label>
                        <input type="number" id="blu_ray" name="blu_ray" required
                            value="<?php echo $video->get_blu_ray();?>"> <br>
                    </div>

                    <div class="form-group">
                        <label for="">
                            No. of UHDs:</label>
                        <input type="number" id="uhd" name="uhd" required value="<?php echo $video->get_uhd();?>"> <br>
                    </div>

                    <div class="form-group">
                        <label for="">
                            No. of Digital:</label>
                        <input type="number" id="digital" name="digital" required
                            value="<?php echo $video->get_digital();?>"> <br>
                    </div>

                    <div class="form-group">
                        <label for="">
                            Video Thumbnail:</label>
                        <input type="file" id="thumbnail" name="thumbnail"> <br>
                    </div>
                </div>

                <div class="card-footer">
                    <input class="btn btn-block btn-dark" type="submit" value="Edit Video"
                        style="width: 500px; margin-left: 35px;">
                    <button class="btn btn-block bg-olive" onclick="location.href='video_catalog.php'"
                        style="width: 500px; margin-left: 35px;">Back to Video
                        Catalog </button>
                </div>
            </form>


        </div>

        <div class="col-6 card mt-2 p-0" style="width: 600px; height: 600px">
            <div class="card-header p-0">
                <p class="p-0 mt-1 mb-1 text-center" style="font-size: 22px;"> Thumbnail Preview </p>
            </div>

            <div class="card-body bg-dark">
                <div class="img-container mt-1" style="margin-left: 135px;">
                    <img id="img-preview" src="<?php echo $video->get_thumbnail(); ?>" alt=""
                        style="height: 450px; box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);">
                </div>
            </div>
            <div class="card-footer">

            </div>
        </div>

    </div>
    </div>
</body>

</html>