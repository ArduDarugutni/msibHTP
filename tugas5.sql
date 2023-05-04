-- Buat fungsi inputPelanggan(), setelah itu panggil fungsinya
MariaDB [dbtoko]> DELIMITER $$
MariaDB [dbtoko]>  CREATE PROCEDURE inputPelanggan(kode varchar(10), nama_pelanggan varchar(50), jk char(1), tmp_lahir varchar(30), tgl_lahir date, email varchar(30), alamat varchar(40), kartu_id int)
    ->  BEGIN
    -> INSERT INTO pelanggan(kode, nama_pelanggan, jk, tmp_lahir, tgl_lahir, email, alamat, kartu_id) VALUES(kode, nama_pelanggan, jk, tmp_lahir, tgl_lahir, email, alamat, kartu_id);
    -> END
    -> $$
Query OK, 0 rows affected (0.067 sec)

MariaDB [dbtoko]> DELIMITER ;
MariaDB [dbtoko]> CALL inputPelanggan('011107', 'Sandi', 'L', 'Cilacap', '1999-04-05', 'sandi@gmail.com', 'Cilacap', 2);
Query OK, 1 row affected (0.167 sec)

MariaDB [dbtoko]> SELECT * FROM pelanggan;
+----+--------+----------------+------+------------+------------+-----------------------+------------+----------+
| id | kode   | nama_pelanggan | jk   | tmp_lahir  | tgl_lahir  | email                 | alamat     | kartu_id |
+----+--------+----------------+------+------------+------------+-----------------------+------------+----------+
|  1 | 011101 | Agung          | L    | Bandung    | 1997-09-06 | agung@gmail.com       | Bandung    |        1 |
|  2 | 011102 | Pandan Wangi   | P    | Yogyakarta | 1998-08-07 | pandanwangi@gmail.com | Yogyakarta |        2 |
|  3 | 011103 | Sekar          | P    | Kediri     | 2001-09-08 | sekar@gmail.com       | Jakarta    |        3 |
|  4 | 011104 | Suandi         | L    | Jakarta    | 1997-09-08 | suandi@gmail.com      | Bandung    |        1 |
|  5 | 011105 | Pradana        | L    | Jakarta    | 2001-08-01 | pradana@gmail.com     | Medan      |        2 |
|  6 | 011106 | Gayatri Putri  | P    | Jakarta    | 2002-09-01 | gayatri@gmail.com     | Yogyakarta |        1 |
|  7 | 011107 | Sandi          | L    | Cilacap    | 1999-04-05 | sandi@gmail.com       | Cilacap    |        2 |
+----+--------+----------------+------+------------+------------+-----------------------+------------+----------+
7 rows in set (0.009 sec)

-- Buat fungsi showPelanggan(), setelah itu panggil fungsinya
MariaDB [dbtoko]> DELIMITER $$
MariaDB [dbtoko]> CREATE PROCEDURE showPelanggan()
    -> BEGIN
    -> SELECT id, kode, nama_pelanggan, jk, tmp_lahir, tgl_lahir, email, alamat, kartu_id FROM pelanggan;
    -> END $$
Query OK, 0 rows affected (0.008 sec)

