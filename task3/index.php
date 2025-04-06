<?php
class Perpustakaan {
    private $db;

    public function __construct() {
        $this->connectDB();
        $this->createTable();
    }

    private function connectDB() {
        $this->db = new mysqli('localhost', 'root', '', 'perpustakaan');
        if ($this->db->connect_error) {
            die("Connection failed: " . $this->db->connect_error);
        }
    }

    private function createTable() {
        $sql = "CREATE TABLE IF NOT EXISTS buku (
            id INT AUTO_INCREMENT PRIMARY KEY,
            judul VARCHAR(255) NOT NULL,
            penulis VARCHAR(255) NOT NULL,
            tahun_terbit INT NOT NULL
        )";
        $this->db->query($sql);
    }

    public function tambahBuku($judul, $penulis, $tahun_terbit) {
        $stmt = $this->db->prepare("INSERT INTO buku (judul, penulis, tahun_terbit) VALUES (?, ?, ?)");
        $stmt->bind_param("ssi", $judul, $penulis, $tahun_terbit);
        return $stmt->execute();
    }

    public function daftarBuku($keyword = '') {
        $query = "SELECT * FROM buku";
        if (!empty($keyword)) {
            $query .= " WHERE judul LIKE ? OR penulis LIKE ?";
            $keyword = "%$keyword%";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param("ss", $keyword, $keyword);
        } else {
            $stmt = $this->db->prepare($query);
        }

        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }
}

// Example usage:
$perpustakaan = new Perpustakaan();

// Add books
$perpustakaan->tambahBuku("Laskar Pelangi", "Andrea Hirata", 2005);
$perpustakaan->tambahBuku("Bumi Manusia", "Pramoedya Ananta Toer", 1980);

// List all books
$buku = $perpustakaan->daftarBuku();
print_r($buku);

// Search books
$hasilPencarian = $perpustakaan->daftarBuku("Pelangi");
print_r($hasilPencarian);
