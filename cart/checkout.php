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


<style>
    .table td {
        text-align: center;
    }
</style>

<div class="card mt-5" style="margin: auto; width: 900px">

    <div class="card-header">
        <h1 class="text-center"> Checkout </h1>
    </div>

    <div class="card-body" style="height: 600px; ">
        <table class="mt-4 table table-bordered" style="margin: auto">
            <tr>
                <th class="text-center bg-dark"> Item</th>
                <th class="text-center bg-dark"> No. of Pieces </th>
                <th class="text-center bg-dark"> Rented Videos Duration</th>
                <th class="text-center bg-dark"> Due Date</th>
                <th class="text-center bg-dark"> Amount </th>
            </tr>
            <?php $total = 0; ?>
            <?php foreach($_SESSION['cartList'] as $index => $cart): ?>
            <?php foreach($cart['Items'] as $item): ?>
                <tr>
                    <?php 
                        // $duration = date('Y-m-d', strtotime('+30 days'));
                        // $videos = [];
                        $total += $item['Price'];
                        echo "<td>" . $item['Title'] . ' - ' . $item['Item_Type'] . "</td>"; 
                        echo "<td>" . $item['Item_No'] . "</td>"; 
                        echo "<td>" . $item['Duration'] . " day/s" . "</td>"; 
                        echo "<td>" . date('Y-m-d', strtotime('+'. $item['Duration'] . 'days')) . "</td>";
                        echo "<td>" . $item['Price'] . "</td>";
                    ?>
                </tr>
            <?php endforeach; ?>
            <?php endforeach; ?>
            <tr>
                <td class="text-center" colspan="4">
                    
                </td>
                <td> <?php echo "Total Amount: ₱" . $total  ?> </td>
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

                        <?php endif; ?>
                        <input type="hidden" name="total" value="<?php echo $total; ?>">
                        <input type="hidden" name="duration" value="<?php echo $duration; ?>">
                        <input type="hidden" name="payment_option" value="<?php echo $_POST['payment_option']; ?>">

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