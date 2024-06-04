<?php
require_once "../video/video.classes.php";
include_once "../home/header.php";
$index = $_GET["index"];
$title = $_SESSION['video_collection'][$index]->get_title();

?>

<div class="rent card" style="width: 400px; margin: 100px auto;">
    <div class="card-header">
        <h3 class="text-center"> RENT </h3>
    </div>

    <?php 
        $video = $_SESSION['video_collection'][$_GET['index']]; 
        $dvd_copies = $video->get_dvd();
        $blu_ray_copies =  $video->get_blu_ray();
        $uhd_copies = $video->get_uhd();
        $digital_copies = $video->get_digital();
    ?> 

    <form action="rent_page.inc.php?index=<?php echo $index?>" method="post">
        <div class="card-body">
            <label for=""> Format </label> <br> 
            
            DVD - Available: <?php echo $dvd_copies; ?> <br>
            <input type="number" name="dvd" id="dvd" min=0 max="<?php echo $dvd_copies;?>">  <br> 
            
            Blu-ray - Available: <?php echo $blu_ray_copies; ?> <br> 
            <input type="number" name="blu_ray" id="blu_ray" min=0 max="<?php echo $blu_ray_copies;?>"> <br>

            UHD - Available: <?php echo $uhd_copies; ?> <br> 
            <input type="number" name="uhd" id="uhd" min=0 max="<?php echo $uhd_copies;?>"> <br>

            Digital - Available: <?php echo $digital_copies; ?> <br> 
            <input type="number" name="digital" id="digital" min=0 max="<?php echo $digital_copies;?>"> <br> <br>

            <label for=""> Rent Duration </label> <br> 

            <select class="form-select" name="rent_duration"> 
                <option value="1"> 1 day </option>
                <option value="3"> 3 days </option>
                <option value="7"> 7 days </option>
                <option value="14"> 14 days </option>
                <option value="30"> 30 days</option>
            
            <input class="btn btn-block btn-dark mt-3" type="submit" value="Choose">

        </div>                
    </form>



</div>