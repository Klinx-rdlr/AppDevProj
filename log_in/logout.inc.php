<?php

require_once("../user_activity/user_activity.classes.php");
require_once("../admin_logs/admin_action.classes.php");

session_start();

if (isset($_SESSION['userID'])) {
    $_SESSION['user_activity'][] = new UserActivity("Admin", "Logged Out", date("Y-m-d h:i:sa"));
}

if (isset($_SESSION['adminID'])) {
    $_SESSION['admin_logs'][] = new AdminAction($adminID, "Logged Out", date("Y-m-d h:i:sa"), "No Further Details");
}

unset($_SESSION['userID']);
unset($_SESSION['adminID']);
unset($_SESSION['username']);



header("location: ../home/index.php");

?>