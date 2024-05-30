<?php
include_once "../video/video.classes.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $index = $_GET['index'];

    $video = $_SESSION['video_collection'][$index];

    if (isset($_POST['type']) && isset($_POST['copies'])) {
        $version_type = $_POST['type'];
        $copies = intval($_POST['copies']);
        $title = $_POST['title'];
        $price = 0; 

        switch ($version_type) {
            case "blu_ray":
                $price = 1100 * $copies;
                $video->set_blu_ray($video->get_blu_ray() - $copies);
                break;
            case "digital":
                $price = 750 * $copies;
                $video->set_digital($video->get_digital() - $copies);
                break;
            case "uhd":
                $price = 1250 * $copies;
                $video->set_uhd($video->get_uhd() - $copies);
                break;
            case "dvd":
                $price = 1000 * $copies;
                $video->set_dvd($video->get_dvd() - $copies);
                break;
        }

        $newCart = []; 
        $newCart['Title'] = $title;
        $newCart['Price'] = $price;
        $newCart['Item_Type'] = $version_type;
        $newCart['Item_No'] = $copies;
        
        
        $cart = $_SESSION['cartList'][$_SESSION['userID']];

        if (!array_key_exists('Item_Tracker', $cart)) {
            $cart['Item_Tracker'] = 0;  // Initialize if not exists
        }
        
        $cart['Items'][$cart['Item_Tracker']] = $newCart;
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