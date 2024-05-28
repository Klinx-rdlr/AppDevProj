<?php
    class Video {
        private $title; 
        private $director;
        private $genre;
        private $release_year;
        private $copies; 
        private $format; 

        public function __construct($title, $director, $genre, $release_year, $copies, $format) {
            $this->title = $title;
            $this->director = $director;
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

        public function set_title($title) {
            $this->title = $title;
        }

        public function set_director($director) {
            $this->director = $director; 
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
    }
?>