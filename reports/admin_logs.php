<?php
    require_once('../admin_logs/admin_action.classes.php');
    include_once "../home/header.php";
?>


</head>

<body>
    <div class="row mt-5" style="width: 1000px; margin: auto;">
        <table class="table table-bordered">
            <tr>
                <th class="bg-dark">Admin ID</th>
                <th class="bg-dark">Activity</th>
                <th class="bg-dark">Date & Time</th>
                <th class="bg-dark"></th>
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
        <a class="btn btn-block btn-dark" style="margin: auto; width: 120px;" href="reports.php">Back</a>
    </div>

</body>

</html>