<?php 


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
        color: black;
        text-align: center;
    }

    a {
        background-color: #333;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        margin: 10px;
        text-decoration: none;
        display: inline-block;
        transition: all 0.3s ease 0s;
    }

    a:hover {
        background-color: #555;
        text-decoration: none;
    }
    </style>
</head>

<body>
    <a href="admin_logs.php"> Admin Log </a>
    <a href="inventory_status.php"> Inventory Status </a>
    <a href="rental_stats.php"> Rental Statistics </a>
    <a href="user_activity.php"> User Activity </a>
    <a href="financial_reports.php"> Financial Reports </a>
    <a href="../home/index.php"> Home </a>
</body>

</html>