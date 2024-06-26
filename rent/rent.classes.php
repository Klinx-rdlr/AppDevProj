<?php


class rent {
    private $videoTitle; 
    private $purchase_date;
    private $duration;
    private $due_date;
    private $item;

    public function __construct($videoTitle, $duration, $item) {
        $this->videoTitle = $videoTitle;
        $this->duration = $duration;
        $this->item = $item;
        $this->purchase_date = new DateTime(); // Save as DateTime object

        $due_date = clone $this->purchase_date; // Clone to avoid modifying the original
        $due_date->modify("+$duration days");
        $this->due_date = $due_date;
    }

    public function get_item(){
        return $this->item;
    }

    public function get_video() {
        return $this->videoTitle; 
    }

    public function get_purchase_date() {
        return $this->purchase_date;
    }

    public function get_due_date() {
        return $this->due_date;
    }

    public function get_status() {
        $current_date = date('Y/m/d');
        
        if ($current_date > $this->due_date) {
            return "Overdue";    
        } else {
            return "Active";
        }
    }
}

?>