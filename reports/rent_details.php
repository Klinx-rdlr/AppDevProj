<?php 
    require_once("../user_activity/user_activity.classes.php");
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
        $rent_activity = $_SESSION['user_activity'][$_GET['index']];
    ?>

    <h1>Rent Details</h1>
    <?php echo $rent_activity->get_details(); ?>
</body>
</html>