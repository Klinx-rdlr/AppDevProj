<?php
class VideoItem {
    private $dvd_copies;
    private $uhd_copies;
    private $digital_copies;
    private $blu_ray_copies;

    public function __construct($dvd, $uhd, $digital, $bluray) {
        $this->dvd_copies = $dvd;
        $this->uhd_copies = $uhd;
        $this->digital_copies = $digital;
        $this->blu_ray_copies = $bluray;
    }

    public function get_dvd(){
        return $this->dvd_copies;
    }
    public function get_uhd(){
        return $this->uhd_copies;
    }
    public function get_digital(){
        return $this->digital_copies;
    }
    public function get_blu_ray(){
        return $this->blu_ray_copies;
    }
}