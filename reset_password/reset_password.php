<?php
include_once "../home/header.php";

$token = $_GET["token"];
$token_hash = hash("sha256", $token);

$user = getUserToken($token_hash);

if($user === null){
    die("token not found");
} 

if(strtotime($user["Reset_Token_Expires"]) <= time()){
    die("token has expired");
}

function getUserToken($token){
    foreach($_SESSION["userList"] as $users){
        if($users['Reset_Token'] == $token){
            return $users;
        }
    }
    return null;
}
?>


<div class="resetPassword card" style="width: 400px">
    <div class="card-header">
        <h3> Reset Password </h3>
    </div>
    <form action="reset_password.inc.php" method="post">
        <input type="hidden" name="token" value="<?php echo htmlspecialchars($token); ?>">

        <div class="card-body">
            <div class="form-group">
                <label for=""> Enter New Password: </label>
                <input class="form-control" type="password" name="password" required>
            </div>
            <div class="form-group">
                <label for=""> Repeat Password: </label>
                <input class="form-control" type="password" name="re_password" required>
            </div>
        </div>

        <div class="card-footer">
            <?php    
             if(isset($_GET["error"])) {
                        if($_GET["error"] == "status2") { //wrong password - status2
                             echo '<p class="text-center mb-2" style="margin: 0px; color: red"> Password does not match </p>';
                        } 
                      } 
            ?>
            <input class="btn btn-block btn-primary" type="submit" value="submit">
        </div>
    </form>
</div>