<?php
include_once 'lingkaran.php';
include_once 'persegi_panjang.php';
include_once 'segitiga.php';

$lingkaran = new Lingkaran(5);
$persegiPanjang = new PersegiPanjang(4, 6);
$segitiga = new Segitiga(3, 4);

echo "<table>";
echo "<tr><th>Nama Bidang</th><th>Luas</th><th>Keliling</th></tr>";
echo "<tr><td>" . $lingkaran->namaBidang() . "</td><td>" . $lingkaran->luasBidang() . "</td><td>" . $lingkaran->kelilingBidang() . "</td></tr>";
echo "<tr><td>" . $persegiPanjang->namaBidang() . "</td><td>" . $persegiPanjang->luasBidang() . "</td><td>" . $persegiPanjang->kelilingBidang() . "</td></tr>";
echo "<tr><td>" . $segitiga->namaBidang() . "</td><td>" . $segitiga->luasBidang() . "</td><td>" . $segitiga->kelilingBidang() . "</td></tr>";
