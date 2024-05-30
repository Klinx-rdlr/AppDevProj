<?php

include_once "../home/header.php";
$user = $_SESSION["userTempList"];
    
?>

<div class="signinConfirmation card mt-5" style="width: 400px; margin: auto">
    <div class="card-header text-center">
        <h4> Sign in request submitted </h4>
    </div>
    <form action="signin_confirmation.inc.php" method="POST">
        <div class="card-body">
            <div class="form-group">
                <p class="text-center"> Please check your email for the verification code. </p>

            </div>
            <div class="form-group">
                <label for="VerifyCode">Enter Verification Code:</label>
                <input class="form-control" type="password" name="VerifyCode" id="VerifyCode" required>
            </div>
        </div>
        <div class="card-footer">
            <?php
                     if(isset($_GET["error"])){
                        if ($_GET["error"] == "status2") {
                            echo '<p class="text-center" style="color: red;"> Wrong code, please try again!</p>';
                        }
                    }
                        ?>
            <input type="submit" class="btn btn-block btn-primary" value="Continue">
        </div>
    </form>
</div>