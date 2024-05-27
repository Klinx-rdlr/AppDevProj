<?php
    require_once "../video/video.classes.php";
    include_once "header.php";

    $filtered_search = False;
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["search_criteria"]) && isset($_GET["search_value"])) {
        $search_criteria = $_GET["search_criteria"];
        $search_value = $_GET["search_value"];
        $search_results = [];

        switch ($search_criteria) {
            case "title":
                foreach($_SESSION['video_collection'] as $video) {
                    if (strpos(strtolower($video->get_title()), strtolower($search_value)) !== false) {
                        $search_results[] = $video;
                    }
                }
                break;
            case "year":
                foreach($_SESSION['video_collection'] as $video) {
                    if ($video->get_release_year() == $search_value) {
                        $search_results[] = $video;
                    }
                }
                break;
            case "genre":
                foreach($_SESSION['video_collection'] as $video) {
                    if (strpos(strtolower($video->get_genre()), strtolower($search_value)) !== false) {
                        $search_results[] = $video;
                    }
                }
                break;
            case "director":
                foreach($_SESSION['video_collection'] as $video) {
                    if (strpos(strtolower($video->get_director()), strtolower($search_value)) !== false) {
                        $search_results[] = $video;
                    }
                }
                break;
            // case "default":
            //     $search_results = $_SESSION['video_collection'];
            //     break;
            
        }

        $filtered_search = True;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            color: #f2f2f2;
        }
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
            color: black;
        }
    </style>
</head>
<body>
    <div class="video-container">
        <form action="" method="get"> 
            Search by:
            <select id="search_criteria" name="search_criteria">
                <option value="title">title</option>
                <option value="year">year</option>
                <option value="genre">genre</option>
                <option value="director">director</option>
                <option value="default"> default </option>
            </select>

            <input type="text" id="search_value" name="search_value" required="required">
        </form>
    </div>
    <?php if (!$filtered_search): ?>
        <?php if (empty($_SESSION['video_collection'])): ?>
            <p> No videos available! </p>
        <?php else: ?>
        <table>
            <tr>
                <th>Title</th>
                <th>Director</th>
                <th>Genre</th>
                <th>Release Year</th>
                <th>Copies</th>
                <th>Format</th>
            <tr>
            <?php foreach($_SESSION['video_collection'] as $video): ?>
                <tr>
                    <td> <?php echo $video->get_title(); ?> </td>
                    <td> <?php echo $video->get_director(); ?> </td>
                    <td> <?php echo $video->get_genre(); ?> </td>
                    <td> <?php echo $video->get_release_year(); ?> </td>
                    <td> <?php echo $video->get_copies(); ?> </td>
                    <td> <?php echo $video->get_format(); ?> </td>
                </tr>
            <?php endforeach; ?> 
        </table>
        <?php endif; ?>
    <?php else: ?>
        <?php if (empty($search_results)): ?>
            <p> No results found </p>
        <?php else: ?>
        <table>
            <tr>
                <th>Title</th>
                <th>Director</th>
                <th>Genre</th>
                <th>Release Year</th>
                <th>Copies</th>
                <th>Format</th>
            </tr>
            <?php foreach($search_results as $video): ?>
                <tr>
                    <td> <?php echo $video->get_title(); ?> </td>
                    <td> <?php echo $video->get_director(); ?> </td>
                    <td> <?php echo $video->get_genre(); ?> </td>
                    <td> <?php echo $video->get_release_year(); ?> </td>
                    <td> <?php echo $video->get_copies(); ?> </td>
                    <td> <?php echo $video->get_format(); ?> </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    <?php endif; ?>
</body>
</html>
