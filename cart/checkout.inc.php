<?php
    require_once "../rent/rent.php";
    session_start();

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $total = intval($_POST['total']);
   
    $duration = $_POST['duration'];
    $payment_option = $_POST['payment_option'];
    
    if(isset($_POST['cash_value']) && isset( $_POST['total'])){
        $cash_value = intval($_POST['cash_value']);

        if($cash_value >= $total){
            $change = $cash_value - $total;
    
        $mail = require __DIR__ ."../../mailer.php";
        
        $mail->setFrom("xyzvideorentals@gmail.com", "XYZ VIDEO RENTALS");
        $mail->addAddress($_SESSION['username']);
        $mail->Subject = "RECEIPT";
        
        $itemRows = "";
        foreach($_SESSION['cartList'] as $index => $cart) {
            foreach($cart['Items'] as $item) {
                $itemRows .= "\nTitle: {$item['Title']}, Type: {$item['Item_Type']}, Copies: {$item['Item_No']}, Price: {$item['Price']}";
                add_current_rent($_SESSION['userID'], $cart);
            }
        }

             $mail->Body =  <<<END
            \n$itemRows\n
        
        <p> Total Amount: $total </p>
        <p> Amount Payed: $cash_value </p>
        <p> Your Change is: $change </p>
        <p> Please Return Before: $change </p>
        
        END;
        try{
            $mail->send();

            $_SESSION['profileList'][$_SESSION['userID']]['VideosRented'] = [];
            foreach($_SESSION['cartList'] as $index => $cart) {
                 foreach($cart['Items'] as $item) {
                     $_SESSION['profileList'][$_SESSION['userID']]['VideosRented'][] = $item["Title"];
                 }
            }
            
            unset($_SESSION['cartList']);
            header("location: checkout_confirmation.php?error=none");
        }catch(Exception $e){
            echo "Message could not be sent. Mail error: {$mail->$ErrorInfo}";
        }
        }else{
            header("location: checkout.php?error=insufficient");
        }
    }


    if (isset($_POST['payment_option'])) {

        // Initialize a new PHPMailer object
        $mail = require __DIR__ ."../../mailer.php";

        $mail->setFrom("xyzvideorentals@gmail.com", "XYZ VIDEO RENTALS");
        $mail->addAddress($_SESSION['username']);
        $mail->Subject = "RECEIPT";

        $itemRows = "";
        foreach($_SESSION['cartList'] as $index => $cart) {
            foreach($cart['Items'] as $item) {
                $itemRows .= "\nTitle: {$item['Title']}, Type: {$item['Item_Type']}, Copies: {$item['Item_No']}, Price: {$item['Price']}----";
                add_current_rent($_SESSION['userID'], $cart);
            }
        }

             $mail->Body =  <<<END
            \n$itemRows\n

            <p> Total Amount: $total </p>
            <p> Payed with: $payment_option </p>
            <p> Please Return Before: $duration </p>
            END;

        // Send the email
        try {
            $mail->send();

            $_SESSION['profileList'][$_SESSION['userID']]['VideosRented'] = [];
            foreach($_SESSION['cartList'] as $index => $cart) {
                 foreach($cart['Items'] as $item) {
                     $_SESSION['profileList'][$_SESSION['userID']]['VideosRented'][] = $item["Title"];
                 }
            };

            unset($_SESSION['cartList']);
            
            header("location: checkout_confirmation.php?error=none");
        } catch(Exception $e) {
            echo "Message could not be sent. Mail error: {$mail->ErrorInfo}";
        }
    }
}
?>