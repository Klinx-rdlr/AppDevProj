<?php
session_start();
unset($_SESSION['userID']);
unset($_SESSION['adminID']);
unset($_SESSION['username']);

header("location: ../home/index.php");