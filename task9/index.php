<?php
function printReversedTriangle($n) {
    for ($i = $n; $i >= 1; $i--) {
        for ($j = $i; $j >= 1; $j--) {
            echo $j;
        }
        echo "\n";
    }
}

// Example usage with n=5
printReversedTriangle(5);
