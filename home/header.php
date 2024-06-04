<?php
    session_start();
    define('BASE_URL', 'http://localhost/appdevproj/');

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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>home/header.css">
    <link rel=" stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <style>
    body,
    html {
        width: 100%;
    }

    a.head {
        font-weight: 400;
        text-decoration: none;
        color: #f2f2f2;
    }
    </style>
    <div class="header" style="width: 100%; background-color: #232f3e;">

        <div class="nav-container d-flex justify-content-center align-items-center" style="width: 100%;  height: 50px">
            <div class="home d-flex" style="margin-right: 380px">
                <a href="/appdevproj/home/index.php" class="head mr-4">HOME</a>
                <a href="/appdevproj/video/browse_category.php" class="head mr-4"> CATEGORIES </a>
                <a href="/appdevproj/rent/rental_history.php" class="head mr4-"> RENTAL HISTORY </a>
            </div>
            <div class="search" style="margin-right: 380px">
            </div>

            <div class="register">

                <?php
               if(isset($_SESSION["userID"])){
                echo '<span class="d-flex align-items-center">';
                echo '<div class="dropdown">';
                echo '  <button class="dropbtn"> '. $_SESSION["username"] . '</button>';
                echo '  <div class="dropdown-content">';
                echo '    <a href="/appdevproj/profile/profile.php"> Profile </a>';
                echo '    <a href="/appdevproj/profile/payment_settings/payment.php"> Payment Settings </a>';
                echo '    <a href="/appdevproj/profile/purchase.php"> Purchase History </a>';
                echo '  </div>';
                echo '</div>';
                echo '<button onclick="location.href = \'/appdevproj/cart/cart.php\';"> CART </button>';
                echo '<button onclick="location.href = \'../log_in/logout.inc.php\';"> LOGOUT </button>';
                echo '</span>';
             } elseif(isset($_SESSION["adminID"])){
                if($_SESSION["adminID"] == 1){
                echo '<button onclick="location.href= \'../video/video_catalog.php\';"> VIDEO CATALOG </button>';
                echo '<button onclick="location.href = \'../profile/profile.php\';"> SETTINGS </button>';
                echo '<button onclick="location.href = \'../reports/reports.php\';"> REPORTS </button>';
                echo '<button onclick="location.href = \'../log_in/logout.inc.php\';"> LOGOUT </button>';
                }
             }
             else {
                 echo '<button onclick="location.href = \'../sign_in/signin.php\';"> SIGN IN </button>';
                 echo '<button onclick="location.href = \'../log_in/login.php\';"> LOG IN </button>';
             }             
                ?>
            </div>
        </div>
    </div>

    <div class="content-body" style="background-color: white; height: 1000px;">