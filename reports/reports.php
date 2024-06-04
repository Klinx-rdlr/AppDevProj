<?php 
include_once "../home/header.php";
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<body>
    <div class="card p-0 mt-4" style="width: 600px; margin: auto;">
        <div class="card-header p-0">
            <p class="p-0 text-center mt-2 mb-2" style="font-size: 22px;"> REPORTS </p>
        </div>

        <div class="card-body">
            <div class="d-flex flex-column align-items-center justify-content-center">
                <div class="d-flex">
                    <i class="bi bi-gear-wide-connected mr-3" style="font-size: 2rem"></i>
                    <a class="btn btn-block btn-dark pt-2" style="width: 200px;" href="admin_logs.php"> Admin Log </a>
                </div>
                <div class="d-flex mt-2">
                    <i class="bi bi-clipboard2-pulse mr-3" style="font-size: 2rem"></i>
                    <a class="btn btn-block btn-dark pt-2" style="width: 200px;" href="inventory_status.php"> Inventory
                        Status </a>
                </div>
                <div class="d-flex mt-2">
                    <i class="bi bi-cart-check mr-3" style="font-size: 2rem"></i>
                    <a class="btn btn-block btn-dark pt-2" style="width: 200px;" href="rental_stats.php"> Rental
                        Statistics </a>
                </div>

                <div class="d-flex mt-2">
                    <i class="bi bi-person-fill-gear mr-3" style="font-size: 2rem"></i>
                    <a class="btn btn-block btn-dark pt-2" style="width: 200px;" href="user_activity.php"> User Activity
                    </a>
                </div>

                <div class="d-flex mt-2">
                    <i class="bi bi-coin mr-3" style="font-size: 2rem"></i>
                    <a class="btn btn-block btn-dark pt-2" style="width: 200px;" href="financial_reports.php"> Financial
                        Reports </a>
                </div>


                <div class="d-flex mt-2">
                    <i class="bi bi-house mr-3" style="font-size: 2rem"></i>
                    <a class="btn btn-block btn-dark pt-2" style="width: 200px;" href="../home/index.php"> Home </a>
                </div>



            </div>
        </div>

        <div class="card-footer">

        </div>

    </div>
</body>

</html>