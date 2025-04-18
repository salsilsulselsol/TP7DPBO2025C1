# TP7DPBO2025C1
Tugas Praktikum 7 Dasar Pemrograman Berbasis Objek 2025 C1

# Sistem Pendaftaran Kursus UTBK SKibidih

## Prasyarat
- PHP 8.0 atau lebih tinggi
- MySQL/MariaDB
- Web Server (Apache/Nginx)
- Browser modern (Chrome, Firefox, Safari, Edge)
- Composer (opsional)
- Git (untuk kontrol versi)

## Desain Program

Tema yang dipilih adalah Sistem Pendaftaran Kursus UTBK, dibangun menggunakan arsitektur Object-Oriented Programming (OOP) dengan PHP native. Menggunakan PHP Data Objects (PDO) untuk koneksi database yang lebih aman dan prepared statements yang mencegah SQL injection.

### Struktur Database
Program menggunakan tiga tabel utama:

1. **Peserta**
   - `id` (Primary Key)
   - `nama`
   - `email`
   - `no_telepon`
   - `asal_sekolah`
   - `tanggal_lahir`

2. **Kursus**
   - `id` (Primary Key)
   - `nama_kursus`
   - `deskripsi`
   - `harga`
   - `kuota`

3. **Pendaftaran**
   - `id` (Primary Key)
   - `peserta_id` (Foreign Key ke Peserta)
   - `kursus_id` (Foreign Key ke Kursus)
   - `tanggal_daftar`
   - `status`

### Struktur Proyek
```
├── class/
│   ├── Peserta.php
│   ├── Kursus.php
│   └── Pendaftaran.php
├── config/
│   └── db.php
├── view/
│   ├── peserta.php
│   ├── peserta_form.php
│   ├── kursus.php
│   ├── kursus_form.php
│   ├── pendaftaran.php
│   ├── pendaftaran_form.php
│   ├── header.php
│   └── footer.php
├── index.php
└── style.css
```

## Alur Program

1. Buka halaman utama
2. Pilih menu Peserta, Kursus, atau Pendaftaran
3. Lakukan CRUD (tambah, lihat, ubah, hapus)
4. Bisa menggunakan pencarian data juga untuk setiap menu

## Dokumentasi
<Soon>
