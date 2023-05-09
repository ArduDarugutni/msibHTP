-- Tambahkan kolom pembayaran
MariaDB [dbtoko]> ALTER TABLE pembayaran
    -> ADD COLUMN status_pembayaran varchar(15) DEFAULT 'belum lunas';
Query OK, 0 rows affected (0.077 sec)
Records: 0  Duplicates: 0  Warnings: 0

--TRIGGER
MariaDB [dbtoko]> DELIMITER $$
MariaDB [dbtoko]> CREATE TRIGGER set_status_pembayaran BEFORE INSERT ON pembayaran
    -> FOR EACH ROW
    -> BEGIN
    -> DECLARE total_pembayaran DOUBLE;
    -> DECLARE total_pesanan DOUBLE;
    -> SELECT SUM(jumlah) INTO total_pembayaran FROM pembayaran WHERE pesanan_id = NEW.pesanan_id;
    -> SELECT total INTO total_pesanan FROM pesanan WHERE id = NEW.pesanan_id;
    -> IF total_pembayaran + NEW.jumlah >= total_pesanan THEN
    -> SET NEW.status_pembayaran = 'lunas';
    -> END IF;
    -> END$$
Query OK, 0 rows affected (0.026 sec)

MariaDB [dbtoko]> DELIMITER $$
MariaDB [dbtoko]> CREATE TRIGGER set_status_pembayaran BEFORE INSERT ON pembayaran
    -> FOR EACH ROW
    -> BEGIN
    -> DECLARE total_pembayaran DOUBLE;
    -> DECLARE total_pesanan DOUBLE;
    -> SELECT SUM(jumlah) INTO total_pembayaran FROM pembayaran WHERE pesanan_id = NEW.pesanan_id;
    -> SELECT total INTO total_pesanan FROM pesanan WHERE id = NEW.pesanan_id;
    -> IF total_pembayaran + NEW.jumlah >= total_pesanan THEN
    -> SET NEW.status_pembayaran = 'lunas';
    -> END IF;
    -> END$$
Query OK, 0 rows affected (0.028 sec)

MariaDB [dbtoko]> DELIMITER ;
MariaDB [dbtoko]> INSERT INTO pembayaran (no_kuitansi, tanggal, jumlah, ke, pesanan_id) VALUES
    ->  ('TV01', '2023-01-25', 2000000, 1, 1);
Query OK, 1 row affected (0.073 sec)

MariaDB [dbtoko]> select *from pembayaran;
+----+-------------+------------+----------+----+------------+-------------------+
| id | no_kuitansi | tanggal    |  jumlah  | ke | pesanan_id | status_pembayaran |
+----+-------------+------------+----------+----+------------+-------------------+
|  1 | TV01        | 2023-01-25 |  4000000 |  1 |          1 |  lunas            |
+----+-------------+------------+----------+----+------------+-------------------+
1 row in set (0.002 sec)
