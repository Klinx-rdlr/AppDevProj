<?php
session_start();
unset($_SESSION['userID']);
unset($_SESSION['adminID']);
unset($_SESSION['username']);
#session_destroy();
header("location: ../home/index.php");

?>