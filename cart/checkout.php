<?php

include_once "../home/header.php";



//for debugging use;
echo "<pre>";
print_r($_SESSION['cartList'][$_SESSION['userID']]);
echo "</pre>";
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


    <?php if(!empty($_SESSION['cartList'][$_SESSION['userID']])): ?>
    <div class="card-body" style="height: 100%;">
        <table class="mt-4 table table-bordered" style="margin: auto">
            <tr>
                <th class="text-center bg-dark"> Video Title: </th>
                <th class="text-center bg-dark"> Rented Videos Duration: </th>
                <th class="text-center bg-dark"> Details </th>
                <th class="text-center bg-dark"> Price </th>
            </tr>
            <?php
                 $total = 0;
                 foreach($_SESSION['cartList'] as $index => $cart): ?>

            <?php 
                foreach($cart['Items'] as $item): ?>
            <tr>
                <td class="text-center"> <?php echo $item['Title']  ?> </td>
                <td class="text-center"> <?php  echo $item['Duration'] . " Days" ?></td>
                <td class="text-center">
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr class="">
                                <th class="">Type</th>
                                <th class="">Quantity</th>
                                <th class="">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $total_price = 0;
                                foreach($item['Item'] as $type => $detail): ?>
                            <tr class="">
                                <td class="">
                                    <p class="mb-0 font-weight-bold"><?php echo $type; ?></p>
                                </td>
                                <td class="">
                                    <p class="mb-0"><?php echo $detail["Quantity"]; ?></p>
                                </td>
                                <td class="">
                                    <p class="mb-0"><?php echo  $detail["Price"]; ?></p>
                                </td>
                            </tr>
                            <?php 
                            $total_price += intval($detail["Price"]); 
                            endforeach; 
                            $total += $total_price;
                            ?>
                        </tbody>
                    </table>
                </td>
                <td class="text-center align-middle"> <?php echo $total_price ?></td>
            </tr>
            <?php endforeach; ?>
            <?php endforeach; ?>
            <tr>
                <td class="text-center" colspan="4" style="color: Green"> <?php echo "Total Amount: ₱" . $total  ?>
                </td>
            </tr>
        </table>
        <?php endif; ?>

        <table class="mt-5 table table-bordered">

            <?php 
            //retrieving payment modes
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

                            <!--Looping through payment nodes to display each payment modes   -->
                            <?php foreach($payment_modes as $mode): ?>
                            <option value="<?php echo $mode['Payment_Type'] ?>"
                                <?php if (isset($_POST['payment_option']) &&  $_POST['payment_option'] == $mode["Payment_Type"]) echo 'selected' ?>>
                                <?php echo $mode['Payment_Name'] . " - " . $mode["Payment_Type"] ; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                        <input class="btn btn-block btn-dark mt-3" type="submit" value="Choose" style="width: 200px;">
                    </form>
                </td>
            </tr>
            <!-- If payment mode is cash, displays a new field for inputting payment-->
            <form action="checkout.inc.php" method="post">
                <tr class="">
                    <td class="text-center">

                        <input type="hidden" name="total" value="<?php echo $total; ?>">
                        <input type="hidden" name="duration" value="<?php echo $duration; ?>">
                        <input type="hidden" name="purchase_date" value="<?php echo date("Y-m-d"); ?>">
                        <input type="hidden" name="payment_option" value="<?php echo $_POST['payment_option']; ?>">

                        <?php if(isset($_POST['payment_option']) && $_POST['payment_option'] == "cash" ): ?>
                        <label for=""> Amount: </label>
                        <input type="text" name="cash_value">
                        <?php endif; ?>
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