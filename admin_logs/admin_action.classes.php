<?php  
    class AdminAction {
        /* 
            A class that represents an action done by an admin.
            Each action made by the admin will be stored in the admin_logs array.
        */ 
        
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