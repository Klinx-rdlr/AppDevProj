<?php 
    include_once "../home/header.php";
    require('video.classes.php');
    require_once('../admin_logs/admin_action.classes.php');
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    
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
            $_POST['dvd'],
            $_POST['blu_ray'],
            $_POST['uhd'], 
            $_POST['digital']
        );

        $video_collection_size = count($_SESSION['video_collection']);
        $genre = trim(strtolower($_POST['genre']));
        if (!in_array($genre, $_SESSION['genre_categories'])) {
            $_SESSION['genre_categories'][] = $genre; 
        }

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
        "No. of DVDs   : " . $_POST['dvd'] . "<br>" .
        "No. of Blu-rays   : " . $_POST['blu-ray'] . "<br>" .
        "No. of UHDs   : " . $_POST['uhd'] . "<br>" .
        "No. of Digital Copies   : " . $_POST['digital'] . "<br>";


        $_SESSION['admin_logs'][] = new AdminAction($_SESSION['adminID'], 
            "Added Video", date("Y-m-d h:i:sa"), $details);
            
        header("Location: video_catalog.php");
        exit;
           
    }
   
?>

<body>
    <script src="add_video.js"></script>
    <div class="row" style="width: 100%; margin: auto; margin-left: 140px; padding: 20px 80px 0px 80px;">
        <div class="col-6 card mt-2 mr-5 p-0" style="width: 600px;">
            <div class="card-header p-0">
                <p class="p-0 mt-1 mb-0 text-center" style="font-size: 22px;"> Add Video </p>
            </div>

            <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="action" value="add">
                <div class="card-body">
                    <div class="form-group">
                        <label for=""> Title: </label>
                        <input type="text" id="title" name="title" required>
                    </div>
                    <div class="form-group">
                        <label for=""> Director:</label>
                        <input type="text" id="director" name="director" required>
                    </div>

                    <div class="form-group">
                        <label for="summary"> Summary: </label>
                        <textarea name="summary" id="summary" rows="5" cols="60"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="">
                            Starring: </label>
                        <input type="text" id="starring" name="starring">
                    </div>

                    <div class="form-group">
                        <label for="">
                            Genre: </label>
                        <input type="text" id="genre" name="genre" required>
                    </div>

                    <div class="form-group">
                        <label for="">
                            Year Released: </label>
                        <input type="text" id="year" name="year" minlength='4' maxlength='4' required>
                    </div>

                    <div class="form-group">
                        <label for="">
                            No. of DVDs:</label>
                        <input type="number" id="dvd" name="dvd" required>
                    </div>

                    <div class="form-group">
                        <label for="">
                            No. of Blu-rays: </label>
                        <input type="number" id="blu_ray" name="blu_ray" required> <br>
                    </div>

                    <div class="form-group">
                        <label for="">
                            No. of UHDs:</label>
                        <input type="number" id="uhd" name="uhd" required> <br>
                    </div>

                    <div class="form-group">
                        <label for="">
                            No. of Digital:</label>
                        <input type="number" id="digital" name="digital" required> <br>
                    </div>

                    <div class="form-group">
                        <label for="">
                            Video Thumbnail:</label>
                        <input type="file" id="thumbnail" name="thumbnail"> <br>
                    </div>
                </div>

                <div class="card-footer">
                    <input class="btn btn-block btn-dark" type="submit" value="Add Video"
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
                    <img id="img-preview" src="" alt=""
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