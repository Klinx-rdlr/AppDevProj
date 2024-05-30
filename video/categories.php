<?php 
    session_start(); 


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


?>