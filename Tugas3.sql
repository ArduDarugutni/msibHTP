--SOAL 3.1

--1.	Tampilkan produk yang asset nya diatas 20jt
    SELECT * FROM produk WHERE harga_beli * stok > 20000000;

--2.	Tampilkan data produk beserta selisih stok dengan minimal stok
    SELECT SUM(stok - min_stok) as selisih from produk;
--3.	Tampilkan total asset produk secara keseluruhan
    SELECT sum(stok) as total_asset from produk;
--4.	Tampilkan data pelanggan yang lahirnya antara tahun 1999 sampai 2004
    SELECT * FROM pelanggan WHERE YEAR(tgl_lahir) BETWEEN 1999 AND 2004;
--5.	Tampilkan data pelanggan yang lahirnya tahun 1998
    SELECT * FROM pelanggan WHERE YEAR(tgl_lahir)=1998;
--6.	Tampilkan data pelanggan yang berulang tahun bulan agustus
    SELECT * FROM pelanggan WHERE MONTH(tgl_lahir)=08;
--7.	Tampilkan data pelanggan : nama, tmp_lahir, tgl_lahir dan umur (selisih tahun sekarang dikurang tahun kelahiran)
    SELECT nama, tmp_lahir, tgl_lahir, (YEAR(NOW())-YEAR(tgl_lahir)) AS umur FROM pelanggan;

--SOAL 3.2

--1.	Berapa jumlah pelanggan yang tahun lahirnya 1998
    SELECT COUNT(*) FROM pelanggan WHERE YEAR(tanggal_lahir) = 1998;
--2.	Berapa jumlah pelanggan perempuan yang tempat lahirnya di Jakarta
    SELECT COUNT(*) FROM pelanggan WHERE jK = 'P' AND tmp_lahir 'Jakarta';
--3.	Berapa jumlah total stok semua produk yang harga jualnya dibawah 10rb
    SELECT SUM(stok) AS total_stok FROM produk WHERE harga_jual < 10000;
--4.	Ada berapa produk yang mempunyai kode awal K
    SELECT COUNT(*) FROM produk WHERE kode_produk LIKE 'K%';
--5.	Berapa harga jual rata-rata produk yang diatas 1jt
    SELECT AVG(harga_jual) as rata_harga FROM produk WHERE harga_jual > 1000000;
--6.	Tampilkan jumlah stok yang paling besar
    SELECT MAX(stok) as jumlah_stok_terbesar FROM produk;
--7.	Ada berapa produk yang stoknya kurang dari minimal stok
    SELECT COUNT(*) FROM produk WHERE stok < min_stok;
--8.	Berapa total asset dari keseluruhan produk
    SELECT SUM(harga_beli * stok) as total_asset FROM produk;

--SOAL 3.3

--1.	Tampilkan data produk : id, nama, stok dan informasi jika stok telah sampai batas minimal atau kurang dari minimum stok dengan informasi ‘segera belanja’ jika tidak ‘stok aman’.
    SELECT id, nama, stok, 
        CASE 
            WHEN stok <= minimal_stok THEN 'segera belanja' 
            ELSE 'stok aman' 
        END AS status_stok 
    FROM produk;

--2.	Tampilkan data pelanggan: id, nama, umur dan kategori umur : jika umur < 17 → ‘muda’ , 17-55 → ‘Dewasa’, selainnya ‘Tua’
    SELECT id, nama, umur, 
        CASE 
            WHEN umur < 17 THEN 'muda' 
            WHEN umur >= 17 AND umur <= 55 THEN 'Dewasa' 
            ELSE 'Tua' 
        END AS kategori_umur 
    FROM pelanggan;

--3.	Tampilkan data produk: id, kode, nama, dan bonus untuk kode ‘TV01’ →’DVD Player’ , ‘K001’ → ‘Rice Cooker’ selain dari diatas ‘Tidak Ada’
    SELECT id, kode, nama, 
        CASE 
            WHEN kode = 'TV01' THEN 'DVD Player' 
            WHEN kode = 'K001' THEN 'Rice Cooker' 
            ELSE 'Tidak Ada' 
        END AS bonus 
    FROM produk;

--SOAL 3.4

--1.	Tampilkan data statistik jumlah tempat lahir pelanggan
    SELECT tmp_lahir, COUNT(*) as jumlah_pelanggan
    FROM pelanggan
    GROUP BY tmp_lahir;

--2.	Tampilkan jumlah statistik produk berdasarkan jenis produk
    SELECT jenis_produk, COUNT(*) as jumlah_produk
    FROM produk
    GROUP BY jenis_produk;

--3.	Tampilkan data pelanggan yang usianya dibawah rata usia pelanggan
    SELECT nama_pelanggan, (YEAR(NOW())-YEAR(tgl_lahir)) AS usia 
    FROM pelanggan 
    WHERE (YEAR(NOW())-YEAR(tgl_lahir)) < (SELECT AVG((YEAR(NOW())-YEAR(tgl_lahir))) FROM pelanggan);

--4.	Tampilkan data produk yang harganya diatas rata-rata harga produk
    SELECT *
    FROM produk
    WHERE harga_jual > (SELECT AVG(harga_jual) FROM produk);

--5.	Tampilkan data pelanggan yang memiliki kartu dimana iuran tahunan kartu diatas 90rb
    SELECT *
    FROM pelanggan
    WHERE id_pelanggan IN (
        SELECT id_pelanggan
        FROM kartu
        WHERE iuran_tahunan > 90000
    );

--6.	Tampilkan statistik data produk dimana harga produknya dibawah rata-rata harga produk secara keseluruhan
    SELECT jenis_produk, AVG(harga) as rata_harga
    FROM produk
    GROUP BY jenis_produk
    HAVING AVG(harga_jual) < (SELECT AVG(harga_jual) FROM produk);


--7.	Tampilkan data pelanggan yang memiliki kartu dimana diskon kartu yang diberikan diatas 3%
    SELECT *
    FROM pelanggan
    WHERE id_pelanggan IN (
        SELECT id_pelanggan
        FROM kartu
        WHERE diskon > 0.03
    );
