<?php

include_once "../home/header.php";
if (!isset($_SESSION["video_revenue"])) {
    $_SESSION["video_revenue"] = array();
}
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.0/chart.min.js"
    integrity="sha512-GMGzUEevhWh8Tc/njS0bDpwgxdCJLQBWG3Z2Ct+JGOpVnEmjvNx6ts4v6A2XJf1HOrtOsfhv3hBKpK9kE5z8AQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<body>
    <div class="row mt-2" style="width: 800px; margin: auto;">
        <canvas class="mt-5" id="barChart" height="200" width="700" style="border: 1px solid black"> </canvas>
    </div>
    <div class="row mt-3" style="width: 900px; margin: auto;">
        <!-- <pre> <?php var_dump($_SESSION['video_revenue']); ?> </pre> -->
        <table class="table table-bordered">
            <thead class="text-center">
                <th class="bg-dark">Title</th>
                <th class="bg-dark">DVDs Sold</th>
                <th class="bg-dark">Blu-rays Sold</th>
                <th class="bg-dark">UHDs Sold</th>
                <th class="bg-dark">Digital Sold</th>
                <th class="bg-dark"> Total Revenue </th>
            </thead>
            <?php
            $movies = [];
            $movies_revenue = [];
            foreach ($_SESSION['video_revenue'] as $title => $formats): 
            $movies[] = $title?>
            <?php $total_revenue = 0; ?>
            <tbody class="text-center">
                <tr>
                    <td><?php echo $title ?></td>
                    <?php foreach ($formats as $format => $quantity): ?>
                    <?php 
                            if ($format == "DVD") {
                                $total_revenue += $quantity * 49.99;
                            } elseif ($format == "Blu-ray") {
                                $total_revenue += $quantity * 99.99;
                            } elseif ($format == "UHD") {
                                $total_revenue += $quantity * 149.99;
                            } elseif ($format == "Digital") {
                                $total_revenue += $quantity * 99.99;
                            }
                        ?>
                    <td><?php echo $quantity ?></td>
                    <?php endforeach; ?>
                    <td> ₱<?php echo $total_revenue; ?> </td>
                </tr>
                <?php $movies_revenue[] = $total_revenue;
             endforeach; ?>
            </tbody>
        </table>
    </div>
    <!-- <input id="movies" type="hidden" value="<?php echo json_encode($movies); ?>">
    <input id="movies_revenue" type="hidden" value="<?php echo json_encode($movies_revenue); ?>"> -->

    <script>
    var movies = <?php echo json_encode($movies); ?>;
    var moviesRevenue = <?php echo json_encode($movies_revenue); ?>;
    </script>


    <script src="financial_reports.js"></script>
</body>


</html>