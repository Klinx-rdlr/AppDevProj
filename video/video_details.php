<?php
    require_once "video.classes.php";
    include_once "../home/header.php";
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
.video-container {
    color: white;
}

.low-title {
    font-weight: 100;
}

.img-container {
    margin-top: 17px;
    margin-left: 100px;
    height: 420px;
    width: 320px;
}
</style>

<body>
    <?php
        $video = $_SESSION['video_collection'][$_GET['index']];
        $index =  $_GET['index'];
    ?>

    <div class="video-container row d-flex justify-content-center"
        style=" height: 500px; margin: 30px auto; width: 100%;">

        <div class="video-subcontainer" style="border-radius: 10px;">

            <ul style="list-style-type: none;">
                <li>
                    <div class=" video-placeholder row"
                        style="height: 480px; width: 1200px; margin: auto; background-color: white">
                        <div class="col-6" style="border:">
                            <div class="row" style="border: 1px solid black; background-color: #333333;">
                                <div class="d-flex title align-items-center">
                                    <h6 class="low-title ml-4" style="padding: 0px;"> GENRE: </h6>
                                    <h5 class="ml-3 low-title"> <?php echo $video->get_genre(); ?> </h3>
                                </div>
                            </div>
                            <div class="row" style="border: 1px solid black; background-color: #4F4F4F;">
                                <div class="second-title d-flex align-items-center">
                                    <h6 class="low-title ml-4" style="padding: 0"> DIRECTOR: </h6>
                                    <h5 class="ml-3 low-title">
                                        <?php echo $video->get_director(); ?>
                                        </h3>
                                </div>
                            </div>
                            <div class="row d-flex align-items-center"
                                style="border: 1px solid black; height:200px; background-color: #666666;">
                                <div class="second-title d-flex flex-column">
                                    <div class="d-flex align-items-center ">
                                        <h6 class="low-title ml-4" style="padding: 0"> TITLE: </h6>
                                        <p class="ml-4 low-title" style="font-size: 40px;">
                                            <?php echo $video->get_title(); ?>
                                        </p>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <h6 class="low-title ml-4" style="padding: 0"> STARRING: </h6>
                                        <p class="ml-2 low-title" style="font-size: 30px;">
                                            <?php echo $video->get_starring(); ?>
                                        </p>
                                    </div>

                                </div>
                            </div>

                            <div class="row d-flex"
                                style="border: 1px solid black; height:200px; background-color:#7F7F7F;">
                                <div class="second-title d-flex flex-column">
                                    <h5 class="mt-4 ml-4" style="padding: 0; height: 30px"> SUMMARY: </h5>
                                    <h5 class="low-title ml-4">
                                        <?php echo $video->get_summary(); ?>
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 bg-dark p-0" style="border: 1px solid black; height: 467px; width: 530px;">
                            <div class="thumbnail">
                                <img class="img-container" src="<?php echo $video->get_thumbnail(); ?>" alt="Thumbnail">
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <!-- link to Rent Page -->
    <!-- Make sure Rent Page can be only accessed if user is logged in -->
    <?php 
        if (isset($_SESSION["userID"])) {
            $location = "../rent/rent_page.php?index=$index";
        }
        else {
            $location = '../log_in/login.php';
        }
    ?>

    <?php if (isset($_SESSION["adminID"])): ?>
    <button class="btn btn-block btn-dark  rounded-pill px-3" style="width: 200px; margin-left: 750px"
        onclick="location.href='update_video.php?index=<?php echo $index; ?>'" type="button">
        Edit Video
    </button> <br>
    <?php elseif (!$video->is_available()): ?>
    <button class="btn btn-block rounded-pill px-3" style="background-color:red; width: 200px; margin-left: 750px"
        type="button">
        Rent Not Available
    </button> <br>
    <?php else: ?>
    <button class="btn btn-block btn-dark  rounded-pill px-3" style="width: 200px; margin-left: 750px"
        onclick="location.href='<?php echo $location; ?>'" type="button">
        Rent
    </button> <br>
    <?php endif; ?>
    <button class="btn btn-light rounded-pill px-3 mt-3" style="width: 200px; margin-left: 750px"
        onclick="location.href='../home/index.php'"> Return Home </button>


</html>