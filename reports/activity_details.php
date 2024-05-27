<?php 
    require_once "../admin_logs/admin_action.classes.php";
    session_start(); 
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        $log = $_SESSION['admin_logs'][$_GET['index']];
    ?>

    <h1>Details</h1>
    <p>Admin ID: <?php echo $log->get_admin_id(); ?></p>
    <p>Activity: <?php echo $log->get_action_type(); ?></p>
    <p>Date & Time: <?php echo $log->get_date(); ?></p>
    <p>Details: <?php echo $log->get_details(); ?></p>
    <a href="admin_logs.php">Back</a>
</body>
</html>