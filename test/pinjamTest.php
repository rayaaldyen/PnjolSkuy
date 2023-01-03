<?php
use PHPUnit\Framework\TestCase;
require_once "pinjaman.php";
class pinjamTest extends TestCase{
    public function testPinjam(){
        
        $obj=new pinjaman();
        // $user_data = $obj->check_login($con);
        // $user_pinjam = $obj->pinjam($con);
        $simulasiPinjam=24000000;
        $simulasiTenor="3 bulan";
        $hitungAngsuran=$obj->pinjaman($simulasiPinjam,$simulasiTenor);
        $this->assertEquals(28800000, $hitungAngsuran);
    }
    
}