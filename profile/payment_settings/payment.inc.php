<?php
    include_once "payment_functions.php";
    require_once "../../user_activity/user_activity.classes.php";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_POST['payment_option'])){
            if($_POST['payment_option'] == "card"){
                $paymentOption = $_POST['payment_option'];
                $paymentName = $_POST['payment_name'];
                $cardName = $_POST['card_name'];
                $cardNumber = $_POST['card_number'];
                $cardType = $_POST['card_type'];
                $cardCvc = $_POST['card_cvc'];
                $cardExpiry = $_POST['card_expiry'];

                $result = addUserPaymentCard($paymentOption, $paymentName, $cardName, $cardNumber, $cardType, $cardCvc, $cardExpiry);

                if($result){
                    header("location: payment.php?error=none-card");
                }else{
                    header("location: payment.php?error=status6"); //status6 - payment process failed
                }

            }else if($_POST['payment_option'] == "paypal"){
                $paymentOption = $_POST['payment_option'];
                $paymentName = $_POST['payment_name'];
                $paypalEmail = $_POST['paypal_email'];
                $paypalPassword = $_POST['paypal_password'];

                $result = addUserPaymentPaypal($paymentName, $paypalEmail, $paypalPassword);

                if($result){
                    $_SESSION['user_activity'][] = new UserActivity($_SESSION['username'], 
                            "Added Payment Option",  date("Y-m-d h:i:sa"));
                    header("location: payment.php?error=none-paypal");
                }else{
                    header("location: payment.php?error=status6");
                }

                
            }
        
        }else{
            header("location: payment.php?error=status2"); // getting the payment_option but nothing happens
        }
    }

?>