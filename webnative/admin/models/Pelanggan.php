<?php
class Pelanggan
{
    private $koneksi;
    public function __construct()
    {
        global $dbh; //instance object koneksi.php
        $this->koneksi = $dbh;
    }
    public function Pelanggan()
    {
        $sql = "SELECT * FROM Pelanggan p
        LEFT JOIN kartu k ON k.id = p.kartu_id;";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        $rs = $ps->fetchAll();
        return $rs;
    }
}
