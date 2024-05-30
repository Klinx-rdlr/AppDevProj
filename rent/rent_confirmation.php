<?php
include_once "../home/header.php";
$index = $_GET['index'];

echo "<pre>";
print_r($_SESSION['cartList'][$_SESSION['userID']]);
echo "</pre>";

?>


<div class="rent card" style="width: 400px; margin: 100px auto;">
    <div class="card-header">
        <h3 class="text-center"> DO YOU WANT TO ADD MORE? </h3>
    </div>
    <div class="card-body">
        <label for=""> Choose: </label>
        <button class="btn btn-block btn-success mt-3"
            onclick="location.href ='rent_page.php?index=<?php echo $index?>'"> YES </button>
        <button class="btn btn-block btn-danger mt-3" onclick="location.href ='appdevproj/home/header.php'"> NO
        </button>
    </div>
</div>