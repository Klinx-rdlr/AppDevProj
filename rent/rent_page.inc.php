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

        if (!isset($_SESSION['cartList'][$_SESSION['userID']])) {
            $_SESSION['cartList'][$_SESSION['userID']] = [];
        }
        
        $cart = $_SESSION['cartList'][$_SESSION['userID']];
        
        if (!array_key_exists('Item_Tracker', $cart)) {
            $cart['Item_Tracker'] = 0;  // Initialize if not exists
        }

        $newCart = []; 
        $newCart['Title'] = $title;
        $newCart['Duration'] = $rent_duration;
        $newCart['Due'] = date('Y-m-d', strtotime('+'. $rent_duration . 'days'));
        $newCart['Item'] = array( 
            'DVD' => array(
                'Quantity' => $dvd_copies,
                'Price' => $rent_duration * $dvd_price * $dvd_copies,
            ),
            'UHD' => array(
                'Quantity' => $uhd_copies,
                'Price' => $rent_duration * $uhd_price * $uhd_copies,
            ), 
            'Digital' => array(
                'Quantity' => $digital_copies,
                'Price' => $rent_duration * $digital_price * $digital_copies,
            ), 
            'Blu-ray' => array(
                'Quantity' => $blu_ray_copies,
                'Price' => $rent_duration * $blu_ray_price * $blu_ray_copies,
            ), 
        );

        $cart['Items'][$cart['Item_Tracker']] = $newCart;
        $cart['Item_Tracker']++;
        $_SESSION['cartList'][$_SESSION['userID']] = $cart;

        $types = [
            'dvd' => $dvd_copies,
            'blu_ray' => $blu_ray_copies,
            'uhd' => $uhd_copies,
            'digital' => $digital_copies,
        ];
        
        foreach ($types as $type => $copies) {
            if ($copies != 0) {
                $getter = "get_{$type}";
                $setter = "set_{$type}";
                $video->$setter($video->$getter() - $copies);
            }
        }

        header("Location: rent_confirmation.php?index=$index");
        exit; 
    }
?>