<?php
    session_start();
    define('BASE_URL', 'http://localhost/appdevproj/');
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

        <div class="nav-container d-flex justify-content-center align-items-center"
            style="width: 100%; border: 2px solid red; height: 50px">
            <div class="home d-flex" style="margin-right: 380px">
                <a href="/appdevproj/home/index.php" class="head mr-4">HOME</a>
                <a href="" class="head mr-4"> CATEGORIES </a>
                <a href="" style="" class="head"> VIDEO </a>
            </div>
            <div class="search" style="margin-right: 380px">
                <input type="text" placeholder="search video here..">
            </div>

            <div class="register">

                <?php
               if(isset($_SESSION["userID"])){
                echo '<span class="d-flex align-items-center">';
                echo '<p class="" style="margin: 0; color: white;"> Welcome! </p>';
                echo '<div class="dropdown">';
                echo '  <button class="dropbtn"> '. $_SESSION["username"] . '</button>';
                echo '  <div class="dropdown-content">';
                echo '    <a href="../profile/profile.php"> Profile </a>';
                echo '    <a href="../profile/payment_settings/payment.php"> Payment Settings </a>';
                echo '    <a href="#"> Purchase History </a>';
                echo '  </div>';
                echo '</div>';
                echo '<button onclick="location.href = \'../profile/profile.php\';"> CART </button>';
                echo '<button onclick="location.href = \'../log_in/logout.inc.php\';"> LOGOUT </button>';
                echo '</span>';
             } elseif(isset($_SESSION["adminID"])){
                if($_SESSION["adminID"] == 1){
                echo '<button onclick="location.href = \'../profile/profile.php\';"> SETTINGS </button>';
                echo '<button onclick="location.href = \'../profile/profile.php\';"> REPORTS </button>';
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

    <div class="content-body" style="background-color: black; height: 1000px; border:2px solid green">