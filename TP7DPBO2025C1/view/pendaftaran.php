<!-- Tambahkan CSS langsung untuk menghindari duplikasi header -->
<link rel="stylesheet" href="../style.css">

<h2>Daftar Pendaftaran</h2>

<!-- Tombol Kembali -->
<a href="index.php?page=pendaftaran" class="btn btn-primary mb-3">Kembali ke Menu Utama</a>
<a href="index.php?page=pendaftaran&action=add" class="btn btn-primary mb-3">Tambah Pendaftaran Baru</a>

<!-- Form Pencarian -->
<form action="index.php" method="get" class="mb-3">
    <input type="hidden" name="page" value="pendaftaran">
    <input type="hidden" name="action" value="search">
    <div class="form-group" style="display: inline-block;">
        <input type="text" name="keyword" 
               placeholder="Cari pendaftaran..." 
               value="<?= isset($_GET['keyword']) ? htmlspecialchars($_GET['keyword']) : '' ?>">
    </div>
    <button type="submit" class="btn btn-success">Cari</button>
</form>

<!-- Tabel Data -->
<table>
    <tr>
        <th>ID</th>
        <th>Nama Peserta</th>
        <th>Nama Kursus</th>
        <th>Tanggal Daftar</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>
    <?php 
    // Menentukan sumber data (pencarian atau data utama)
    $data = $hasilPencarian ?? $dataPendaftaran;
    
    foreach ($data as $p): 
    ?>
    <tr>
        <td><?= htmlspecialchars($p['id']) ?></td>
        <td><?= htmlspecialchars($p['nama_peserta']) ?></td>
        <td><?= htmlspecialchars($p['nama_kursus']) ?></td>
        <td><?= htmlspecialchars($p['tanggal_daftar']) ?></td>
        <td><?= htmlspecialchars($p['status']) ?></td>
        <td>
            <a href="index.php?page=pendaftaran&action=edit&id=<?= $p['id'] ?>" 
               class="btn btn-warning btn-sm">Ubah Status</a>
            <a href="index.php?page=pendaftaran&action=delete&id=<?= $p['id'] ?>" 
               class="btn btn-danger btn-sm" 
               onclick="return confirm('Yakin ingin menghapus pendaftaran ini?')">Hapus</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>