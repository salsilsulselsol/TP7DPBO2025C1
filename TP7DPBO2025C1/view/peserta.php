<link rel="stylesheet" href="../style.css">

<h2>Daftar Peserta</h2>

<!-- Tombol Kembali -->
<a href="index.php?page=peserta" class="btn btn-primary mb-3">Kembali ke Menu Utama</a>
<a href="index.php?page=peserta&action=add" class="btn btn-primary mb-3">Tambah Peserta Baru</a>

<!-- Form Pencarian -->
<form action="index.php" method="get" class="mb-3">
    <input type="hidden" name="page" value="peserta">
    <input type="hidden" name="action" value="search">
    <div class="form-group" style="display: inline-block;">
        <input type="text" name="keyword" 
               placeholder="Cari peserta..." 
               value="<?= isset($_GET['keyword']) ? htmlspecialchars($_GET['keyword']) : '' ?>">
    </div>
    <button type="submit" class="btn btn-success">Cari</button>
</form>

<!-- Tabel Data -->
<table>
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Email</th>
        <th>No Telepon</th>
        <th>Asal Sekolah</th>
        <th>Tanggal Lahir</th>
        <th>Aksi</th>
    </tr>
    <?php 
    // Menentukan sumber data (pencarian atau data utama)
    $data = $hasilPencarian ?? $dataPeserta;
    
    foreach ($data as $p): 
    ?>
    <tr>
        <td><?= htmlspecialchars($p['id']) ?></td>
        <td><?= htmlspecialchars($p['nama']) ?></td>
        <td><?= htmlspecialchars($p['email']) ?></td>
        <td><?= htmlspecialchars($p['no_telepon']) ?></td>
        <td><?= htmlspecialchars($p['asal_sekolah']) ?></td>
        <td><?= htmlspecialchars($p['tanggal_lahir']) ?></td>
        <td>
            <a href="index.php?page=peserta&action=edit&id=<?= $p['id'] ?>" 
               class="btn btn-primary btn-sm">Edit</a>
            <a href="index.php?page=peserta&action=delete&id=<?= $p['id'] ?>" 
               class="btn btn-danger btn-sm" 
               onclick="return confirm('Yakin ingin menghapus peserta ini?')">Hapus</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>