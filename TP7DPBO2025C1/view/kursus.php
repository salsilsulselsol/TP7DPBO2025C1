<!-- Tambahkan CSS langsung -->
<link rel="stylesheet" href="../style.css?v=2">

<h2>Daftar Kursus</h2>

<!-- Tombol Kembali -->
<a href="index.php?page=kursus" class="btn btn-primary mb-3">Kembali ke Menu Utama</a>
<a href="index.php?page=kursus&action=add" class="btn btn-primary mb-3">Tambah Kursus Baru</a>

<!-- Form Pencarian -->
<form action="index.php" method="get" class="mb-3">
    <input type="hidden" name="page" value="kursus">
    <input type="hidden" name="action" value="search">
    <div class="form-group" style="display: inline-block;">
        <input type="text" name="keyword" 
               placeholder="Cari kursus..." 
               value="<?= isset($_GET['keyword']) ? htmlspecialchars($_GET['keyword']) : '' ?>">
    </div>
    <button type="submit" class="btn btn-success">Cari</button>
</form>

<!-- Tabel Data -->
<table>
    <tr>
        <th>ID</th>
        <th>Nama Kursus</th>
        <th>Deskripsi</th>
        <th>Harga</th>
        <th>Kuota</th>
        <th>Aksi</th>
    </tr>
    <?php 
    // Menentukan sumber data (pencarian atau data utama)
    $data = $hasilPencarian ?? $dataKursus;
    
    foreach ($data as $k): 
    ?>
    <tr>
        <td><?= htmlspecialchars($k['id']) ?></td>
        <td><?= htmlspecialchars($k['nama_kursus']) ?></td>
        <td><?= htmlspecialchars($k['deskripsi']) ?></td>
        <td><?= htmlspecialchars($k['harga']) ?></td>
        <td><?= htmlspecialchars($k['kuota']) ?></td>
        <td>
            <a href="index.php?page=kursus&action=edit&id=<?= $k['id'] ?>" 
               class="btn btn-primary btn-sm">Edit</a>
            <a href="index.php?page=kursus&action=delete&id=<?= $k['id'] ?>" 
               class="btn btn-danger btn-sm" 
               onclick="return confirm('Yakin ingin menghapus kursus ini?')">Hapus</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>