<?php
class StudentGrader {

    public function encryptName($name) {
        $encrypted = '';
        for ($i = 0; $i < strlen($name); $i++) {
            $char = $name[$i];
            if (ctype_alpha($char)) {
                $encrypted .= chr(ord($char) + 1);
            } else {
                $encrypted .= $char;
            }
        }
        return $encrypted;
    }

    public function decryptName($encryptedName) {
        $decrypted = '';
        for ($i = 0; $i < strlen($encryptedName); $i++) {
            $char = $encryptedName[$i];
            if (ctype_alpha($char)) {
                $decrypted .= chr(ord($char) - 1);
            } else {
                $decrypted .= $char;
            }
        }
        return $decrypted;
    }
}

// Example usage:
$grader = new StudentGrader();

// Encryption/Decryption demo
$original = "Andi";
$encrypted = $grader->encryptName($original);
$decrypted = $grader->decryptName($encrypted);

echo "Original: $original\n";
echo "Encrypted: $encrypted\n";
echo "Decrypted: $decrypted\n";
