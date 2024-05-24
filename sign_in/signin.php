<?php include_once "../home/header.php" ?>

<div class="signIN card" style="width: 400px">
    <div class="card-header">
        <h3> Sign In</h3>
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
                if (isset($_GET["error"]) && $_GET["error"] == "none") {
                    echo '<p class="text-center" style="margin: 0px; color: green;"> Successfully Signed up!</p>';
                }
                ?>
        </div>
        <div class="card-footer">
            <input class="btn btn-block btn-primary" type="submit" value="Sign In">
        </div>
    </form>
</div>

</div