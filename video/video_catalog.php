<?php
    require_once('video.php');
    session_start();

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
                      $_POST['genre'],
                      $_POST['year'],
                      $_POST['copies']
            );

        }
       
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
    
        Title: <input type="text" id="title" name="title" required>
        Genre: <input type="text" id="genre" name="genre" required>
        Year Released: <input type="text" id="year" name="year" minlength='4' maxlength='4' required >
        No. of Copies: <input type="number" id="copies" name="copies" min='1' required>
        <input type="submit" value="Add Video">
      
    </form>

    <form action="" method="post">
        <input type="hidden" name="action" value="delete">
        <input type="submit" value="Delete Videos">
    </form>


    <?php if (!empty($_SESSION['video_collection'])): ?>
        <table>
        <?php foreach ($_SESSION['video_collection'] as $videos): ?>
            <tr> 
                <td> <?php echo $videos->get_title(); ?> </td> 
                <td> <?php echo $videos->get_genre(); ?> </td>
                <td> <?php echo $videos->get_release_year(); ?> </td>
                <td> <?php echo $videos->get_copies(); ?> </td>
            </tr>
        <?php endforeach; ?>
        </table>
    <?php endif; ?>
</body>
</html>
