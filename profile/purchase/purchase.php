<?php
    require_once "../../rent/rentCollection.classes.php";
    require_once "../../rent/rent.classes.php";
    include_once "../../home/header.php";

    //for debugging use;
    echo "<pre>";
    print_r($_SESSION["profileList"]);
    echo "</pre>";
?>


<div class="card mt-5" style="margin: auto; width: 900px">

    <div class="card-header">
        <h1 class="text-center"> User's Purchase History </h1>
    </div>
    <?php if(!empty($_SESSION['profileList'][$_SESSION['userID']]['VideosRented'])): ?>
    <div class="card-body" style="height: 600px;">
        <table class="mt-4 table table-bordered" style="margin: auto">
            <tr>
                <th class="text-center bg-dark"> Video Title </th>
                <th class="text-center bg-dark"> Date Purchased </th>
                <th class="text-center bg-dark"> Return Date </th>
            </tr>
            <?php foreach($_SESSION['profileList'][$_SESSION['userID']]['VideosRented']->getRentList() as $video): ?>
            <tr>
                <td class="text-center">
                    <?php echo $video->get_video();  ?>
                </td>
                <td class="text-center"> <?php echo $video->get_purchase_date(); ?> </td>
                <td class="text-center"> <?php echo $video->get_due_date(); ?> </td>
            </tr>
            <?php endforeach; ?>
        </table>

    </div>
    <?php else: ?>
    <p class="text-center mt-3"> No purchase made yet </p>
    <?php endif; ?>




</div>