MariaDB [dbtoko]> DELIMITER ;
MariaDB [dbtoko]> CALL showPelanggan();
+----+--------+----------------+------+------------+------------+-----------------------+------------+----------+
| id | kode   | nama_pelanggan | jk   | tmp_lahir  | tgl_lahir  | email                 | alamat     | kartu_id |
+----+--------+----------------+------+------------+------------+-----------------------+------------+----------+
|  1 | 011101 | Agung          | L    | Bandung    | 1997-09-06 | agung@gmail.com       | Bandung    |        1 |
|  2 | 011102 | Pandan Wangi   | P    | Yogyakarta | 1998-08-07 | pandanwangi@gmail.com | Yogyakarta |        2 |
|  3 | 011103 | Sekar          | P    | Kediri     | 2001-09-08 | sekar@gmail.com       | Jakarta    |        3 |
|  4 | 011104 | Suandi         | L    | Jakarta    | 1997-09-08 | suandi@gmail.com      | Bandung    |        1 |
|  5 | 011105 | Pradana        | L    | Jakarta    | 2001-08-01 | pradana@gmail.com     | Medan      |        2 |
|  6 | 011106 | Gayatri Putri  | P    | Jakarta    | 2002-09-01 | gayatri@gmail.com     | Yogyakarta |        1 |
|  7 | 011107 | Sandi          | L    | Cilacap    | 1999-04-05 | sandi@gmail.com       | Cilacap    |        2 |
+----+--------+----------------+------+------------+------------+-----------------------+------------+----------+
7 rows in set (0.004 sec)

Query OK, 0 rows affected (0.051 sec)

-- Buat fungsi inputProduk(), setelah itu panggil fungsinya
MariaDB [dbtoko]> DELIMITER $$
MariaDB [dbtoko]> CREATE PROCEDURE inputProduk(kode varchar(10), nama varchar(45), harga_beli double, harga_jual double, stok int, min_stok int, jenis_produk_id int)
    -> BEGIN
    -> INSERT INTO produk(kode, nama, harga_beli, harga_jual, stok, min_stok, jenis_produk_id) VALUES(kode, nama, harga_beli, harga_jual, stok, min_stok, jenis_produk_id);
    -> END $$
Query OK, 0 rows affected (0.004 sec)

MariaDB [dbtoko]> DELIMITER ;
MariaDB [dbtoko]> CALL inputProduk('L001', 'Lampu', 50000, 60000, 20, 10, 1);
Query OK, 1 row affected (0.028 sec)

MariaDB [dbtoko]> SELECT * FROM produk;
+----+------+------------+------------+------------+------+----------+-----------------+
| id | kode | nama       | harga_beli | harga_jual | stok | min_stok | jenis_produk_id |
+----+------+------------+------------+------------+------+----------+-----------------+
|  1 | TV01 | TV         |    3000000 |    4000000 |    3 |        2 |               1 |
|  2 | TV02 | TV 21 Inch |    2000000 |    3000000 |   10 |        3 |               1 |
|  3 | K001 | Kulkas     |    4000000 |    5000000 |   10 |        3 |               1 |
|  4 | M001 | Meja Makan |    1000000 |    2000000 |    4 |        3 |               4 |
|  5 | T001 | Taro       |       4000 |       5000 |    3 |        2 |               2 |
|  7 | L001 | Lampu      |      50000 |      60000 |   20 |       10 |               1 |
+----+------+------------+------------+------------+------+----------+-----------------+
6 rows in set (0.001 sec)


-- Buat fungsi showProduk(), setelah itu panggil fungsinya
MariaDB [dbtoko]> DELIMITER $$
MariaDB [dbtoko]>  CREATE PROCEDURE showProduk1()
    -> BEGIN
    -> SELECT * FROM produk;
    -> END $$
Query OK, 0 rows affected (0.007 sec)

MariaDB [dbtoko]> DELIMITER ;
MariaDB [dbtoko]>  CALL showProduk1;
+----+------+------------+------------+------------+------+----------+-----------------+
| id | kode | nama       | harga_beli | harga_jual | stok | min_stok | jenis_produk_id |
+----+------+------------+------------+------------+------+----------+-----------------+
|  1 | TV01 | TV         |    3000000 |    4000000 |    3 |        2 |               1 |
|  2 | TV02 | TV 21 Inch |    2000000 |    3000000 |   10 |        3 |               1 |
|  3 | K001 | Kulkas     |    4000000 |    5000000 |   10 |        3 |               1 |
|  4 | M001 | Meja Makan |    1000000 |    2000000 |    4 |        3 |               4 |
|  5 | T001 | Taro       |       4000 |       5000 |    3 |        2 |               2 |
|  7 | L001 | Lampu      |      50000 |      60000 |   20 |       10 |               1 |
+----+------+------------+------------+------------+------+----------+-----------------+
6 rows in set (0.005 sec)

