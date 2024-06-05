<?php 

    if (!isset($_SESSION['current_rents'])) {
        $_SESSION['current_rents'] = array();
    }

    function add_current_rent($userID, $cart) {
        // add each cart item after checkout to current_rents 
        foreach ($cart['Items'] as $item) {
            $rent = array();
            $rent['Title'] = $item['Title'];
            $rent['Item_Type'] = $item['Item_Type'];
            $rent['Item_No'] = $item['Item_No'];
            $rent['Return_Date'] = date('Y-m-d', strtotime('+' . $item['Duration'] . 'days'));
            if (!isset($_SESSION['current_rents'][$userID])) {
                $_SESSION['current_rents'][$userID] = array();
            }

            $_SESSION['current_rents'][$userID][] = $rent;    
        }
    }
?>