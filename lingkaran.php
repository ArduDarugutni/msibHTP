<?php
include_once 'abstract.php';

class Lingkaran extends Bentuk2D
{
    private $jari2;

    public function __construct($jari2)
    {
        $this->jari2 = $jari2;
    }

    public function namaBidang()
    {
        return "Lingkaran";
    }

    public function luasBidang()
    {
        return pi() * pow($this->jari2, 2);
    }

    public function kelilingBidang()
    {
        return 2 * pi() * $this->jari2;
    }
}
