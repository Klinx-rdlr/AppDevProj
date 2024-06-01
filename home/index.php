<?php
    require_once "../video/video.classes.php";
    include_once "header.php";

    if (!isset($_SESSION['genre_categories'])) {
        $_SESSION['genre_categories'] = array(
            "action", 
            "drama",
            "comedy",
            "adventure",
            "horror",
            'sci-fi',
            'fantasy',
            'historical', 
            'animation',
            'romance'
        );
    }

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

<style>
body {
    color: black;
}

table {
    width: 100%;
    border-collapse: collapse;
}

table,
th,
td {
    border: 1px solid black;
}

th,
td {
    padding: 10px;
    text-align: left;
}

th {
    background-color: #f2f2f2;
    color: black;
}
</style>


<div class="video-container" style="width: 100%; margin: 10px;">
    <div style="margin-left: 700px">
        <form action="" method="get">
            <select id="search_criteria" name="search_criteria">
                <option value="title"> Filter </option>
                <option value="year">year</option>
                <option value="genre">genre</option>
                <option value="director">director</option>
                <option value="default"> default </option>
            </select>

            <input type="text" id="search_value" name="search_value" required="required"
                placeholder="search videos here">
        </form>
    </div>
</div>
<?php if (!$filtered_search): ?>
<?php if (empty($_SESSION['video_collection'])): ?>

<?php else: ?>
<table class="mt-4" style="width: 1000px; margin: auto">
    <tr>
        <th class="text-center">Image</th>
        <th class="text-center"> Title</th>
        <th class="text-center">Director</th>
    <tr>
        <?php foreach($_SESSION['video_collection'] as $index => $video): ?>
    <tr>
        <td class="text-center">
            <?php if (!$video->is_set_thumbnail()): ?>
            <img src="../thumbnails/no-poster-available.jpg" alt="Image" width="100" height="100">
            <?php else: ?>
            <img src="<?php echo $video->get_thumbnail(); ?>" alt="Image" width="100" height="100">
            <?php endif; ?>
        </td>
        <td class="text-center"> <?php echo $video->get_title(); ?> </td>
        <td class="text-center"> <?php echo $video->get_director(); ?> </td>
        <td class="text-center"> <a href="../video/video_details.php?index=<?php echo $index; ?>"> View Details </a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
<?php endif; ?>
<?php else: ?>
<?php if (empty($search_results)): ?>
<p class="text-center" style="color: red"> No results found </p>
<?php else: ?>
<table>
    <tr>
        <th>Image</th>
        <th>Title</th>
        <th>Director</th>
    </tr>
    <?php foreach($search_results as $index => $video): ?>
    <tr>
        <td>
            <?php if (!$video->is_set_thumbnail()): ?>
            <img src="../thumbnails/no-poster-available.jpg" alt="Image" width="100" height="100">
            <?php else: ?>
            <img src="<?php echo $video->get_thumbnail(); ?>" alt="Image" width="100" height="100">
            <?php endif; ?>
        </td>
        <td> <?php echo $video->get_title(); ?> </td>
        <td> <?php echo $video->get_director(); ?> </td>
        <td> <a href="../video/video_details.php?index=<?php echo $index; ?>"> View Details </a> </td>
    </tr>
    <?php endforeach; ?>
</table>
<?php endif; ?>
<?php endif; ?>
</body>

</html>