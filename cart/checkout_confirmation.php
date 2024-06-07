<?php

include_once "../home/header.php";

    
?>

<div class="signinConfirmation card mt-5" style="width: 400px; margin: auto">
    <div class="card-header text-center">
        <h4> Payment Successful! </h4>
    </div>
    <div class="card-body">
        <div class="form-group">
            <p class="text-center"> Please check your email for the receipt. </p>

        </div>
        <div class="form-group">
            <button class="btn btn-block bg-olive" onclick="location.href = '/appdevproj/home/index.php'"> Continue
            </button>
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
    </div>
</div>