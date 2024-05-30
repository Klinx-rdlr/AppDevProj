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

<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table,
th,
td {
    border: 1px solid black;
}

th,
td {
    padding: 10px;
    text-align: left;
}

th {
    background-color: #f2f2f2;
}
</style>

<body>
    <button onclick="location.href = 'add_video.php'"> Add Video </button>
    <form action="" method="post">
        <input type="hidden" name="action" value="delete">
        <input type="submit" value="Delete Videos">
    </form>



    <?php if (!empty($_SESSION['video_collection'])): ?>
    <table>
        <tr>
            <th> Image </th>
            <th> Title </th>
            <th> Director </th>
            <th> Genre </th>
            <th> Year Released </th>
            <th> DVD </th>
            <th> Blu-ray </th>
            <th> UHD </th>
            <th> Digital </th>
        </tr>
        <?php foreach ($_SESSION['video_collection'] as $index => $videos): ?>
        <tr>
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
            <td> <a href="update_video.php?index=<?php echo $index; ?>"> Edit </a>
                <a href="delete_video.php?index=<?php echo $index; ?>"> Delete
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    <a href="../home/index.php">Home</a>
</body>

</html>