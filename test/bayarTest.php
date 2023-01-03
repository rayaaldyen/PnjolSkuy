<?php
use PHPUnit\Framework\TestCase;
require_once "pinjaman.php";
class bayarTest extends TestCase{
    public function testBayar(){
        
        $obj2=new pinjaman();
        // $user_data = $obj->check_login($con);
        // $user_pinjam = $obj->pinjam($con);
        $nominal=24000000;
        $nominalStat=24000000;
        $tenor="3 bulan";
        $sisaAngsuran=28800000;
        $idx=1;
        $bayar=10400000;
        $Angsur=$obj2->bayarPinjamAbove20jt($tenor, $nominal, $nominalStat, $sisaAngsuran, $idx, $bayar);
        $check = array();
        $check[0] = 18400000;
        $check[1] = 16000000;
        $check[2] = 2;
        $this->assertEquals($Angsur, $check);
        

        
    }
    
}