<?php
    class Video {
        private $title; 
        private $director;
        private $summary;
        private $starring; 
        private $genre;
        private $release_year;
        private $copies; 
        private $format;
        private $thumbnail; 

        public function __construct($title, $director, $summary, 
        $starring, $genre, $release_year, $copies, $format) {
            $this->title = $title;
            $this->director = $director;
            $this->summary = $summary; 
            $this->starring = $starring;
            $this->genre = $genre;
            $this->release_year = $release_year; 
            $this->copies = $copies;
            $this->format = $format;
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

        public function get_copies() {
            return $this->copies; 
        }

        public function get_format() {
            return $this->format;
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

        public function set_copies($copies) {
            $this->copies = $copies;
        }

        public function set_format($format) {
            $this->format = $format;   
        }

        public function set_thumbnail($thumbnail) {
            $this->thumbnail = $thumbnail;
        }

        public function is_set_thumbnail() {
            return isset($this->thumbnail);
        }
    }
?>
