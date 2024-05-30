<?php

include_once("../../home/header.php");

if (isset($_POST['payment_option'])) {
    $payment_option = $_POST['payment_option'];
}
?>

<div class="row" style="width: 1500px; margin: auto;">

    <div class="paymentList col card mt-5 mr-3" style="width: 400px; border:">
        <div class="card-header">
            <p class="text-center" style="margin: 0px"> Your Payment Methods </p>
        </div>
        <div class="card-body">
            <div class="payment-container row d-flex justify-content-center">
                <?php if(isset($_SESSION['profileList'][$_SESSION['userID']])): ?>
                <?php if(isset($_SESSION['profileList'][$_SESSION['userID']]['Payments']) && is_array($_SESSION['profileList'][$_SESSION['userID']]['Payments'])): ?>
                <?php foreach($_SESSION['profileList'][$_SESSION['userID']]['Payments']['Payment_Details'] as $id => $payments): ?>
                <div class='payment-block col-3 d-flex flex-column align-items-center justify-content-center'
                    style="width: 300px; height: 150px; border: 1px solid grey; margin: 5px 5px 5px 5px">
                    <h2 style="margin: 0;"> <?= $payments['Payment_Name'] ?> </h2>
                    <?php if($payments['Payment_Type'] == "card"): ?>
                    <p style="margin: 0;"> Card </p>
                    <p style="margin: 0;"> **** **** **** <?= substr($payments['Card_Number'], -4) ?> </p>
                    <button class='btn btn-block btn-dark' style="width: 100px;"
                        onclick="location.href = 'payment_details.php?id=<?php echo $id; ?>'"> Check
                    </button>
                    <?php elseif($payments['Payment_Type'] == "paypal"): ?>
                    <p style="margin: 0;"> PayPal </p>
                    <p style="margin: 0;">
                        <?= substr($payments['Paypal_Email'], 0, 3) . str_repeat('*', strlen($payments['Paypal_Email']) - 6) . substr($payments['Paypal_Email'], -5) ?>
                    </p>
                    <button class='btn btn-block btn-dark' style="width: 100px;"
                        onclick="location.href = 'payment_details.php?id=<?php echo $id; ?>'"> Check
                    </button>
                    <?php endif; ?>
                </div>
                <?php endforeach; ?>
                <?php else: ?>
                <p class="text-center"> No Payment Method saved yet </p>
                <?php endif; ?>
                <?php else: ?>
                <p class="text-center"> No Payment Method saved yet </p>
                <?php endif; ?>
            </div>
        </div>

    </div>

    <div class="Payment col card mt-5" style="width: 400px; border:">
        <div class="card-header">
            <p class="text-center" style="margin: 0px"> Payment Information </p>
        </div>
        <div class="card-body">
            <form method="post" action="payment.php">
                <label for=""> Payment Option: </label>
                <select class="form-select" name="payment_option">
                    <option selected <?php if (!isset($payment_option) || $payment_option == '') echo 'selected'; ?>>
                        ----Options----</option>
                    <option value="Card"
                        <?php if (isset($payment_option) && $payment_option == 'Card') echo 'selected'; ?>>
                        Visa/MasterCard/CreditCard</option>
                    <option value="Paypal"
                        <?php if (isset($payment_option) && $payment_option == 'Paypal') echo 'selected'; ?>>Paypal
                    </option>
                </select>
                <?php
            if(!isset($_POST['payment_option'])){
                echo "<button class='btn btn-block btn-dark mt-3' type='submit'> Choose </button>";
            }else if(isset($_POST['payment_option'])){
                echo "<button class='btn btn-block btn-success mt-3' type='submit'>Change </button>";
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
        <p class="mt-4 text-center" style="margin: 0"> Enter Paypal Account: </p>
        <div class="form-group">
            <label for=""> Name this payment: </label>
            <input class="form-control" type="text" name="payment_name"
                placeholder="Payment Name"
                value="" required>
        </div>
        <div class="form-group">
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

                <div class="card-footer mt-4">
                    <button class='btn btn-block btn-dark mt-3' type='submit'> Enter </button>
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
        </div>
    </div>

</div>