<?php
require_once "../rent/rentCollection.classes.php";
require_once "../rent/rent.classes.php";
require_once "../rent/VideoItem.classes.php";
require_once "../profile/purchase/purchase.classes.php";
require_once "checkout_functions.php";
require_once "../user_activity/user_activity.classes.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $total = intval($_POST['total']);
    $duration = $_POST['duration'];
    $payment_option = $_POST['payment_option'];
    $purchase_date = $_POST['purchase_date'];


    $userID = $_SESSION['userID'];
    $cartList = $_SESSION['cartList'];

    if (isset($_POST['cash_value']) && isset($_POST['total'])) {
        $cash_value = intval($_POST['cash_value']);

        if ($cash_value >= $total) {
            $change = $cash_value - $total;

            $mail = require __DIR__ . "../../mailer.php";
            $mail->setFrom("xyzvideorentals@gmail.com", "XYZ VIDEO RENTALS");
            $mail->addAddress($_SESSION['username']);
            $mail->Subject = "RECEIPT";

            $itemRows = generateItemRows($_SESSION['cartList'][$userID]['Items']);

            $mail->Body = <<<END
            $itemRows
            <p>Total Amount: $total</p>
            <p>Amount Payed: $cash_value</p>
            <p>Your Change is: $change</p>
            <p>Please Return Before: $duration</p>
            END;

            try {
                $currentCart = isset($cartList[$userID]['Items']) ? $cartList[$userID]['Items'] : [];
               
                if (!isset($_SESSION['profileList'][$userID]['VideosRented'])) {
                    $rentCollection = new rentCollection();
                    $_SESSION['profileList'][$userID]['VideosRented'] = $rentCollection;
                }

                if (!isset($_SESSION['profileList'][$userID]['History'])) {
                    $_SESSION['profileList'][$userID]['History'] = array();
                }

                $movieHistory =  $_SESSION['profileList'][$userID]['History'];
                $videosRented =  $_SESSION['profileList'][$userID]['VideosRented'];

                $rent_details = ""; 
                
                foreach ($currentCart as $item) {
                    $dvd = isset($item['Item']['DVD']['Quantity']) ? $item['Item']['DVD']['Quantity'] : 0;
                    $uhd = isset($item['Item']['UDH']['Quantity']) ? $item['Item']['UDH']['Quantity'] : 0;
                    $digital = isset($item['Item']['Digital']['Quantity']) ? $item['Item']['Digital']['Quantity'] : 0;
                    $bluray = isset($item['Item']['Blu-ray']['Quantity']) ? $item['Item']['Blu-ray']['Quantity'] : 0;
                    
                    $newVideo = new rent($item['Title'], $item['Duration'], new VideoItem($dvd, $uhd, $digital, $bluray));

                    $newHistory = new purchase($item['Title'], $item['Duration']);

                    $_SESSION['profileList'][$userID]['History'][] =  $newHistory;

                    $videosRented->addRentVideo($newVideo);

                    $rent_details .= 
                        "Title:  " . $item['Title'] . "<br>" .
                        "Duration:  " . $item['Duration'] . " day/s<br>" .
                        ($dvd > 0 ? "DVD: x$dvd" : "") . "<br>" .
                        ($bluray > 0 ? "Blu-ray: x$bluray" : "") . "<br>" .
                        ($uhd > 0 ? "UHD: x$uhd" : "") . "<br>" .
                        ($digital > 0 ? "Digital: x$digital" : "") . "<br>";
    
    
                }

                
                $_SESSION['user_activity'][] = new UserActivity($_SESSION["username"], "Rented Video", date("Y-m-d h:i:sa"), $rent_details);
                // Save the updated profileList back to the session
                $_SESSION['profileList'][$userID]['VideosRented'] = $videosRented;

                unset($_SESSION['cartList'][$userID]);

                $mail->send();   
                header("Location: checkout_confirmation.php?error=none");
            } catch (Exception $e) {
                echo "Message could not be sent. Mail error: {$mail->ErrorInfo}";
            }
        } else {
            header("Location: checkout.php?error=balance-error");
        }
    } elseif (isset($payment_option)) {
        // Initialize a new PHPMailer object
        $mail = require __DIR__ . "../../mailer.php";

        $mail->setFrom("xyzvideorentals@gmail.com", "XYZ VIDEO RENTALS");
        $mail->addAddress($_SESSION['username']);
        $mail->Subject = "RECEIPT";

        $itemRows = generateItemRows($_SESSION['cartList'][$userID]['Items']);

        $mail->Body = <<<END
        $itemRows
        <p>Total Amount: $total</p>
        p>Payed with: $payment_option</p>
        <p>Please Return Before: $duration</p>
        END;

        try {

            $currentCart = isset($cartList[$userID]['Items']) ? $cartList[$userID]['Items'] : [];

            if (!isset($_SESSION['profileList'][$userID]['VideosRented'])) {
                $_SESSION['profileList'][$userID]['VideosRented'] = new rentCollection();
            }
            $videosRented =  $_SESSION['profileList'][$userID]['VideosRented'];
            
            $rent_details = ""; 

            foreach ($currentCart as $item) {
                $dvd = isset($item['Item']['DVD']['Quantity']) ? $item['Item']['DVD']['Quantity'] : 0;
                $uhd = isset($item['Item']['UDH']['Quantity']) ? $item['Item']['UDH']['Quantity'] : 0;
                $digital = isset($item['Item']['Digital']['Quantity']) ? $item['Item']['Digital']['Quantity'] : 0;
                $bluray = isset($item['Item']['Blu-ray']['Quantity']) ? $item['Item']['Blu-ray']['Quantity'] : 0;

                $newVideo = new rent($item['Title'], $item['Duration'], new VideoItem($dvd, $uhd, $digital, $bluray));
                $videosRented->addRentVideo($newVideo);

                $rent_details .= 
                        "Title:  " . $item['Title'] . "<br>" .
                        "Duration:  " . $item['Duration'] . " day/s<br>" .
                        ($dvd > 0 ? "DVD: x" : "") . $dvd . "<br>" .
                        ($bluray > 0 ? "Blu-ray: x" : "") . $bluray . "<br>" .
                        ($uhd > 0 ? "UHD: x" : "") . $uhd . "<br>" .
                        ($digital > 0 ? "Digital: x" : "") . $digital . "<br>";
                       
    
            }

            $_SESSION['user_activity'][] = new UserActivity($_SESSION["username"], "Rented Video", date("Y-m-d h:i:sa"), $rent_details);
            
      
            // Save the updated profileList back to the session
            $_SESSION['profileList'][$userID]['VideosRented'] = $videosRented;
            unset($_SESSION['cartList'][$userID]);
            $mail->send();
            header("Location: checkout_confirmation.php?error=none");
        } catch (Exception $e) {
            echo "Message could not be sent. Mail error: {$mail->ErrorInfo}";
        }
    } else {
        header("Location: checkout.php?error=balance-error");
    }
}
?>