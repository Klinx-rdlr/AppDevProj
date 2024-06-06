<?php
    include_once "../video/video.classes.php";
    include_once "../home/header.php";
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Status</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid black;
            text-align: left;
            padding: 8px;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <th>Title</th>
            <th>Avail. DVD</th>
            <th>Avail. Blu-ray</th>
            <th>Avail. UHD </th>
            <th>Avail. Digital </th>
        </tr>
        <?php foreach ($_SESSION['video_collection'] as $video): ?>
        <tr> 
            <td><?php echo $video->get_title(); ?></td>
            <td><?php echo $video->get_dvd(); ?></td>
            <td><?php echo $video->get_blu_ray(); ?></td>
            <td><?php echo $video->get_uhd(); ?></td>
            <td><?php echo $video->get_digital(); ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>