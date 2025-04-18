<h3><?= isset($pendaftaranData) ? 'Edit Status' : 'Tambah' ?> Pendaftaran</h3>

<form action="index.php?page=pendaftaran&action=<?= isset($pendaftaranData) ? 'update_status&id=' . $pendaftaranData['id'] : 'store' ?>" method="post">
    <?php if (!isset($pendaftaranData)): ?>
    <div>
        <label for="peserta_id">Pilih Peserta:</label>
        <select id="peserta_id" name="peserta_id" required>
            <option value="">Pilih Peserta</option>
            <?php foreach ($semuaPeserta as $peserta): ?>
            <option value="<?= $peserta['id'] ?>"><?= htmlspecialchars($peserta['nama']) ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div>
        <label for="kursus_id">Pilih Kursus:</label>
        <select id="kursus_id" name="kursus_id" required>
            <option value="">Pilih Kursus</option>
            <?php foreach ($semuaKursus as $kursus): ?>
            <option value="<?= $kursus['id'] ?>"><?= htmlspecialchars($kursus['nama_kursus']) ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <?php else: ?>
    <div>
        <label>Peserta: <?= htmlspecialchars($pendaftaranData['nama_peserta']) ?></label><br>
        <label>Kursus: <?= htmlspecialchars($pendaftaranData['nama_kursus']) ?></label>
    </div>
    
    <div>
        <label for="status">Status Pendaftaran:</label>
        <select id="status" name="status" required>
            <option value="Menunggu" <?= $pendaftaranData['status'] == 'Menunggu' ? 'selected' : '' ?>>Menunggu</option>
            <option value="Dikonfirmasi" <?= $pendaftaranData['status'] == 'Dikonfirmasi' ? 'selected' : '' ?>>Dikonfirmasi</option>
            <option value="Ditolak" <?= $pendaftaranData['status'] == 'Ditolak' ? 'selected' : '' ?>>Ditolak</option>
        </select>
    </div>
    <?php endif; ?>

    <div>
        <button type="submit"><?= isset($pendaftaranData) ? 'Update Status' : 'Tambah Pendaftaran' ?></button>
        <a href="index.php?page=pendaftaran">Batal</a>
    </div>
</form>