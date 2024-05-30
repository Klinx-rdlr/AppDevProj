<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cart = $_SESSION['cartList'][$_SESSION['userID']];
    $index = $_GET['index'];


    if (isset($_POST['version_type']) && isset($_POST['copies'])) {
        $version_type = $_POST['version_type'];
        $copies = intval($_POST['copies']);
        $price = 0; 

        switch ($version_type) {
            case "blu_ray":
                $price = 1100 * $copies;
                break;
            case "digital":
                $price = 750 * $copies;
                break;
            case "uhd":
                $price = 1250 * $copies;
                break;
            case "dvd":
                $price = 1000 * $copies;
                break;
        }

        $newCart = []; 
        $newCart['Price'] = $price;
        $newCart['Item_Type'] = $version_type;
        $newCart['Item_No'] = $copies;


        if (!array_key_exists('Item_Tracker', $cart)) {
            $cart['Item_Tracker'] = 0;  // Initialize if not exists
        }
        
        $cart[$cart['Item_Tracker']] = $newCart;
        $cart['Item_Tracker']++;

        $_SESSION['cartList'][$_SESSION['userID']] = $cart;

        header("Location: rent_confirmation.php?index=$index");
        exit; 
    } else {

        header("Location: rent_confirmation.php?error=missing_values");
        exit;
    }
}else{
   
    header("Location: rent_confirmation.php?error=unexpected");
    exit;
}