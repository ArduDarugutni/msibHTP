<?php
class Pesanan{
    private $koneksi;
    public function __construct()
    {
        global $dbh; //instance object koneksi.php
        $this->koneksi = $dbh;
    }
    public function Pesanan()
    {
        $sql = "SELECT s.tanggal, s.total, p.nama_pelanggan FROM pesanan s
        LEFT JOIN pelanggan p ON p.id = s.pelanggan_id";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        $rs = $ps->fetchAll();
        return $rs;
    }
}

?>