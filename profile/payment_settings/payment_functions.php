<?php

session_start();
function addUserPaymentCard($paymentOption, $paymentName, $name, $cardNumber, $cardType, $cardCVC, $cardExpiry){

    if(!isset($_SESSION['userList']['userID'])){
        return "Error: User not found.";
    }


    $currentUser = $_SESSION['userList']['userID'];

    if(!isset($currentUser['Payment_Option'])){
        $newPayment = array(
            'Payment_Tracker' => 0,
            'Payment_Option' => array(
                'Payment_Type' => $paymentOption,
                'Payment_Name' => $paymentName,
                'Card_Name' => $name,
                'Card_Number' => $cardNumber,
                'Card_Type' => $cardType,
                'Card_CVC' => $cardCVC,
                'Card_Expiry' => $cardExpiry,
            )
        );
        $currentUser['Payment_Option'] = $newPayment;
    }else{
        $newPayment = array(
            'Payment_Type' => $paymentOption,
            'Payment_Name' => $paymentName,
            'Card_Name' => $name,
            'Card_Number' => $cardNumber,
            'Card_Type' => $cardType,
            'Card_CVC' => $cardCVC,
            'Card_Expiry' => $cardExpiry,
        );
        $paymentIndex = ++$currentUser['Payment_Tracker'];
        $currentUser['Payment_Option'][$paymentIndex] = $newPayment;
    }

        // Update user in session
        $_SESSION['userList']['userID'] = $currentUser;

    // Return success message
    return true;
}

function addUserPaymentPaypal($paymentName, $email, $password){

    if(!isset($_SESSION['userList']['userID'])){
        return "Error: User not found.";
    }

    $currentUser = $_SESSION['userList']['userID'];
    
    if(!isset($currentUser['Payment_Option'])){
        $newPayment = array(
            'Payment_Tracker' => 0,
            'Payment_Option' => array(
                'Payment_Type' => $paymentOption,
                'Payment_Name' => $paymentName,
                'Paypal_Email' => $name,
                'Paypal_Password' => $cardType,
            )
        );
        $currentUser['Payment_Option'] = $newPayment;
    }else{
        $newPayment = array(
                'Payment_Type' => $paymentOption,
                'Payment_Name' => $paymentName,
                'Paypal_Email' => $name,
                'Paypal_Password' => $cardType,
        );
        $paymentIndex = ++$currentUser['Payment_Tracker'];
        $currentUser['Payment_Option'][$paymentIndex] = $newPayment;
    }

    // Update user in session
    $_SESSION['userList']['userID'] = $currentUser;

    // Return success message
    return true;
}

?>