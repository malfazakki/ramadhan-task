<?php
function customTitleCase($string) {
    $result = '';
    $capitalizeNext = true;

    for ($i = 0; $i < strlen($string); $i++) {
        $char = $string[$i];

        if ($capitalizeNext && ctype_alpha($char)) {
            $result .= strtoupper($char);
            $capitalizeNext = false;
        } else {
            $result .= strtolower($char);
        }

        if ($char === ' ') {
            $capitalizeNext = true;
        }
    }

    return $result;
}

// Test cases
echo customTitleCase("DAUN YANG JATUH TAK AKAN MENYALAHKAN ANGIN") . "\n";
echo customTitleCase("laut bercerita") . "\n";
echo customTitleCase("NeGeRi AntAH BerAntAH") . "\n";

/* Output:
Daun Yang Jatuh Tak Akan Menyalahkan Angin
Laut Bercerita
Negeri Antah Berantah
*/
