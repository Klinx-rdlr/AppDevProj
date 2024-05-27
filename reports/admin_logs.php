<?php
    require_once('../admin_logs/admin_action.classes.php');
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
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
    </style> 

</head>
<body>
    <table> 
        <tr>
            <th>Admin ID</th>
            <th>Activity</th>
            <th>Date & Time</th>
        </tr>
        <?php foreach ($_SESSION['admin_logs'] as $index => $log): ?>
            <tr>
                <td> <?php echo $log->get_admin_id(); ?> </td>
                <td> <?php echo $log->get_action_type(); ?> </td>
                <td> <?php echo $log->get_date(); ?> </td>
                <td> <a href="activity_details.php?index=<?php echo $index; ?>">Details</a> </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <a href="reports.php">Back</a>
</body>
</html>