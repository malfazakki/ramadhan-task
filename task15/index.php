<?php
function generateFibonacci($n) {
    $fibonacci = [];
    if ($n >= 1) {
        $fibonacci[] = 0;
    }
    if ($n >= 2) {
        $fibonacci[] = 1;
    }

    for ($i = 2; $i < $n; $i++) {
        $fibonacci[] = $fibonacci[$i - 1] + $fibonacci[$i - 2];
    }

    return $fibonacci;
}

// Input: Generate first 10 Fibonacci numbers
$input = 10;
$fibSequence = generateFibonacci($input);

// Output the result
echo implode(',', $fibSequence);
