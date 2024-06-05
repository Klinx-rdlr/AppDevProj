<?php 
    include_once "../home/header.php";
    require_once "rent.php";
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
            <th>Title</th>
            <th>Format</th>
            <th>Return Date</th>
            
        </tr>
        <?php foreach($_SESSION['current_rents'][$_SESSION['userID']] as $rent): ?>
            <tr>
                <td> <?php echo $rent['Title'] ?> </td>
                <td> <?php echo $rent['Item_Type'] ?> </td>
                <td> <?php echo $rent['Return_Date'] ?> </td>
                <td> <button> Return </button> </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>