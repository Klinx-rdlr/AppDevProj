<?php


function addNewCart($userID){
    $newCart = array(  
        'Item_Tracker' => 0,
        'Items' => array(
            'Price' => 0,
            'Item_Type' => "",
            'Item_No' => 0,
        ),
    );
    $_SESSION["cartList"][$userID] = $newCart;
}