Query OK, 0 rows affected (0.028 sec)

-- Buat fungsi totalPesanan(), setelah itu panggil fungsinya
//menggunakan declare 
MariaDB [dbtoko]> DELIMITER $$
MariaDB [dbtoko]> CREATE PROCEDURE totalPesanan()
    -> BEGIN
    -> DECLARE total_pesanan double;
    -> SELECT SUM(total) INTO total_pesanan FROM pesanan;
    -> SELECT total_pesanan;
    -> END $$
Query OK, 0 rows affected (0.008 sec)

MariaDB [dbtoko]>  DELIMITER ;
MariaDB [dbtoko]>  CALL totalPesanan();
+---------------+
| total_pesanan |
+---------------+
|       6000000 |
+---------------+
1 row in set (0.025 sec)

Query OK, 1 row affected (0.031 sec)

//tanpa declare
MariaDB [dbtoko]> DELIMITER $$
MariaDB [dbtoko]> CREATE PROCEDURE totalPesanan1()
    ->  BEGIN
    ->  SELECT SUM(total) FROM pesanan;
    ->  END $$
Query OK, 0 rows affected (0.003 sec)

MariaDB [dbtoko]> DELIMITER ;
MariaDB [dbtoko]> CALL totalPesanan1();
+------------+
| SUM(total) |
+------------+
|    6000000 |
+------------+
1 row in set (0.007 sec)

Query OK, 0 rows affected (0.010 sec)

-- tampilkan seluruh pesanan dari semua pelanggan
MariaDB [dbtoko]> DELIMITER $$
MariaDB [dbtoko]> CREATE PROCEDURE showSeluruhPesanan()
    -> BEGIN
    -> SELECT pesanan.id, pelanggan.nama_pelanggan,pelanggan.alamat, pesanan.tanggal AS tgl_pesanan, pesanan.total AS total_harga_pesanan FROM pesanan
    -> INNER JOIN pelanggan ON pesanan.pelanggan_id = pelanggan.id;
    -> END $$
Query OK, 0 rows affected (0.006 sec)

MariaDB [dbtoko]> DELIMITER ;
MariaDB [dbtoko]> CALL showSeluruhPesanan;
+----+----------------+------------+-------------+---------------------+
| id | nama_pelanggan | alamat     | tgl_pesanan | total_harga_pesanan |
+----+----------------+------------+-------------+---------------------+
|  1 | Agung          | Bandung    | 2023-02-05  |             4000000 |
|  2 | Pandan Wangi   | Yogyakarta | 2023-02-14  |             2000000 |
+----+----------------+------------+-------------+---------------------+
3 rows in set (0.010 sec)

Query OK, 0 rows affected (0.031 sec)

-- buatkan query panjang di atas menjadi sebuah view baru: pesanan_produk_vw (menggunakan join dari table pesanan,pelanggan dan produk)
MariaDB [dbtoko]> CREATE VIEW pesanan_produk_vw AS
    -> SELECT pesanan.id, pesanan.tanggal, pesanan.total, pelanggan.kode AS kode_pelanggan, pelanggan.nama_pelanggan, pelanggan.jk, pelanggan.alamat, produk.kode AS kode_produk, produk.nama AS nama_produk, produk.harga_jual, pesanan_item.harga
    -> FROM pesanan
    -> INNER JOIN pelanggan ON pesanan.pelanggan_id = pelanggan.id
    -> INNER JOIN pesanan_item ON pesanan.id = pesanan_item.pesanan_id
    -> INNER JOIN produk ON pesanan_item.produk_id = produk.id;
Query OK, 0 rows affected (0.047 sec)

MariaDB [dbtoko]> SELECT * FROM pesanan_produk_vw;
Empty set (0.008 sec)