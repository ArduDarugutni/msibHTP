<?php
include_once 'koneksi.php';
include_once 'models/Pelanggan.php';

//step pertama yaitu menangkap, request form
$kode = $_POST['kode'];
$nama_pelanggan = $_POST['nama_pelanggan'];
$jk = $_POST['jk'];
$tmp_lahir = $_POST['tmp_lahir'];
$tgl_lahir = $_POST['tgl_lahir'];
$email = $_POST['email'];
$alamat = $_POST['alamat'];
$kartu_id = $_POST['kartu_id'];



//penangkapan form diatas dijadikan array
$data = [
    $kode,
    $nama_pelanggan,
    $jk,
    $tmp_lahir,
    $tgl_lahir,
    $email,
    $alamat,
    $kartu_id

];
$model = new Pelanggan();
$tombol = $_REQUEST['proses'];

switch ($tombol) {
    case 'simpan':
        $model->simpan($data);
        break;
    case 'ubah':
        $data[] = $_POST['idx'];
        $model->ubah($data);
        break;
    case 'hapus':
        unset($data);
        //$data[] = $_POST['idx']; 
        $model->hapus($_POST['idx']);
        break;

    default:
        header('Location:index.php?url=pelanggan');
        break;
}
header('Location:index.php?url=pelanggan');
