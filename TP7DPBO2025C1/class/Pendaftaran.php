<?php
require_once 'config/db.php';

class Pendaftaran {
    private $db;

    public function __construct() {
        $this->db = (new Database())->conn;
    }

    public function getAllPendaftaran() {
        $stmt = $this->db->query("
            SELECT p.*, ps.nama AS nama_peserta, k.nama_kursus 
            FROM pendaftaran p
            JOIN peserta ps ON p.peserta_id = ps.id
            JOIN kursus k ON p.kursus_id = k.id
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getPendaftaranById($id) {
        $stmt = $this->db->prepare("
            SELECT p.*, ps.nama AS nama_peserta, k.nama_kursus 
            FROM pendaftaran p
            JOIN peserta ps ON p.peserta_id = ps.id
            JOIN kursus k ON p.kursus_id = k.id
            WHERE p.id = :id
        ");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function createPendaftaran($peserta_id, $kursus_id) {
        // Cek apakah peserta sudah terdaftar di kursus ini
        $stmt = $this->db->prepare("
            SELECT COUNT(*) FROM pendaftaran 
            WHERE peserta_id = :peserta_id AND kursus_id = :kursus_id
        ");
        $stmt->bindParam(':peserta_id', $peserta_id, PDO::PARAM_INT);
        $stmt->bindParam(':kursus_id', $kursus_id, PDO::PARAM_INT);
        $stmt->execute();
        
        if ($stmt->fetchColumn() > 0) {
            return false; // Sudah terdaftar
        }

        $query = "INSERT INTO pendaftaran (peserta_id, kursus_id) 
                  VALUES (:peserta_id, :kursus_id)";
        $stmt = $this->db->prepare($query);
        
        $stmt->bindParam(':peserta_id', $peserta_id, PDO::PARAM_INT);
        $stmt->bindParam(':kursus_id', $kursus_id, PDO::PARAM_INT);
        
        return $stmt->execute();
    }
    
    public function updateStatusPendaftaran($id, $status) {
        $query = "UPDATE pendaftaran SET status = :status WHERE id = :id";
        $stmt = $this->db->prepare($query);
        
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':status', $status, PDO::PARAM_STR);
        
        return $stmt->execute();
    }
    
    public function deletePendaftaran($id) {
        $query = "DELETE FROM pendaftaran WHERE id = :id";
        $stmt = $this->db->prepare($query);
        
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        
        return $stmt->execute();
    }

    // Fungsi searching
    public function searchPendaftaran($keyword) {
        $query = "SELECT p.*, ps.nama AS nama_peserta, k.nama_kursus 
                  FROM pendaftaran p
                  JOIN peserta ps ON p.peserta_id = ps.id
                  JOIN kursus k ON p.kursus_id = k.id
                  WHERE ps.nama LIKE :keyword 
                  OR k.nama_kursus LIKE :keyword";
        $stmt = $this->db->prepare($query);
        
        $searchKeyword = "%$keyword%";
        $stmt->bindParam(':keyword', $searchKeyword, PDO::PARAM_STR);
        
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>