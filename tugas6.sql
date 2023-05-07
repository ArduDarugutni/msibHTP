 dengan skenario sebagai berikut :

--1. pelanggan memesan didalam table pesanan

--2. dilanjutkan dengan proses pembayaran di table pembayara

--3. didalam table pembayaran tambahkan kolom status_pembayaran

--4. jika pesanan sudah dibayar maka status pembayaran akan berubah menjadi lunas 

--Buatkan trigger dari skenario diatas, tambahkan kolom-kolom yang di perlukan untuk kebutuhan trigger 

CREATE TRIGGER update_status_pembayaran AFTER INSERT ON pembayaran
FOR EACH ROW
BEGIN
  IF EXISTS (SELECT 1 FROM pesanan_bayar WHERE id_pesanan = NEW.id_pesanan) THEN
    UPDATE pesanan_bayar SET status_pembayaran = 'lunas' WHERE id_pesanan = NEW.id_pesanan;
  ELSE
    INSERT INTO pesanan_bayar (id_pesanan, status_pembayaran) VALUES (NEW.id_pesanan, 'lunas');
  END IF;
END;
