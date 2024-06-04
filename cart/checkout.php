<?php

include_once "../home/header.php";

//for debugging use;
// echo "<pre>";
// print_r($_SESSION['cartList'][$_SESSION['userID']]);
// echo "</pre>";

// echo "<pre>";
// print_r($_SESSION['profileList'][$_SESSION['userID']]);
// echo "</pre>";
?>



<div class="card mt-5" style="margin: auto; width: 900px">

    <div class="card-header">
        <h1 class="text-center"> Checkout </h1>
    </div>
    <div class="card-body" style="height: 600px; ">
        <table class="mt-4 table table-bordered" style="margin: auto">
            <tr>
                <th class="text-center bg-dark"> Total Amount</th>
                <th class="text-center bg-dark"> Rented Videos Duration</th>
            <tr>
                <?php 
                        $duration = date('Y-m-d', strtotime('+30 days'));
                        $total = 0; 
                        $videos = [];
                                            
                        foreach($_SESSION['cartList'] as $index => $cart){
                        foreach($cart['Items'] as $item){
                            $total += $item['Price'];
                            $videos[] = $item['Title']; 
                        }  
                        }
                        ?>
            <tr>
                <td class="text-center">
                    <?php echo $total  ?> PHP
                </td>
                <td class="text-center">
                    <?php echo $duration ?>
                </td>
            </tr>
        </table>

        <table class="mt-5 table table-bordered">
            <?php 
                    $payment_modes = [];
                    if (!empty($_SESSION['profileList'][$_SESSION['userID']]['Payments'])) {
                        foreach ($_SESSION['profileList'][$_SESSION['userID']]['Payments']['Payment_Details'] as $payment) {
                            $newPayment = [];
                            $newPayment['Payment_Name'] = $payment['Payment_Name'];
                            $newPayment['Payment_Type'] = $payment['Payment_Type'];
                            
                            $payment_modes[] = $newPayment;
                        }  
                    }
                ?>
            <tr class="">
                <th class="text-center bg-dark">
                    Payment Option:
                </th>
            </tr>
            <tr class="">
                <td>
                    <form action="checkout.php" method="post">
                        <select class="form-select" name='payment_option'>
                            <option> ---Options--- </option>
                            <option value="cash"
                                <?php if (isset($_POST['payment_option']) &&  $_POST['payment_option'] == "cash") echo 'selected' ?>>
                                Cash </option>
                            <?php foreach($payment_modes as $mode): ?>
                            <option value="<?php echo $mode['Payment_Type'] ?>"
                                <?php if (isset($_POST['payment_option']) &&  $_POST['payment_option'] == $mode["Payment_Type"]) echo 'selected' ?>>
                                <?php echo $mode['Payment_Name'] . " - " . $mode["Payment_Type"] ; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                        <input class="btn btn-block btn-dark mt-3" type="submit" value="Choose"
                            style="margin-left: 330px; width: 200px;">
                    </form>
                </td>
            </tr>
            <form action="checkout.inc.php" method="post">
                <tr class="">
                    <td class="text-center">
                        <?php if(isset($_POST['payment_option']) && $_POST['payment_option'] == "cash" ): ?>
                        <label for=""> Amount: </label>
                        <input type="text" name="cash_value">

                        <?php endif ?>
                        <input type="hidden" name="total" value="<?php echo $total ?>">
                        <input type="hidden" name="duration" value="<?php echo $duration?>">
                        <input type="hidden" name="payment_option" value="<?php echo $_POST['payment_option']?>">

                    </td>
                </tr>
                


        </table>
    </div>

    <div class="card-footer">
        <input class="btn btn-block btn-dark" type="submit" value="Pay">
        </button>
    </div>
    </form>

</div>