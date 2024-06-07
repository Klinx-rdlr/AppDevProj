<?php

    date_default_timezone_set('Asia/Manila');
    include_once('video.classes.php');
    require_once('../admin_logs/admin_action.classes.php');
    include_once "../home/header.php";

    if (!isset($_SESSION['video_collection'])) {
        $_SESSION['video_collection'] = [];
    }
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["action"]) && $_POST["action"] == "delete") {
            unset($_SESSION['video_collection']);
            $_SESSION['video_collection'] = [];
        } 
    }

?>
</head>


<body>
    <div class="row" style="padding: 0px 40px 0px 40px; margin: auto;">
        <div class="col-6 p-0 ml-5" style="width: 600px;">
            <div class="card p-0 mt-4" style="margin: auto;">
                <div class="card-header p-0">
                    <p class="p-0 text-center mt-2 mb-2" style="font-size: 22px;"> VIDEO CATAGLOG </p>
                </div>

                <div class="card-body" style="margin: auto;">
                    <div>
                        <button class="btn btn-block btn-dark" style="width: 250px;"
                            onclick="location.href = 'add_video.php'">
                            Add
                            Video </button>
                        <form action="" method="post">
                            <input type="hidden" name="action" value="delete">
                            <input class="btn btn-block btn-dark mt-2" type="submit" value="Delete Videos">
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6" style="width: 900px">
            <div class="card mt-4 p-0">
                <div class="card-header">
                    <p class="p-0 text-center mt-2 mb-2" style="font-size: 22px;">
                        VIDEO LIST
                    </p>
                </div>

                <div class="card-body">
                    <?php if (!empty($_SESSION['video_collection'])): ?>
                    <table class="table tabler-bordered">
                        <tr class="text-center">
                            <th class="bg-dark"> Image </th>
                            <th class="bg-dark"> Title </th>
                            <th class="bg-dark"> Director </th>
                            <th class="bg-dark"> Genre </th>
                            <th class="bg-dark"> Year Released </th>
                            <th class="bg-dark"> DVD </th>
                            <th class="bg-dark"> Blu-ray </th>
                            <th class="bg-dark"> UHD </th>
                            <th class="bg-dark"> Digital </th>
                            <th class="bg-dark">
                                Options
                            </th>
                        </tr>
                        <?php foreach ($_SESSION['video_collection'] as $index => $videos): ?>
                        <tr class="text-center">
                            <td>

                                <?php if ($videos->is_set_thumbnail()): ?>
                                <img src="<?php echo $videos->get_thumbnail(); ?>" height='100' width='100'>
                                <?php else: ?>
                                <img src="../thumbnails/no_poster_available.jpg" height='100' width='100'>
                                <?php endif; ?>

                            </td>
                            <td> <?php echo $videos->get_title(); ?> </td>
                            <td> <?php echo $videos->get_director(); ?> </td>
                            <td> <?php echo $videos->get_genre(); ?> </td>
                            <td> <?php echo $videos->get_release_year(); ?> </td>
                            <td> <?php echo $videos->get_dvd(); ?> </td>
                            <td> <?php echo $videos->get_blu_ray(); ?> </td>
                            <td> <?php echo $videos->get_uhd(); ?> </td>
                            <td> <?php echo $videos->get_digital(); ?> </td>

                            <!-- EDIT VIDEO TEST -->
                            <td> <a href="edit_video_test.php?index=<?php echo $index; ?>"> Edit </a>
                                <a class="ml-1" href="delete_video.php?index=<?php echo $index; ?>"> Delete
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                    <?php else: ?>
                    <p class="mt-2 p-0 text-center" style="color: red;"> No Videos Available </p>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </div>



</body>

</html>