<?php
require_once 'config/db.php';

class Peserta {
    private $db;

    public function __construct() {
        $this->db = (new Database())->conn;
    }

    public function getAllPeserta() {
        $stmt = $this->db->query("SELECT * FROM peserta");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getPesertaById($id) {
        $stmt = $this->db->prepare("SELECT * FROM peserta WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function createPeserta($nama, $email, $no_telepon, $asal_sekolah, $tanggal_lahir) {
        $query = "INSERT INTO peserta (nama, email, no_telepon, asal_sekolah, tanggal_lahir) 
                  VALUES (:nama, :email, :no_telepon, :asal_sekolah, :tanggal_lahir)";
        $stmt = $this->db->prepare($query);
        
        $stmt->bindParam(':nama', $nama, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':no_telepon', $no_telepon, PDO::PARAM_STR);
        $stmt->bindParam(':asal_sekolah', $asal_sekolah, PDO::PARAM_STR);
        $stmt->bindParam(':tanggal_lahir', $tanggal_lahir, PDO::PARAM_STR);
        
        return $stmt->execute();
    }
    
    public function updatePeserta($id, $nama, $email, $no_telepon, $asal_sekolah, $tanggal_lahir) {
        $query = "UPDATE peserta SET 
                  nama = :nama, 
                  email = :email, 
                  no_telepon = :no_telepon, 
                  asal_sekolah = :asal_sekolah, 
                  tanggal_lahir = :tanggal_lahir 
                  WHERE id = :id";
        $stmt = $this->db->prepare($query);
        
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':nama', $nama, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':no_telepon', $no_telepon, PDO::PARAM_STR);
        $stmt->bindParam(':asal_sekolah', $asal_sekolah, PDO::PARAM_STR);
        $stmt->bindParam(':tanggal_lahir', $tanggal_lahir, PDO::PARAM_STR);
        
        return $stmt->execute();
    }
    
    public function deletePeserta($id) {
        $query = "DELETE FROM peserta WHERE id = :id";
        $stmt = $this->db->prepare($query);
        
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        
        return $stmt->execute();
    }

    // Fungsi searching
    public function searchPeserta($keyword) {
        $query = "SELECT * FROM peserta 
                  WHERE nama LIKE :keyword 
                  OR email LIKE :keyword 
                  OR asal_sekolah LIKE :keyword";
        $stmt = $this->db->prepare($query);
        
        $searchKeyword = "%$keyword%";
        $stmt->bindParam(':keyword', $searchKeyword, PDO::PARAM_STR);
        
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>