<?php

session_start();

function addUserPaymentCard($paymentOption, $paymentName, $name, $cardNumber, $cardType, $cardCVC, $cardExpiry) {
    if (!isset($_SESSION['profileList'][$_SESSION['userID']])) {
        return "Error: User not found.";
        return false;
    }

    $currentUser = $_SESSION['profileList'][$_SESSION['userID']];

    if (!isset($currentUser['Payments'])) {
        $currentUser['Payments'] = array();
        $currentUser['Payments']['Payment_Tracker'] = 0;
    }

    $newPayment = array(
        'Payment_Type' => $paymentOption,
        'Payment_Name' => $paymentName,
        'Card_Name' => $name,
        'Card_Number' => $cardNumber,
        'Card_Type' => $cardType,
        'Card_CVC' => $cardCVC,
        'Card_Expiry' => $cardExpiry,
    );

    $currentUser['Payments']['Payment_Details'][$currentUser['Payments']['Payment_Tracker']] = $newPayment;
    $currentUser['Payments']['Payment_Tracker']++;
    
    // Update user in session
    $_SESSION['profileList'][$_SESSION['userID']] = $currentUser;

    // Return success message
    return true;
}

function addUserPaymentPaypal($paymentName, $email, $password){
    if(!isset($_SESSION['profileList'][$_SESSION['userID']])){
        return "Error: User not found.";
    }

    $currentUser = $_SESSION['profileList'][$_SESSION['userID']];
    
    if(!isset($currentUser['Payments'])){
        $currentUser['Payments'] = array();
        $currentUser['Payments']['Payment_Tracker'] = 0;
    }

    $newPayment = array(
        'Payment_Type' => 'paypal',
        'Payment_Name' => $paymentName,
        'Paypal_Email' => $email,
        'Paypal_Password' => $password,
    );

    $currentUser['Payments']['Payment_Details'][$currentUser['Payments']['Payment_Tracker']] = $newPayment;
    $currentUser['Payments']['Payment_Tracker']++;

    // Update user in session
    $_SESSION['profileList'][$_SESSION['userID']] = $currentUser;

    // Return success message
    return true;
}


function getUserPayments() {
    if (isset($_SESSION["profileList"][$_SESSION["userID"]]['Payment_Option'])) {
        return $_SESSION["profileList"][$_SESSION["userID"]]['Payment_Option'];
    } else {
        return null; 
    }   
}
?>