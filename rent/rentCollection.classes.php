<?php 
   class rentCollection {
    private $rentTracker;
    private $rentList;

    public function __construct() {
        $this->rentTracker = 0;
        $this->rentList = array();
    }

    public function addRentVideo($video) {
        $this->rentList[] = $video; 
        $this->rentTracker++;
    }

    public function getRentList() {
        return $this->rentList;
    }

    public function getRentTracker() {
        return $this->rentTracker;
    }

    public function removeRentVideo($index){
        if (isset($this->rentList[$index])) {
            unset($this->rentList[$index]);
        }
    }
}
   
?>