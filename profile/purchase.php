<?php
    include_once "../home/header.php";

    //for debugging use;
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
                <th class="text-center bg-dark"> Date </th>
                <th class="text-center bg-dark"> Return Date </th>
            </tr>
            <?php foreach($_SESSION['profileList'][$_SESSION['userID']]['VideosRented'] as $video): ?>
            <tr>
                <td class="text-center">
                    <?php echo $video  ?>
                </td>
                <td class="text-center"> 31/05/2024 </td>
                <td class="text-center"> 30/06/2024 </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <div class="card-footer">
            <button class="btn btn-block btn-dark" onclick="location.href = '/appdevproj/cart/checkout.php'"> 
                Pay
            </button>
        </div>
    </div>
    <?php else: ?>
    <p class="text-center mt-3"> No purchase made yet </p>
    <?php endif; ?>




</div>