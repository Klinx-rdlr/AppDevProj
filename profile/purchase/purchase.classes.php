<?php

class purchase{
    private $movieTitle;
    private $purchase_date;
    private $return_date;

    public function __construct($title, $duration){
        $this->movieTitle = $title;
        $this->purchase_date = new DateTime(); 
        $return_date = clone $this->purchase_date; 
        $return_date->modify("+$duration days");
        $this->return_date = $return_date;
    }

    public function get_movie(){
        return $this->movieTitle;
    }
    public function get_purchase(){
        return $this->purchase_date;
    }
    public function get_due(){
        return $this->return_date;
    }
}