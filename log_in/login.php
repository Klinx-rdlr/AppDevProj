<?php include_once "../home/header.php" ?>

<div class="logIN card" style="width: 400px">
    <div class="card-header">
        <h3 class="text-center"> Log In</h3>
    </div>
    <form action="login.inc.php" method="post">
        <div class="card-body">
            <div class="form-group">
                <label for=""> Enter Email or Username: </label>
                <input class="form-control" type="text" name="user_name" required>
            </div>
            <div class="form-group">
                <label for=""> Enter Password: </label>
                <input class="form-control" type="password" name="password" required>
            </div>
            <div class="form-group">
                <a href="../reset_password/forgot_password.php">Forgot password?</a>
            </div>
            <input class="btn btn-block btn-primary" type="submit" value="Log In">
    </form>
</div>

<div class=" card-footer">
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
    <div class="form-group">
        <button class="btn btn-block btn-dark" onclick="location.href = '../admin_login/admin_login.php'">
            Log in as Admin
        </button>
    </div>
</div>
</form>
</div>

</div