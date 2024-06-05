<?php

include_once "../home/header.php";

//for debugging use;
// echo "<pre>";
// print_r($_SESSION['cartList'][$_SESSION['userID']]);
// echo "</pre>";
?>


<div class="card mt-5" style="margin: auto; width: 900px">

    <div class="card-header">
        <h1 class="text-center"> User's Cart </h1>
    </div>
    <?php if(!empty($_SESSION['cartList'][$_SESSION['userID']])): ?>
    <div class="card-body" style="height: 600px;">
        <table class="mt-4 table table-bordered" style="margin: auto">
            <tr>
                <th class="text-center bg-dark"> Video</th>
                <th class="text-center bg-dark"> Type </th>
                <th class="text-center bg-dark"> No. of Copies </th>
                <th class="text-center bg-dark"> Price </th>
            </tr>
            <?php foreach($_SESSION['cartList'] as $index => $cart): ?>
            <?php foreach($cart['Items'] as $item): ?>
            <tr>
                <td class="text-center">
                    <?php echo $item['Title']  ?>
                </td>
                <td class="text-center"> <?php echo $item['Item_Type'] ?></td>
                <td class="text-center"> <?php  echo $item['Item_No'] ?></td>
                <td class="text-center"> <?php echo $item['Price'] ?>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php endforeach; ?>
        </table>
        <div class="card-footer">
      
        </div>
    </div>
    <button class="btn btn-block btn-dark" onclick="location.href = '/appdevproj/cart/checkout.php'"> 
            Pay
        </button>
    <?php else: ?>
    <p class="text-center mt-3"> Cart's Empty </p>
    <?php endif; ?>

   

</div>