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
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid black;
            text-align: left;
            padding: 8px;
        }

    </style>
</head>
<body>
    <table>
        <tr>
            <th>Username</th>
            <th>Activity</th>
            <th>Date & Time</th>
        </tr>
        <?php foreach($_SESSION["user_activity"] as $activity): ?>
            <tr>
                <td><?php echo $activity->get_user(); ?></td>
                <td><?php echo $activity->get_activity(); ?></td>
                <td><?php echo $activity->get_date_time(); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <a href="reports.php"> Go back </a>
</body>
</html>