<?php 
    class Rent {
        private $video; 
        private $purchase_date;
        private $due_date;
       

        public function __construct($video, $purchase_date, $due_date) {
            $this->video = $video;
            $this->purchase_date = $purchase_date;
            $this->due_date = $due_date;
        }

        public function get_video() {
            return $this->video; 
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