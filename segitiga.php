<?php
include_once 'abstract.php';

class Segitiga extends Bentuk2D
{
    private $alas;
    private $tinggi;

    public function __construct($alas, $tinggi)
    {
        $this->alas = $alas;
        $this->tinggi = $tinggi;
    }

    public function namaBidang()
    {
        return "Segitiga";
    }

    public function luasBidang()
    {
        return round(0.5 * $this->alas * $this->tinggi, 2) . ' cm2';
    }

    public function kelilingBidang()
    {
        $sisiMiring = sqrt(pow($this->alas / 2, 2) + pow($this->tinggi, 2));
        return round(2 * $sisiMiring + $this->alas, 2) . ' cm';
    }
}
