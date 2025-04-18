<?php
require_once 'class/Peserta.php';
require_once 'class/Kursus.php';
require_once 'class/Pendaftaran.php';

$peserta = new Peserta();
$kursus = new Kursus();
$pendaftaran = new Pendaftaran();

// Handle aksi CRUD untuk Peserta
if (isset($_GET['page']) && $_GET['page'] == 'peserta') {
    $action = isset($_GET['action']) ? $_GET['action'] : '';
    
    switch ($action) {
        case 'store':
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $nama = $_POST['nama'];
                $email = $_POST['email'];
                $no_telepon = $_POST['no_telepon'];
                $asal_sekolah = $_POST['asal_sekolah'];
                $tanggal_lahir = $_POST['tanggal_lahir'];
                
                $peserta->createPeserta($nama, $email, $no_telepon, $asal_sekolah, $tanggal_lahir);
                header('Location: index.php?page=peserta');
                exit;
            }
            break;
            
        case 'update':
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['id'])) {
                $id = $_GET['id'];
                $nama = $_POST['nama'];
                $email = $_POST['email'];
                $no_telepon = $_POST['no_telepon'];
                $asal_sekolah = $_POST['asal_sekolah'];
                $tanggal_lahir = $_POST['tanggal_lahir'];
                
                $peserta->updatePeserta($id, $nama, $email, $no_telepon, $asal_sekolah, $tanggal_lahir);
                header('Location: index.php?page=peserta');
                exit;
            }
            break;
            
        case 'delete':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $peserta->deletePeserta($id);
                header('Location: index.php?page=peserta');
                exit;
            }
            break;

        case 'search':
            if (isset($_GET['keyword'])) {
                $keyword = $_GET['keyword'];
                $hasilPencarian = $peserta->searchPeserta($keyword);
                include 'view/peserta.php';
                exit;
            }
            break;
    }
}

// Handle aksi CRUD untuk Kursus
if (isset($_GET['page']) && $_GET['page'] == 'kursus') {
    $action = isset($_GET['action']) ? $_GET['action'] : '';
    
    switch ($action) {
        case 'store':
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $nama_kursus = $_POST['nama_kursus'];
                $deskripsi = $_POST['deskripsi'];
                $harga = $_POST['harga'];
                $kuota = $_POST['kuota'];
                
                $kursus->createKursus($nama_kursus, $deskripsi, $harga, $kuota);
                header('Location: index.php?page=kursus');
                exit;
            }
            break;
            
        case 'update':
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['id'])) {
                $id = $_GET['id'];
                $nama_kursus = $_POST['nama_kursus'];
                $deskripsi = $_POST['deskripsi'];
                $harga = $_POST['harga'];
                $kuota = $_POST['kuota'];
                
                $kursus->updateKursus($id, $nama_kursus, $deskripsi, $harga, $kuota);
                header('Location: index.php?page=kursus');
                exit;
            }
            break;
            
        case 'delete':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $kursus->deleteKursus($id);
                header('Location: index.php?page=kursus');
                exit;
            }
            break;

        case 'search':
            if (isset($_GET['keyword'])) {
                $keyword = $_GET['keyword'];
                $hasilPencarian = $kursus->searchKursus($keyword);
                include 'view/kursus.php';
                exit;
            }
            break;
    }
}

// Handle aksi CRUD untuk Pendaftaran
if (isset($_GET['page']) && $_GET['page'] == 'pendaftaran') {
    $action = isset($_GET['action']) ? $_GET['action'] : '';
    
    switch ($action) {
        case 'store':
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $peserta_id = $_POST['peserta_id'];
                $kursus_id = $_POST['kursus_id'];
                
                $pendaftaran->createPendaftaran($peserta_id, $kursus_id);
                header('Location: index.php?page=pendaftaran');
                exit;
            }
            break;
            
        case 'update_status':
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['id'])) {
                $id = $_GET['id'];
                $status = $_POST['status'];
                
                $pendaftaran->updateStatusPendaftaran($id, $status);
                header('Location: index.php?page=pendaftaran');
                exit;
            }
            break;
            
        case 'delete':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $pendaftaran->deletePendaftaran($id);
                header('Location: index.php?page=pendaftaran');
                exit;
            }
            break;

        case 'search':
            if (isset($_GET['keyword'])) {
                $keyword = $_GET['keyword'];
                $hasilPencarian = $pendaftaran->searchPendaftaran($keyword);
                include 'view/pendaftaran.php';
                exit;
            }
            break;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kursus UTBK Skibidih</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'view/header.php'; ?>
    <main>
        <h2>Menu Kursus UTBK Skibidih</h2>
        <nav>
            <a href="?page=peserta">Peserta</a> |
            <a href="?page=kursus">Kursus</a> |
            <a href="?page=pendaftaran">Pendaftaran</a>
        </nav>

        <?php
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
            
            if ($page == 'peserta') {
                $action = isset($_GET['action']) ? $_GET['action'] : '';
                
                if ($action == 'add') {
                    include 'view/peserta_form.php';
                } 
                elseif ($action == 'edit' && isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $pesertaData = $peserta->getPesertaById($id);
                    include 'view/peserta_form.php';
                }
                else {
                    $dataPeserta = $peserta->getAllPeserta();
                    include 'view/peserta.php';
                }
            }
            elseif ($page == 'kursus') {
                $action = isset($_GET['action']) ? $_GET['action'] : '';
                
                if ($action == 'add') {
                    include 'view/kursus_form.php';
                } 
                elseif ($action == 'edit' && isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $kursusData = $kursus->getKursusById($id);
                    include 'view/kursus_form.php';
                }
                else {
                    $dataKursus = $kursus->getAllKursus();
                    include 'view/kursus.php';
                }
            }
            elseif ($page == 'pendaftaran') {
                $action = isset($_GET['action']) ? $_GET['action'] : '';
                
                if ($action == 'add') {
                    $semuaPeserta = $peserta->getAllPeserta();
                    $semuaKursus = $kursus->getAllKursus();
                    include 'view/pendaftaran_form.php';
                } 
                elseif ($action == 'edit' && isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $pendaftaranData = $pendaftaran->getPendaftaranById($id);
                    $semuaPeserta = $peserta->getAllPeserta();
                    $semuaKursus = $kursus->getAllKursus();
                    include 'view/pendaftaran_form.php';
                }
                else {
                    $dataPendaftaran = $pendaftaran->getAllPendaftaran();
                    include 'view/pendaftaran.php';
                }
            }
        }
        ?>
    </main>
    <?php include 'view/footer.php'; ?>
</body>
</html>