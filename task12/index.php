<?php
abstract class BangunDatar {
    abstract public function hitungLuas();
}

class Persegi extends BangunDatar {
    private $sisi;

    public function __construct($sisi) {
        $this->sisi = $sisi;
    }

    public function hitungLuas() {
        return $this->sisi * $this->sisi;
    }
}

class Lingkaran extends BangunDatar {
    private $jariJari;

    public function __construct($jariJari) {
        $this->jariJari = $jariJari;
    }

    public function hitungLuas() {
        return 3.14 * $this->jariJari * $this->jariJari;
    }
}

// Example usage
$persegi = new Persegi(5);
$lingkaran = new Lingkaran(7);

echo "Luas Persegi: " . $persegi->hitungLuas() . "\n";
echo "Luas Lingkaran: " . $lingkaran->hitungLuas() . "\n";
