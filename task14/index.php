<?php
function factorial($n) {
    if ($n <= 1) {
        return 1;
    }
    return $n * factorial($n - 1);
}

// Example usage with input 5
$input = 5;
$result = factorial($input);
echo "{$input}! = {$result}";
?>