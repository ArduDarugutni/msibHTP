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

--2.	Berapa jumlah pelanggan perempuan yang tempat lahirnya di Jakarta

--3.	Berapa jumlah total stok semua produk yang harga jualnya dibawah 10rb

--4.	Ada berapa produk yang mempunyai kode awal K

--5.	Berapa harga jual rata-rata produk yang diatas 1jt

--6.	Tampilkan jumlah stok yang paling besar

--7.	Ada berapa produk yang stoknya kurang dari minimal stok

--8.	Berapa total asset dari keseluruhan produk


--SOAL 3.3

--1.	Tampilkan data produk : id, nama, stok dan informasi jika stok telah sampai batas minimal atau kurang dari minimum stok dengan informasi ‘segera belanja’ jika tidak ‘stok aman’.

--2.	Tampilkan data pelanggan: id, nama, umur dan kategori umur : jika umur < 17 → ‘muda’ , 17-55 → ‘Dewasa’, selainnya ‘Tua’

--3.	Tampilkan data produk: id, kode, nama, dan bonus untuk kode ‘TV01’ →’DVD Player’ , ‘K001’ → ‘Rice Cooker’ selain dari diatas ‘Tidak Ada’


--SOAL 3.4

--1.	Tampilkan data statistik jumlah tempat lahir pelanggan

--2.	Tampilkan jumlah statistik produk berdasarkan jenis produk

--3.	Tampilkan data pelanggan yang usianya dibawah rata usia pelanggan

--4.	Tampilkan data produk yang harganya diatas rata-rata harga produk

--5.	Tampilkan data pelanggan yang memiliki kartu dimana iuran tahunan kartu diatas 90rb

--6.	Tampilkan statistik data produk dimana harga produknya dibawah rata-rata harga produk secara keseluruhan

--7.	Tampilkan data pelanggan yang memiliki kartu dimana diskon kartu yang diberikan diatas 3%
