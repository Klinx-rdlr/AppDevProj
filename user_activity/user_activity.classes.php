<?php 
    class UserActivity {
        /* 
            A class that contains all the functions that are related to user activity
        */ 

        private $user;
        private $activity;
        private $date_time;
        private $details;

        public function __construct($user, $activity, $date_time, $details="") {
            $this->user = $user;
            $this->activity = $activity;   
            $this->date_time = $date_time; 
            $this->details = $details;
        }

        public function get_user() {
            return $this->user;
        }

        public function get_activity() {
            return $this->activity;
        }
        
        public function get_date_time() {
            return $this->date_time;
        }

        public function get_details() {
            return $this->details;
        }

    } 

?>