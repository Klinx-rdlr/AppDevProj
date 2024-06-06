<?php

include_once "../home/header.php";
if (!isset($_SESSION["video_revenue"])) {
    $_SESSION["video_revenue"] = array();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Financial Report</title>
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
        <!-- <pre> <?php var_dump($_SESSION['video_revenue']); ?> </pre> -->
        <table>
            <tr>
                <th>Title</th>
                <th>DVDs Sold</th>
                <th>Blu-rays Sold</th>
                <th>UHDs Sold</th>
                <th>Digital Sold</th>
                <th> Total Revenue </th>
            </tr>
            <?php foreach ($_SESSION['video_revenue'] as $title => $formats): ?> 
                <?php $total_revenue = 0; ?>
                <tr>
                    <td><?php echo $title ?></td>
                    <?php foreach ($formats as $format => $quantity): ?>
                        <?php 
                            if ($format == "DVD") {
                                $total_revenue += $quantity * 49.99;
                            } elseif ($format == "Blu-ray") {
                                $total_revenue += $quantity * 99.99;
                            } elseif ($format == "UHD") {
                                $total_revenue += $quantity * 149.99;
                            } elseif ($format == "Digital") {
                                $total_revenue += $quantity * 99.99;
                            }
                        ?>
                        <td><?php echo $quantity ?></td>
                    <?php endforeach; ?>
                    <td> ₱<?php echo $total_revenue; ?> </td>
                </tr>
            <?php endforeach; ?>

        </table>
</body>
</html>