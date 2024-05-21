<?php

include_once "../home/header.php";

?>


<div class="editProfile card mt-5" style="width: 600px; margin: auto; border: 2px solid red">
    <div class="card-header">
        <p class="text-center" style="margin: 0px"> Edit Profile </p>
    </div>
    <form action="profile.inc.php" method="POST">
        <input class="form-control" type="hidden" name="status" value="1">
        <div class="card-body">
            <div class="form-group">
                <label for=""> Fullname: </label>
                <input class="form-control" type="text" name="fullname" required>
            </div>
            <div class="form-group">
                <label for=""> Address: </label>
                <input class="form-control" type="text" name="address"
                    placeholder="House No. / Street Name / Baranggay / Municipality or City / Postal code" required>
            </div>
            <div class="form-group">
                <label for=""> Phone Number: </label>
                <input class="form-control" type="text" name="phone_number" placeholder="+63" required>
            </div>
            <div class="form-group">
                <label for=""> Birthday: </label>
                <input class="form-control" type="date" name="birthday" required>
            </div>
        </div>
        <div class="card-footer">
            <input class="btn btn-block btn-primary" type="submit" value="submit">
        </div>
    </form>

</div>