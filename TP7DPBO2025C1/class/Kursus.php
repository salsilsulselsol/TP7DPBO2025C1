<?php
require_once 'config/db.php';

class Kursus {
    private $db;

    public function __construct() {
        $this->db = (new Database())->conn;
    }

    public function getAllKursus() {
        $stmt = $this->db->query("SELECT * FROM kursus");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getKursusById($id) {
        $stmt = $this->db->prepare("SELECT * FROM kursus WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function createKursus($nama_kursus, $deskripsi, $harga, $kuota) {
        $query = "INSERT INTO kursus (nama_kursus, deskripsi, harga, kuota) 
                  VALUES (:nama_kursus, :deskripsi, :harga, :kuota)";
        $stmt = $this->db->prepare($query);
        
        $stmt->bindParam(':nama_kursus', $nama_kursus, PDO::PARAM_STR);
        $stmt->bindParam(':deskripsi', $deskripsi, PDO::PARAM_STR);
        $stmt->bindParam(':harga', $harga, PDO::PARAM_STR);
        $stmt->bindParam(':kuota', $kuota, PDO::PARAM_INT);
        
        return $stmt->execute();
    }
    
    public function updateKursus($id, $nama_kursus, $deskripsi, $harga, $kuota) {
        $query = "UPDATE kursus SET 
                  nama_kursus = :nama_kursus, 
                  deskripsi = :deskripsi, 
                  harga = :harga, 
                  kuota = :kuota 
                  WHERE id = :id";
        $stmt = $this->db->prepare($query);
        
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':nama_kursus', $nama_kursus, PDO::PARAM_STR);
        $stmt->bindParam(':deskripsi', $deskripsi, PDO::PARAM_STR);
        $stmt->bindParam(':harga', $harga, PDO::PARAM_STR);
        $stmt->bindParam(':kuota', $kuota, PDO::PARAM_INT);
        
        return $stmt->execute();
    }
    
    public function deleteKursus($id) {
        $query = "DELETE FROM kursus WHERE id = :id";
        $stmt = $this->db->prepare($query);
        
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        
        return $stmt->execute();
    }

    // Fungsi searching
    public function searchKursus($keyword) {
        $query = "SELECT * FROM kursus 
                  WHERE nama_kursus LIKE :keyword 
                  OR deskripsi LIKE :keyword";
        $stmt = $this->db->prepare($query);
        
        $searchKeyword = "%$keyword%";
        $stmt->bindParam(':keyword', $searchKeyword, PDO::PARAM_STR);
        
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>