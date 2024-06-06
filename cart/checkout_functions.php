<?php

function generateItemRows($items) {
    $itemRows = "";

    foreach ($items as $item) {
        $itemRows .= "Title: {$item['Title']}\n";
        $itemRows .= "Duration: {$item['Duration']} days\n";
        $itemRows .= "Due: {$item['Due']}\n";

        $itemDetails = $item['Item'];
        foreach ($itemDetails as $type => $details) {
            $quantity = $details['Quantity'];
            $price = number_format($details['Price'], 2); 

            if ($quantity > 0) {
                $itemRows .= "\tType: $type, Copies: $quantity, Price: $$price\n";
            }
        }
        $itemRows .= str_repeat("-", 40) . "\n\n"; // lines
    }

    return $itemRows;
}

?>