<?php 
    include_once('../home/header.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    <div class="container mt-5">
        <div class="row" style="margin: auto; border: 1px solid black; width: 800px">
            <div class="col">
                <p style="padding: 0px; font-size: 28px;" class="text-center">GENRE</p>
                <div class="border bg-dark mb-5" style="margin: auto; width: 700px">
                    <div class="mt-4"></div>
                    <?php foreach ($_SESSION['genre_categories'] as $genre): ?>
                    <div class="mb-2 text-center">
                        <a href="video_list.php?genre=<?php echo htmlspecialchars($genre); ?>"
                            class="btn btn-outline-light btn-block"
                            style="width: 400px"><?php echo htmlspecialchars($genre); ?></a>
                    </div>
                    <?php endforeach; ?>
                    <div class="mb-4"></div>
                </div>
            </div>
        </div>
    </div>
</body>


</html>