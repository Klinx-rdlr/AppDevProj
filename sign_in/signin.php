<?php include_once "../home/header.php" ?>

<style>
.signin_error {
    margin: 0px;
    color: red;
}

.signin_success {
    margin: 0px;
    color: green;
}
</style>

<div class="signIN card" style="width: 400px; margin: 100px auto;">
    <div class="card-header">
        <h3 class="text-center"> Sign In</h3>
    </div>
    <form action="signin.inc.php" method="post">
        <div class="card-body">
            <div class="form-group">
                <label for=""> Username: </label>
                <input class="form-control" type="text" name="user_name" required>
            </div>
            <div class="form-group">
                <label for=""> Email: </label>
                <input class="form-control" type="text" name="email" required>
            </div>
            <div class="form-group">
                <label for=""> Password: </label>
                <input class="form-control" type="password" name="password" required>
            </div>
            <div class="form-group">
                <label for=""> Re-Enter Password: </label>
                <input class="form-control" type="password" name="re-password" required>
            </div>
            <?php
                     if(isset($_GET["error"])){
                        if ($_GET["error"] == "none") {
                            echo '<p class="text-center signin_success"> Successfully Signed up!</p>';
                        }else if($_GET["error"] == "usernameTaken") {
                            echo '<p class="text-center signin_error"> Username or email is already taken!</p>';
                        }else if($_GET["error"] == "invalidusername") {
                            echo '<p class="text-center signin_error"> Invalid username!</p>';
                        }else if($_GET["error"] == "invalidemail") {
                            echo '<p class="text-center signin_error"> Invalid email!</p>';
                        }else if($_GET["error"] == "invalidPassword") {
                            echo '<p class="text-center signin_error"> Invalid password!</p>';
                        }
                    }
                ?>
        </div>
        <div class="card-footer">
            <input class="btn btn-block btn-primary" type="submit" value="Sign In">
        </div>
    </form>
</div>

</div