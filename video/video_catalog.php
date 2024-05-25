<?php
    date_default_timezone_set('Asia/Manila');
    require_once('video.classes.php');
    require_once('../admin_logs/admin_logs.php');
    require_once('../admin_logs/admin_action.classes.php');
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if (!isset($_SESSION['video_collection'])) {
        $_SESSION['video_collection'] = [];
    }
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["action"]) && $_POST["action"] == "delete") {
            unset($_SESSION['video_collection']);
            $_SESSION['video_collection'] = [];
        } else {
            $_SESSION['video_collection'][] =  
            new Video($_POST['title'],
                      $_POST['director'],
                      $_POST['genre'],
                      $_POST['year'],
                      $_POST['copies'],
                      $_POST['format']
            );
            $_SESSION['admin_logs'][] = new AdminAction($_SESSION['adminID'], "Added Video", date("Y-m-d h:i:sa"));
        }
       
    }

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

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <!-- <form action="" method="post">

    Title: <input type="text" id="title" name="title" required>
    Genre: <input type="text" id="genre" name="genre" required>
    Year Released: <input type="text" id="year" name="year" minlength='4' maxlength='4' required>
    No. of Copies: <input type="number" id="copies" name="copies" min='1' required>
    Format: <select name="format" id="format" required="required">
        <option value="DVD"> DVD </option>
        <option value="Blu-ray"> Blu-ray </option>
        <option value="Digital"> Digital </option>
    </select>
    <input type="submit" value="Add Video">

    </form> -->

    <button onclick="location.href = 'add_video.php'"> Add Video </button>
    <form action="" method="post">
    <input type="hidden" name="action" value="delete">
    <input type="submit" value="Delete Videos">
    </form>


    <?php if (!empty($_SESSION['video_collection'])): ?>
    <table>
        <tr>
            <th> Title </th>
            <th> Director </th>
            <th> Genre </th>
            <th> Year Released </th>
            <th> No. of Copies </th>
            <th> Format </th>
            <th> Index </th>
        </tr>
    <?php foreach ($_SESSION['video_collection'] as $index => $videos): ?>
    <tr>
        <td> <?php echo $videos->get_title(); ?> </td>
        <td> <?php echo $videos->get_director(); ?> </td> 
        <td> <?php echo $videos->get_genre(); ?> </td>
        <td> <?php echo $videos->get_release_year(); ?> </td>
        <td> <?php echo $videos->get_copies(); ?> </td>
        <td> <?php echo $videos->get_format(); ?> </td>
        <td> <?php echo $index; ?> </td>
        <td> <a href="update_video.php?index=<?php echo $index; ?>"> Edit </a> 
             <a href="delete_video.php?index=<?php echo $index; ?>"> Delete</td>
    </tr>
    <?php endforeach; ?>
    </table>
    <?php endif; ?>
    <a href="../home/index.php">Home</a>
</body>
</html>



