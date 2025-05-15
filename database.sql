-- Buat database
CREATE DATABASE IF NOT EXISTS db_bukutamu;
USE db_bukutamu;

-- Buat tabel buku_tamu dengan index
CREATE TABLE buku_tamu (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nama VARCHAR(100) NOT NULL,
    instansi VARCHAR(100) NOT NULL,
    tujuan TEXT NOT NULL,
    tanggal DATE NOT NULL,
    waktu TIME NOT NULL,
    INDEX(nama),
    INDEX(instansi)
);

-- Contoh data dummy
INSERT INTO buku_tamu (nama, instansi, tujuan, tanggal, waktu) VALUES
('John Doe', 'PT. Contoh', 'Konsultasi kurikulum', CURDATE(), CURTIME()),
('Jane Smith', 'Sekolah ABC', 'Studi banding', CURDATE(), CURTIME());