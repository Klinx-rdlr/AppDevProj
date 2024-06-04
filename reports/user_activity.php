<?php 
    require_once("../user_activity/user_activity.classes.php");
    include_once "../home/header.php";
    
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

    th,
    td {
        border: 1px solid black;
        text-align: left;
        padding: 8px;
    }
    </style>
</head>

<body>

    <div class="row mt-5" style="width: 1000px; margin: auto;">
        <?php if (empty($_SESSION["user_activity"])): ?>
        <?php else: ?>
        <table class="table table-bordered">
            <tr>
                <th class="bg-dark">Username</th>
                <th class="bg-dark">Activity</th>
                <th class="bg-dark">Date & Time</th>
            </tr>
            <?php foreach($_SESSION["user_activity"] as $activity): ?>
            <tr>
                <td><?php echo $activity->get_user(); ?></td>
                <td><?php echo $activity->get_activity(); ?></td>
                <td><?php echo $activity->get_date_time(); ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
        <a class="btn btn-block btn-dark" style="margin: auto; width: 120px;" href="reports.php">Back</a>
    </div>
</body>

</html>