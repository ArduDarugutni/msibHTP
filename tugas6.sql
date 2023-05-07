-- Membuat table pesanan
CREATE TABLE pesanan (
    id_pesanan INT AUTO_INCREMENT PRIMARY KEY,
    nama_pelanggan VARCHAR(100),
    total_pembayaran DECIMAL(10, 2),
    status_pesanan VARCHAR(20)
);

-- Membuat table pembayaran
CREATE TABLE pembayaran (
    id_pembayaran INT AUTO_INCREMENT PRIMARY KEY,
    id_pesanan INT,
    jumlah_pembayaran DECIMAL(10, 2),
    tanggal_pembayaran DATE,
    status_pembayaran VARCHAR(20)
);

-- Menambahkan kolom status_pembayaran di table pembayaran
ALTER TABLE pembayaran
ADD COLUMN status_pembayaran VARCHAR(20);

-- Membuat trigger untuk mengubah status_pembayaran menjadi 'lunas' jika pesanan sudah dibayar
DELIMITER //
CREATE TRIGGER update_status_pembayaran
AFTER INSERT ON pembayaran
FOR EACH ROW
BEGIN
    DECLARE total_pembayaran DECIMAL(10, 2);
    SELECT total_pembayaran INTO total_pembayaran FROM pesanan WHERE id_pesanan = NEW.id_pesanan;
    IF NEW.jumlah_pembayaran >= total_pembayaran THEN
        UPDATE pembayaran SET status_pembayaran = 'lunas' WHERE id_pembayaran = NEW.id_pembayaran;
    END IF;
END//
DELIMITER ;
