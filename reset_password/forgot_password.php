<?php
    include_once "../home/header.php";
?>

<div class="fogotPassword card" style="width: 400px">
    <div class="card-header">
        <h3> Forgot Password</h3>
    </div>
    <form action="forgot_password.inc.php" method="post">
        <div class="card-body">
            <div class="form-group">
                <label for=""> Enter Email: </label>
                <input class="form-control" type="text" name="email" required>
            </div>
        </div>

        <div class="card-footer">
            <?php    
             if(isset($_GET["error"])) {
                        if($_GET["error"] == "status1") {
                             echo '<p class="text-center mb-2" style="margin: 0px; color: red"> Email Address Not Found</p>';
                        } 
                        elseif($_GET["error"] == "status2") {
                             echo '<p class="text-center" style="margin: 0px; color: red"> Password incorrect </p>';
                        }
                      } 
            ?>
            <input class="btn btn-block btn-primary" type="submit" value="Sned">
        </div>
    </form>
</div>

</div>