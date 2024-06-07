<?php

require_once "../rent/rent.classes.php";
require_once "../rent/rentCollection.classes.php";
require_once "../rent/VideoItem.classes.php";

include_once "../home/header.php";

$video = $_SESSION['profileList'][$_SESSION['userID']]['VideosRented']->getRentList();

if(isset($_GET['index'])){
    $index = $_GET['index'];
    $videoRented = $video[$index];
    $purchase_date = $videoRented->get_purchase_date();
    $due_date = $videoRented->get_due_date();

    $interval = $purchase_date->diff($due_date);
    $remaining_days = $interval->format('%a'); 
}



?>


<div class="card mt-5" style="width: 600px; margin: auto;">
    <div class="card-header">
        <p class="text-center"> RETURN VIDEO </p>
    </div>
    <div class="card-body text-center">
        <p> Are you sure you want to return? <?php echo $videoRented->get_video() ?> </p>
        <p class="" style="color: red"> You have remaning: <?php echo $remaining_days?> days left.
        </p>
    </div>
    <form action="return.inc.php" method="post">
        <div class="card-footer">
            <input type="hidden" name="index" value="<?php echo $index ?>">
            <input class="btn btn-block btn-danger" type="submit" value="Return">
        </div>
    </form>
</div>