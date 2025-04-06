<?php

class Mahasiswa {
    public $nama;
    public $nim;
    public $nilai;
    public $jurusan;

    public function __construct($nama, $nim, $nilai, $jurusan) {
        $this->nama = $nama;
        $this->nim = $nim;
        $this->nilai = $nilai;
        $this->jurusan = $jurusan;
    }
}

// Function to compare students by nilai (descending) and then by nama (ascending)
function compareMahasiswa($a, $b) {
    // First compare by nilai (descending)
    if ($a->nilai != $b->nilai) {
        return $b->nilai - $a->nilai;
    }
    // If nilai is same, compare by nama (ascending)
    return strcmp($a->nama, $b->nama);
}

// Example usage:
$mahasiswaList = [
    new Mahasiswa("Budi", "12345", 85, "Informatika"),
    new Mahasiswa("Andi", "12346", 85, "Sistem Informasi"),
    new Mahasiswa("Cindy", "12347", 90, "Teknik Elektro"),
    new Mahasiswa("Dedi", "12348", 78, "Teknik Mesin"),
    new Mahasiswa("Andi", "12349", 85, "Teknik Industri")
];

// Sort the array using our custom comparison function
usort($mahasiswaList, 'compareMahasiswa');

// Display the sorted results
foreach ($mahasiswaList as $mhs) {
    echo "Nama: {$mhs->nama}, NIM: {$mhs->nim}, Nilai: {$mhs->nilai}, Jurusan: {$mhs->jurusan}\n";
}
