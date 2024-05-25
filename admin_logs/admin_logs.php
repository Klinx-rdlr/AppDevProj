<?php 
    session_start();

    if (!isset($_SESSION['admin_logs'])) {
        $_SESSION['admin_logs'] = [];
    }

?>