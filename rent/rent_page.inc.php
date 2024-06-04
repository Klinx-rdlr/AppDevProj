<?php
    include_once "../video/video.classes.php";
    session_start();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $index = $_GET['index'];
        $video = $_SESSION['video_collection'][$index];
        $title = $video->get_title(); 

        $dvd_copies = $_POST["dvd"]; 
        $blu_ray_copies = $_POST["blu_ray"]; 
        $uhd_copies = $_POST["uhd"]; 
        $digital_copies = $_POST["digital"];

        // price rate per day
        $dvd_price = 49.99;
        $blu_ray_price = 99.99;
        $uhd_price = 149.99;
        $digital_price = 99.99;

        $rent_duration = intval($_POST["rent_duration"]);

        if (!isset($_SESSION['cartList'])) {
            $_SESSION['cartList'][$_SESSION['userID']] = [];
        }
        
        $cart = $_SESSION['cartList'][$_SESSION['userID']];

        if (!array_key_exists('Item_Tracker', $cart)) {
            $cart['Item_Tracker'] = 0;  // Initialize if not exists
        }

        // track for each video format
        if ($dvd_copies != 0) {
            $newCart = []; 
            $newCart['Title'] = $title;
            $newCart['Price'] = $rent_duration * $dvd_price;
            $newCart['Item_Type'] = "DVD";
            $newCart['Item_No'] = $dvd_copies;
            $newCart['Duration'] = $rent_duration;

            $cart['Items'][$cart['Item_Tracker']] = $newCart;
            $cart['Item_Tracker']++;
            $_SESSION['cartList'][$_SESSION['userID']] = $cart;

            $video->set_dvd($video->get_dvd() - $dvd_copies);
        }

        if ($blu_ray_copies != 0) {
            $newCart = []; 
            $newCart['Title'] = $title;
            $newCart['Price'] = $rent_duration * $blu_ray_price;
            $newCart['Item_Type'] = "Blu-ray";
            $newCart['Item_No'] = $blu_ray_copies;
            $newCard['Duration'] = $rent_duration;

            $cart['Items'][$cart['Item_Tracker']] = $newCart;
            $cart['Item_Tracker']++;
            $_SESSION['cartList'][$_SESSION['userID']] = $cart;

            $video->set_blu_ray($video->get_blu_ray() - $blu_ray_copies);
        }

        if ($uhd_copies != 0) {
            $newCart = []; 
            $newCart['Title'] = $title;
            $newCart['Price'] = $rent_duration * $uhd_price;
            $newCart['Item_Type'] = "UHD";
            $newCart['Item_No'] = $uhd_copies;
            $newCard['Duration'] = $rent_duration;

            $cart['Items'][$cart['Item_Tracker']] = $newCart;
            $cart['Item_Tracker']++;
            $_SESSION['cartList'][$_SESSION['userID']] = $cart;

            $video->set_uhd($video->get_uhd() - $uhd_copies);
        }

        if ($digital_copies != 0) {
            $newCart = []; 
            $newCart['Title'] = $title;
            $newCart['Price'] = $rent_duration * $digital_price;
            $newCart['Item_Type'] = "Digital";
            $newCart['Item_No'] = $digital_copies;
            $newCard['Duration'] = $rent_duration;

            $cart['Items'][$cart['Item_Tracker']] = $newCart;
            $cart['Item_Tracker']++;
            $_SESSION['cartList'][$_SESSION['userID']] = $cart;

            $video->set_digital($video->get_digital() - $digital_copies);
        }
        
        header("Location: rent_confirmation.php?index=$index");
        exit; 
    }
?>
