<?php
include('pinjaman.php');
use LDAP\Result;
use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertTrue;

class tampilTest extends TestCase{
    public function testTampil(){
        $testReg = new pinjaman();
        $nominal = 24000000;
        $tenor = "3 bulan";

        $result = $testReg->tampil($nominal, $tenor);

        $check = array();
        $check[0] = 1;
        $check[1] = 2400000;
        $check[2] = 10400000;
        $check[3] = 16000000;
        $check[4] = 2;
        $check[5] = 1600000;
        $check[6] = 9600000;
        $check[7] = 8000000;
        $check[8] = 3;
        $check[9] = 800000;
        $check[10] = 8800000;
        $check[11] = 0;
        $this->assertEquals($result, $check);
        
}}