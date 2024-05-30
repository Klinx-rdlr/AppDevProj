<?php

include_once "../home/header.php";
include_once "profile_functions.php";
?>


<div class="editProfile card mt-5" style="width: 600px; margin: auto;">
    <div class="card-header">
        <p class="text-center" style="margin: 0px"> Edit Profile </p>
    </div>
    <form action="profile.inc.php" method="POST">
        <input class="form-control" type="hidden" name="status" value="1">
        <div class="card-body">
            <div class="form-group">
                <label for=""> First Name: </label>
                <input class="form-control" type="text" name="firstname" value="<?php echo getProfileFirstname(); ?>"
                    required>
            </div>
            <div class="form-group">
                <label for=""> Last Name: </label>
                <input class="form-control" type="text" name="lastname" value="<?php echo getProfileLastname(); ?>"
                    required>
            </div>
            <div class="form-group">
                <label for=""> Middle Name: </label>
                <input class="form-control" type="text" name="middlename" value="<?php echo getProfileMiddlename(); ?>"
                    required>
            </div>
            <div class="form-group">
                <label for=""> Address: </label>
                <input class="form-control" type="text" name="address"
                    placeholder="House No. / Street Name / Baranggay / Municipality or City / Postal code"
                    value="<?php echo getProfileAddress(); ?>" required>
            </div>
            <div class="form-group">
                <label for=""> Phone Number: </label>
                <input class="form-control" type="text" name="phone_number" placeholder="+63"
                    value="<?php echo getProfilePhone(); ?>" required>
            </div>
            <div class="form-group">
                <label for=""> Birthday: </label>
                <input class="form-control" type="date" name="birthday" value="<?php echo getProfileBirthday(); ?>"
                    required>
            </div>
        </div>
        <div class="card-footer">
            <input class="btn btn-block btn-dark" type="submit" value="Edit">
        </div>
    </form>

</div>