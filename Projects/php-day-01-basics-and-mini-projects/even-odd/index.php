<?php

$number = 6; // You can change this value to test

// Check if the input is numeric
if (!is_numeric($number)) {
    echo "Error: Input is not a number.";
} else {
    // Convert to integer (in case it's a float string or float)
    $number = (int)$number;

    // Check for zero
    if ($number === 0) {
        echo "0 is neither odd nor even.";
    } else {
        // Determine if even or odd
        if ($number % 2 == 0) {
            echo $number . " is even.";
        } else {
            echo $number . " is odd.";
        }

        // Additional info about positivity or negativity
        if ($number > 0) {
            echo " It is positive.";
        } else {
            echo " It is negative.";
        }
    }
}
?>
