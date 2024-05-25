<?php

include_once("../../home/header.php");

if (isset($_POST['payment_option'])) {
    $payment_option = $_POST['payment_option'];
}
?>

<div class="Payment card mt-5" style="width: 600px; margin: auto; border: 2px solid red">
    <div class="card-header">
        <p class="text-center" style="margin: 0px"> Payment Information </p>
    </div>
    <div class="card-body">
        <form method="post" action="payment.php">
            <label for=""> Payment Option: </label>
            <select class="form-select" name="payment_option">
                <option selected <?php if (!isset($payment_option) || $payment_option == '') echo 'selected'; ?>>
                    ----Options----</option>
                <option value="Card" <?php if (isset($payment_option) && $payment_option == 'Card') echo 'selected'; ?>>
                    Visa/MasterCard/CreditCard</option>
                <option value="Paypal"
                    <?php if (isset($payment_option) && $payment_option == 'Paypal') echo 'selected'; ?>>Paypal</option>
            </select>
            <?php
            if(!isset($_POST['payment_option'])){
                echo "<button class='btn btn-block btn-primary mt-3' type='submit'> Choose </button>";
            }else if(isset($_POST['payment_option'])){
                echo "<button class='btn btn-block btn-primary mt-3' type='submit'>Change </button>";
            }
        
            ?>
        </form>

        <form action="payment.inc.php" method="post">

            <?php
              if(isset($_POST['payment_option']) && $payment_option == 'Card'){
                echo<<<EOT
                <input type="hidden" name="payment_option" value="card">
                <div class="form-group">
                <label for=""> Name this payment: </label>
                <input class="form-control" type="text" name="payment_name" value=""
            required>

                <div class="form-group">
                <label for=""> Name on card: </label>
                <input class="form-control" type="text" name="card_name" value=""
            required>
    </div>

    <div class="form-group">
                <label for=""> Card Number: </label>
                <input class="form-control" type="text" name="card_number" value=""
            required>
    </div>

    <label for=""> Card Type: </label>
    <select class="form-select" name="card_type">
            <option> ----Options---- </option>
            <option> MasterCard </option>
            <option> Visa </option>
            <option> Credit Card </option>
    </select>

    <div class="form-group mt-2">
        <label for=""> CVC: </label>
        <input class="form-control" type="password" name="card_cvc" value=""
            required>
    </div>
    <div class="form-group">
        <label for=""> Card Expiry: </label>
        <input type="month" id="birthdate" name="card_expiry" required>
    </div>

    EOT;

    }
    elseif(isset($_POST['payment_option']) && $payment_option == 'Paypal'){
        echo <<<EOT
        <input type="hidden" name="payment_option" value="paypal">
        <div class="form-group">
            <p class="mt-4 text-center" style="margin: 0"> Enter Paypal Account: </p>
            <label for=""> Email: </label>
            <input class="form-control" type="text" name="paypal_email"
                placeholder="Email"
                value="" required>
        </div>
        <div class="form-group">
            <label for=""> Password: </label>
            <input class="form-control" type="password" name="paypal_password" placeholder="Password"
                value="" required>
        </div>
EOT;
    };
?>

            <div class="card-footer">
                <button class='btn btn-block btn-primary mt-3' type='submit'> Enter </button>
                <?php
 if(isset($_GET["error"])) {
    if($_GET["error"] == "none") {
         echo '<p class="text-center mb-2" style="margin: 0px; color: green"> Payment successfully added!</p>';
    } 
    elseif($_GET["error"] == "status6") {
         echo '<p class="text-center" style="margin: 0px; color: red"> Payment processing failed </p>';
    }
  } 
                ?>
            </div>
        </form>