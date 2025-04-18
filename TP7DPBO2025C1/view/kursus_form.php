<h3><?= isset($kursusData) ? 'Edit' : 'Tambah' ?> Kursus</h3>

<form action="index.php?page=kursus&action=<?= isset($kursusData) ? 'update&id=' . $kursusData['id'] : 'store' ?>" method="post">
    <div>
        <label for="nama_kursus">Nama Kursus:</label>
        <input type="text" id="nama_kursus" name="nama_kursus" 
               value="<?= isset($kursusData) ? htmlspecialchars($kursusData['nama_kursus']) : '' ?>" required>
    </div>

    <div>
        <label for="deskripsi">Deskripsi:</label>
        <textarea id="deskripsi" name="deskripsi" required><?= isset($kursusData) ? htmlspecialchars($kursusData['deskripsi']) : '' ?></textarea>
    </div>

    <div>
        <label for="harga">Harga:</label>
        <input type="number" id="harga" name="harga" 
               value="<?= isset($kursusData) ? htmlspecialchars($kursusData['harga']) : '' ?>" required>
    </div>

    <div>
        <label for="kuota">Kuota:</label>
        <input type="number" id="kuota" name="kuota" 
               value="<?= isset($kursusData) ? htmlspecialchars($kursusData['kuota']) : '' ?>" required>
    </div>

    <div>
        <button type="submit"><?= isset($kursusData) ? 'Update' : 'Tambah' ?> Kursus</button>
        <a href="index.php?page=kursus">Batal</a>
    </div>
</form>