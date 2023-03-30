<?php
class Pegawai
{
    protected $nip;
    public $nama;
    private $jabatan;
    private $agama;
    private $status;
    static $jml = 0;
    const PT = 'PT. HTP Indonesia';

    public function __construct($nip, $nama, $jabatan, $agama, $status)
    {
        $this->nip = $nip;
        $this->nama = $nama;
        $this->jabatan = $jabatan;
        $this->agama = $agama;
        $this->status = $status;
        self::$jml++;
    }
    public function setGajiPokok($jabatan)
    {
        $this->jabatan = $jabatan;
        switch ($jabatan) {
            case 'Manager':
                $gapok = 15000000;
                break;
            case 'Asisten Manager':
                $gapok = 10000000;
                break;
            case 'Kepala Bagian':
                $gapok = 7000000;
                break;
            case 'Staff':
                $gapok = 5000000;
                break;
            default:
                $gapok = 0;
        }
        return $gapok;
    }
    public function setTunjab()
    {
        $tunjab = 0.2 * $this->setGajiPokok($this->jabatan);
        return $tunjab;
    }
    public function setTunkel()
    {
        $tunkel = $this->status == 'Menikah' ? 0.1 * $this->setGajiPokok($this->jabatan) : 0;
        return $tunkel;
    }
    public function setZakatProfesi()
    {
        $zakat = $this->agama == 'Islam' && $this->setGajiPokok($this->jabatan) >= 6000000 ? 0.025 * $this->setGajiPokok($this->jabatan) : 0;
        return $zakat;
    }
    public function setGajiBersih()
    {
        $gajibersih = $this->setGajiPokok($this->jabatan) + $this->setTunjab() + $this->setTunkel() - $this->setZakatProfesi();
        return $gajibersih;
    }
    public function cetak()
    {
        echo '<b><u>' . Pegawai::PT . '</u></b>';
        echo '<br>NIP Pegawai : ' . $this->nip;
        echo '<br>Nama Pegawai : ' . $this->nama;
        echo '<br>Jabatan : ' . $this->jabatan;
        echo '<br>Agama : ' . $this->agama;
        echo '<br>Status : ' . $this->status;
        echo '<br>Gaji Pokok : Rp.' . number_format($this->setGajiPokok($this->jabatan), 0, ',', '.');
        echo '<br>Tunjangan Jabatan : Rp.' . number_format($this->setTunjab(), 0, ',', '.');
        echo '<br>Tunjangan Keluarga : Rp.' . number_format($this->setTunkel(), 0, ',', '.');
        echo '<br>Zakat Profesi : Rp.' . number_format($this->setZakatProfesi(), 0, ',', '.');
        echo '<br>Gaji Bersih : Rp.' . number_format($this->setGajiBersih(), 0, ',', '.');
        echo '<hr>';
    }
}
