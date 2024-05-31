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
body {
    font-family: Poppins, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

header {
    background-color: #333;
    color: #fff;
    padding: 10px 0;
    text-align: center;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px 0;
    background: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

table,
th,
td {
    border: 1px solid #ccc;
}

th,
td {
    padding: 12px;
    text-align: left;
}

th {
    background-color: #333;
    color: #fff;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}

button,
input[type="submit"] {
    background-color: #333;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    margin: 10px 0;
}

button:hover,
input[type="submit"]:hover {
    background-color: #555;
}

img {
    border-radius: 8px;
}

a {
    color: #333;
    text-decoration: none;
    margin: 0 10px;
}

a:hover {
    text-decoration: underline;
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
</body>

</html>