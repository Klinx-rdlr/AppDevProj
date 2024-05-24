<?php

include_once "../home/header.php";

?>

<div class="adminLogIn card" style="width: 400px">
    <div class="card-header">
        <h3 class="text-center"> Admin Log In</h3>
    </div>
    <form action="admin_login.inc.php" method="post">
        <div class="card-body">
            <div class="form-group">
                <label for=""> Enter Admin ID: </label>
                <input class="form-control" type="text" name="adminID" required>
            </div>
            <div class="form-group">
                <label for=""> Enter Password: </label>
                <input class="form-control" type="password" name="password" required>
            </div>
        </div>

        <div class=" card-footer">
            <?php    
             if(isset($_GET["error"])) {
                        if($_GET["error"] == "status3") {
                             echo '<p class="text-center mb-2" style="margin: 0px; color: red"> Admin ID or password is incorrect</p>';
                        } 
                      } 
            ?>
            <input class="btn btn-block btn-primary" type="submit" value="Log In">
        </div>
    </form>
</div>