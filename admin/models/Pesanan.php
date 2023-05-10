<?php
class Pesanan
{
    private $koneksi;
    public function __construct()
    {
        global $dbh; //instance object koneksi.php
        $this->koneksi = $dbh;
    }
    public function Pesanan()
    {
        $sql = "SELECT pesanan.*, pelanggan.nama_pelanggan FROM pesanan 
        INNER JOIN pelanggan ON pelanggan.id = pesanan.pelanggan_id";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        $rs = $ps->fetchAll();
        return $rs;
    }
    public function getPesanan($id)
    {
        $sql = "SELECT pesanan.*, pelanggan.nama_pelanggan FROM pesanan 
        INNER JOIN pelanggan ON pelanggan.id = pesanan.pelanggan_id=?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);
        $rs = $ps->fetch();
        return $rs;
    }
    public function simpan($data)
    {
        $sql = "INSERT INTO pesanan(tanggal, total, pelanggan_id)
    VALUES (?,?,?)";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }
    public function ubah($data)
    {
        $sql = "UPDATE pesanan SET tanggal=?, total=?, pelanggan_id=?
        WHERE id=?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }
    public function hapus($id)
    {
        $sql = "DELETE FROM pesanan WHERE id= ?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);
    }
}
