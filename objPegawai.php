<?php
require 'pegawai.php';

//instance object pegawai
$pegawai1 = new Pegawai('123', 'Aldi', 'Manager', 'Islam', 'Menikah');
$pegawai2 = new Pegawai('124', 'Budi', 'Asisten Manager', 'Islam', 'Belum Menikah');
$pegawai3 = new Pegawai('125', 'Cris', 'Kepala Bagian', 'Kristen', 'Menikah');
$pegawai4 = new Pegawai('126', 'Dede', 'Staff', 'Islam', 'Belum Menikah');
$pegawai5 = new Pegawai('127', 'Eri', 'Asisten Manager', 'Islam', 'Menikah');

$ar_pegawai = [$pegawai1, $pegawai2, $pegawai3, $pegawai4, $pegawai5];

foreach ($ar_pegawai as $pegawai) {
    $pegawai->cetak();
}

echo '<br>Jumlah Pegawai : '.Pegawai::$jml.' Orang';
