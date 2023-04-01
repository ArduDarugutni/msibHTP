<?php
include_once 'abstract.php';

class PersegiPanjang extends Bentuk2D
{
    private $panjang;
    private $lebar;

    public function __construct($panjang, $lebar)
    {
        $this->panjang = $panjang;
        $this->lebar = $lebar;
    }

    public function namaBidang()
    {
        return "Persegi Panjang";
    }

    public function luasBidang()
    {
        return round($this->panjang * $this->lebar, 2) . ' cm2';
    }

    public function kelilingBidang()
    {
        return round(2 * ($this->panjang + $this->lebar), 2) . ' cm';
    }
}
