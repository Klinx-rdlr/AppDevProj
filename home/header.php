<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <link rel="stylesheet"
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

        <div class="nav-container d-flex justify-content-center align-items-center"
            style="width: 100%; border: 2px solid red; height: 50px">
            <div class="home d-flex" style="margin-right: 400px">
                <a href="../home/index.php" class="head mr-4"> HOME </a>
                <a href="" class="head mr-4"> CATEGORIES </a>
                <a href="" style="" class="head"> VIDEO </a>
            </div>
            <div class="search" style="margin-right: 400px">
                <input type="text" placeholder="search video here..">
            </div>

            <div class="register">

                <?php
               if(isset($_SESSION["userID"])){
                echo '<button onclick="location.href = \'../profile/profile.php\';"> PROFILE </button>';
                echo '<button onclick="location.href = \'../log_in/logout.inc.php\';"> LOGOUT </button>';
             } else {
                 echo '<button onclick="location.href = \'../sign_in/signin.php\';"> SIGN IN </button>';
                 echo '<button onclick="location.href = \'../log_in/login.php\';"> LOG IN </button>';
             }             
                ?>
            </div>
        </div>
    </div>

    <div class="content-body" style="background-color: #000014; height: 1000px; border:2px solid green">