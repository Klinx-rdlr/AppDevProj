<?php 
    require_once('categories.php');
    session_start(); 
?> 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
     
        .category {
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            height: 15%;
            width: 15%;
            text-align:center;
        }


    </style>
</head>
<body>
    
    <div class="genre">
        <h2> Genre </h2> 
        <?php foreach ($_SESSION['genre_categories'] as $genre): ?>
            <div class="category"> 
            
                <a href="video_list.php?genre=<?php echo $genre; ?>"> <?php echo ucfirst($genre); ?> </a>

            </div>
        <?php endforeach; ?>
    </div> 

    <div class="director"> 
        <h2> Director </h2> 
    </div> 
</body>
</html>