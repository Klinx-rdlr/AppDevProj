<?php  
    class AdminAction {
        private $admin_id; 
        private $action_type;
        private $date; 

        public function __construct($admin_id, $action_type, $date) {
            $this->admin_id = $admin_id;
            $this->action_type = $action_type;
            $this->date = $date; 
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
    }

?> 