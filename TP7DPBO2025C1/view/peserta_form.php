<h3><?= isset($pesertaData) ? 'Edit' : 'Tambah' ?> Peserta</h3>

<form action="index.php?page=peserta&action=<?= isset($pesertaData) ? 'update&id=' . $pesertaData['id'] : 'store' ?>" method="post">
    <div>
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" 
               value="<?= isset($pesertaData) ? htmlspecialchars($pesertaData['nama']) : '' ?>" required>
    </div>

    <div>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" 
               value="<?= isset($pesertaData) ? htmlspecialchars($pesertaData['email']) : '' ?>" required>
    </div>

    <div>
        <label for="no_telepon">No Telepon:</label>
        <input type="tel" id="no_telepon" name="no_telepon" 
               value="<?= isset($pesertaData) ? htmlspecialchars($pesertaData['no_telepon']) : '' ?>" required>
    </div>

    <div>
        <label for="asal_sekolah">Asal Sekolah:</label>
        <input type="text" id="asal_sekolah" name="asal_sekolah" 
               value="<?= isset($pesertaData) ? htmlspecialchars($pesertaData['asal_sekolah']) : '' ?>" required>
    </div>

    <div>
        <label for="tanggal_lahir">Tanggal Lahir:</label>
        <input type="date" id="tanggal_lahir" name="tanggal_lahir" 
               value="<?= isset($pesertaData) ? htmlspecialchars($pesertaData['tanggal_lahir']) : '' ?>" required>
    </div>

    <div>
        <button type="submit"><?= isset($pesertaData) ? 'Update' : 'Tambah' ?> Peserta</button>
        <a href="index.php?page=peserta">Batal</a>
    </div>
</form>