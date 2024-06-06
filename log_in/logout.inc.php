<?php

require_once("../user_activity/user_activity.classes.php");
require_once("../admin_logs/admin_action.classes.php");

session_start();

if (isset($_SESSION['userID'])) {
    $_SESSION['user_activity'][] = new UserActivity($_SESSION["username"], "Logged Out", date("Y-m-d h:i:sa"));
}

if (isset($_SESSION['adminID'])) {
    $_SESSION['admin_logs'][] = new AdminAction($_SESSION["adminID"], "Logged Out", date("Y-m-d h:i:sa"), "No Further Details");
}

unset($_SESSION['userID']);
unset($_SESSION['adminID']);
unset($_SESSION['username']);

//for debugging use only (HARD RESET USERS)
// unset($_SESSION['userList']);
// unset($_SESSION['profileList']);
// unset($_SESSION['cartList']);



header("location: ../home/index.php");

?>