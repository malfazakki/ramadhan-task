<?php
interface BangunRuang {
    public function hitungVolume();
}

class Kubus implements BangunRuang {
    private $sisi;

    public function __construct($sisi) {
        $this->sisi = $sisi;
    }

    public function hitungVolume() {
        return round(pow($this->sisi, 3), 2);
    }
}

class Bola implements BangunRuang {
    private $jariJari;

    public function __construct($jariJari) {
        $this->jariJari = $jariJari;
    }

    public function hitungVolume() {
        return round((4 / 3) * 3.14 * pow($this->jariJari, 3), 2);
    }
}

// Example usage
$kubus = new Kubus(5);
$bola = new Bola(7);

echo "Volume Kubus: " . $kubus->hitungVolume() . "\n";
echo "Volume Bola: " . $bola->hitungVolume() . "\n";
