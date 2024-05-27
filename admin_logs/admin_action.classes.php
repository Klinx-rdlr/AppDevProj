<?php  
    class AdminAction {
        private $admin_id; 
        private $action_type;
        private $date; 
        private $details; 

        public function __construct($admin_id, $action_type, $date, $details) {
            $this->admin_id = $admin_id;
            $this->action_type = $action_type;
            $this->date = $date; 
            $this->details = $details;
        }

        public function get_admin_id() {
            return $this->admin_id;
        }

        public function get_action_type() {
            return $this->action_type; 
        }

        public function get_date() {
            return $this->date; 
        }

        public function get_details() {
            return $this->details; 
        }
    }

?> 