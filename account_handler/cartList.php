<?php


function addNewCart($userID){
    $newCart = array(  
        'Item_Tracker' => 0,
        'Items' => array(),
    );
    $_SESSION["cartList"][$userID] = $newCart;
}