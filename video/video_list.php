<?php 
    include("../home/header.php");

    class Video {
        private $title; 
        private $director;
        private $summary;
        private $starring; 
        private $genre;
        private $release_year;
        private $dvd;
        private $blu_ray; 
        private $uhd;
        private $digital; 
        private $thumbnail; 

        public function __construct($title, $director, $summary, 
            $starring, $genre, $release_year, 
            $dvd, $blu_ray, $uhd, $digital) {
            $this->title = $title;
            $this->director = $director;
            $this->summary = $summary; 
            $this->starring = $starring;
            $this->genre = $genre;
            $this->release_year = $release_year; 
            $this->dvd = $dvd;
            $this->blu_ray = $blu_ray;
            $this->uhd = $uhd; 
            $this->digital = $digital;
        }

        public function get_title() {
            return $this->title;
        }

        public function get_director() {
            return $this->director; 
        }

        public function get_summary() {
            return $this->summary; 
        }

        public function get_starring() {
            return $this->starring; 
        }

        public function get_genre() {
            return $this->genre; 
        }

        public function get_release_year() {
            return $this->release_year; 
        }

        public function get_dvd() {
            return $this->dvd;
        }
    
        public function get_blu_ray() {
            return $this->blu_ray; 
        }

        public function get_uhd() {
            return $this->uhd;
        }

        public function get_digital() {
            return $this->digital;
        }

        public function get_thumbnail() {
            return $this->thumbnail;
        }

        public function set_title($title) {
            $this->title = $title;
        }

        public function set_director($director) {
            $this->director = $director; 
        }
        
        public function set_summary($summary) {
            $this->summary = $summary; 
        }

        public function set_starring($starring) {
            $this->starring = $starring; 
        }

        public function set_genre($genre) {
            $this->genre = $genre;
        }

        public function set_release_year($release_year) {
            $this->release_year = $release_year;
        }

        public function set_dvd($dvd) {
            $this->dvd = $dvd;
        }

        public function set_blu_ray($blu_ray) {
            $this->blu_ray = $blu_ray;
        }

        public function set_uhd($uhd) {
            $this->uhd = $uhd;
        }

        public function set_digital($digital) {
            $this->digital = $digital;
        }

        public function set_thumbnail($thumbnail) {
            $this->thumbnail = $thumbnail;
        }

        public function is_set_thumbnail() {
            return isset($this->thumbnail);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    body {
        color: black;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    table,
    th,
    td {
        border: 2px solid black;
    }

    th,
    td {
        padding: 10px;
        text-align: left;
        color: black;
    }

    th {
        background-color: #f2f2f2;
        color: black;
    }
    </style>
</head>

<body>
    <h1 class="text-center"> <?php echo $_GET['genre']; ?> </h1>
    <table class="mt-3" style="width: 1000px; margin: auto">

        <tr>
            <th>Images</th>
            <th>Title</th>
            <th>Director</th>
        </tr>

        <?php foreach($_SESSION['video_collection'] as $index => $video): ?>
        <?php if (strtolower($video->get_genre()) == strtolower($_GET['genre'])): ?>
        <tr>
            <td> <img src="<?php echo $video->get_thumbnail(); ?>" alt="image" width="100" height="100"> </td>
            <td> <?php echo $video->get_title(); ?> </td>
            <td> <?php echo $video->get_director(); ?> </td>
            <td> <a href="video_details.php?index=<?php echo $index; ?>"> View Details </a> </td>
        </tr>
        <?php endif; ?>
        <?php endforeach; ?>
    </table>
</body>

</html>