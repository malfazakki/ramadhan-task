<?php
function isPrime($num) {
    if ($num <= 1) return false;
    if ($num == 2) return true;
    if ($num % 2 == 0) return false;

    for ($i = 3; $i <= sqrt($num); $i += 2) {
        if ($num % $i == 0) return false;
    }
    return true;
}

function findPrimesInRange($start, $end) {
    $primes = [];
    for ($i = $start; $i <= $end; $i++) {
        if (isPrime($i)) {
            $primes[] = $i;
        }
    }
    return $primes;
}

// Input range
$start = 10;
$end = 30;

// Find primes
$primeNumbers = findPrimesInRange($start, $end);

// Output results
echo implode(', ', $primeNumbers);
echo " (Total: " . count($primeNumbers) . ")\n";
