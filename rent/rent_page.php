<?php
require_once "../video/video.classes.php";
include_once "../home/header.php";
$index = $_GET["index"];
$title = $_SESSION['video_collection'][$index]->get_title();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $version = $_POST['version_option'];
    $video = $_SESSION['video_collection'][$index];
    $no_copies = 0;

    switch ($version) {
        case "blu_ray":
            $no_copies = $video->get_blu_ray();
            break;
        case "digital":
            $no_copies = $video->get_digital();
            break;
        case "uhd":
            $no_copies = $video->get_uhd();
            break;
        case "dvd":
            $no_copies = $video->get_dvd();
            break;
        default:
            $no_copies = 0;
            break;
    }
}

?>

<div class="rent card" style="width: 400px; margin: 100px auto;">
    <div class="card-header">
        <h3 class="text-center"> RENT </h3>
    </div>
    <form action="rent_page.php?index=<?php echo $index?>" method="post">
        <div class="card-body">
            <label for=""> Version: </label>
            <select class="form-select" name="version_option">
                <option>
                    ----Options----</option>
                <option value="blu_ray" <?php if (isset($version) && $version == 'blu_ray') echo 'selected'; ?>>
                    Blu-Ray
                </option>
                <option value="digital" <?php if (isset($version) && $version == 'digital') echo 'selected'; ?>> Digital
                </option>
                <option value="dvd" <?php if (isset($version) && $version == 'dvd') echo 'selected'; ?>>
                    DVD
                </option>
                <option value="uhd" <?php if (isset($version) && $version== 'uhd') echo 'selected'; ?>>
                    UHD
                </option>
            </select>
            <input class="btn btn-block btn-dark mt-3" type="submit" value="Choose">
    </form>


    <form action="rent_page.inc.php?index=<?php echo $index ?>" method="post">
        <?php
        if (isset($_POST['version_option'])) {
            $container = "
                <div class=\"form-group\">
                <label class=\"mt-3\" for=\"\"> No. of available copies: $no_copies </label>
                <input type=\"hidden\" name=\"type\" value=\"$version\" required>
                <input type=\"hidden\" name=\"title\" value=\"$title\" required>
                <input class=\"form-control\" type=\"text\" name=\"copies\" required>
                </div>
                <input class=\"btn btn-block btn-dark\" type=\"submit\" value=\"Submit\">";
                echo $container;
            }
    ?>

    </form>
</div>