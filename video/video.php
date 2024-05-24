<?php
    class Video {
        private $title; 
        private $genre; 
        private $release_year;
      
        private $copies; 
        
        public function __construct($title, $genre, $release_year, $copies) {
            $this->title = $title;
            $this->genre = $genre;
            $this->release_year = $release_year; 
            $this->copies = $copies;
        }

        public function get_title() {
            return $this->title;
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

        public function set_title($title) {
            $this->title = $title;
        }

        public function set_genre($genre) {
            $this->genre = $genre;
        }

        public function set_release_year($release_year) {
            return $this->release_year = $release_year;
        }

        public function set_copies($copies) {
            return $this->copies = $copies;
        }
    }
?>
