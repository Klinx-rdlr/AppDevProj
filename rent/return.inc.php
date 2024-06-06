<?php

require_once "../rent/rent.classes.php";
require_once "../rent/rentCollection.classes.php";
require_once "../rent/VideoItem.classes.php";
require_once "../video/video.classes.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $index = $_POST['index'];
    $movieList = $_SESSION['video_collection'];
    $userID = $_SESSION['userID'];

    if (!isset($_SESSION['profileList'][$userID])) {
        header("Location: return.php?error=user-not-found");
        exit;
    }

    $rentCollection = $_SESSION['profileList'][$userID]['VideosRented'];
    $rentList = $rentCollection->getRentList();

    // Ensure the index exists in the rent list
    if (!isset($rentList[$index])) {
        header("Location: return.php?error=video-not-found");
        exit;
    }

    $videoRent = $rentList[$index];

    $videoTarget = null;

    // Find the video in the movie list
    foreach ($movieList as $movie) {
        if ($movie->get_title() == $videoRent->get_video()) {
            $videoTarget = $movie;
            break; 
        }
    }

    // Handle case where target video was not found
    if ($videoTarget == null) {
        header("Location: return.php?error=video-target-notfound");
        exit;
    } else {
        // Get video copies
        $videoCopies = $videoRent->get_item();

        // Update video copies in the inventory
        $videoTarget->update_dvd($videoCopies->get_dvd());
        $videoTarget->update_digital($videoCopies->get_digital());
        $videoTarget->update_uhd($videoCopies->get_uhd());
        $videoTarget->update_blu_ray($videoCopies->get_blu_ray());

        // Remove the rented video from the user's rent list
        $_SESSION['profileList'][$userID]['VideosRented']->removeRentVideo($index);
        header("Location: /appdevproj/profile/profile.php?error=none");
        exit;
    }
} else {
    header("Location: profile.php?error=server-error");
    exit;
}