<?php
    include_once "../video/video.classes.php";
    include_once "../home/header.php";
    
?>


<div class="row mt-5" style="width: 900px; margin: auto;">
    <table class="table table-bordered">
        <thead class="text-center">
            <th class="bg-dark">Title</th>
            <th class="bg-dark">Avail. DVD</th>
            <th class="bg-dark">Avail. Blu-ray</th>
            <th class="bg-dark">Avail. UHD </th>
            <th class="bg-dark">Avail. Digital </th>

        </thead>

        <tbody class="text-center">
            <?php foreach ($_SESSION['video_collection'] as $video): ?>
            <tr>
                <td><?php echo $video->get_title(); ?></td>
                <td><?php echo $video->get_dvd(); ?></td>
                <td><?php echo $video->get_blu_ray(); ?></td>
                <td><?php echo $video->get_uhd(); ?></td>
                <td><?php echo $video->get_digital(); ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <button class="btn btn-block bg-olive" onclick="location.href='/appdevproj/reports/reports.php'"
        style="width: 200px; margin-left: 340px;"> Go
        Back </button>

</div>


</html>