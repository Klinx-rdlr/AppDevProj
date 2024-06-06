<?php

include_once "../home/header.php";

//for debugging use;
// echo "<pre>";
// print_r($_SESSION['cartList'][$_SESSION['userID']]);
// echo "</pre>";

// echo "<pre>";
// print_r($_SESSION['profileList'][$_SESSION['userID']]);
// echo "</pre>";
?>


<div class="card mt-5 p-0" style="margin: auto; width: 900px">

    <div class="card-header">
        <h1 class="text-center"> User's Cart </h1>
    </div>
    <?php if(!empty($_SESSION['cartList'][$_SESSION['userID']])): ?>
    <div class="card-body" style="height: 100%;">
        <table class="mt-4 table table-bordered" style="margin: auto">
            <tr>
                <th class="text-center bg-dark"> Video Title</th>
                <th class="text-center bg-dark"> Duration </th>
                <th class="text-center bg-dark"> Details </th>
                <th class="text-center bg-dark"> Price </th>
            </tr>
            <?php foreach($_SESSION['cartList'] as $index => $cart): ?>
            <?php foreach($cart['Items'] as $item): ?>
            <tr>
                <td class="text-center align-middle"> <?php echo $item['Title']  ?> </td>
                <td class="text-center align-middle"> <?php  echo $item['Duration'] . " Days" ?></td>
                <td class="text-center">
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr class="">
                                <th class="">Type</th>
                                <th class="">Quantity</th>
                                <th class="">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $total_price = 0;
                                foreach($item['Item'] as $type => $detail): ?>
                            <tr class="">
                                <td class="">
                                    <p class="mb-0 font-weight-bold"><?php echo $type; ?></p>
                                </td>
                                <td class="">
                                    <p class="mb-0"><?php echo $detail["Quantity"]; ?></p>
                                </td>
                                <td class="">
                                    <p class="mb-0"><?php echo  $detail["Price"]; ?></p>
                                </td>
                            </tr>
                            <?php 
                            $total_price += intval($detail["Price"]); 
                            endforeach; 
                            ?>
                        </tbody>
                    </table>
                </td>
                <td class="text-center align-middle"> <?php echo $total_price ?></td>
            </tr>
            <?php endforeach; ?>
            <?php endforeach; ?>
        </table>
    </div>
    <div class="card-footer">
        <button class="btn btn-block btn-dark" onclick="location.href = '/appdevproj/cart/checkout.php'">
            Pay
        </button>
    </div>
    <?php else: ?>
    <p class="text-center mt-3"> Cart's Empty </p>
    <?php endif; ?>



</div>