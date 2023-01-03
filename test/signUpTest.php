<?php
include('login.php');
use LDAP\Result;
use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertTrue;

class signUpTest extends TestCase{
    public function testRegister(){
        $testReg = new Login();
        $post = [
            'user_name' => 'testing',
            'password' => 'testing',
            'nama_peminjam' => 'testing',
            'tgl_lahir' => '2002-04-22',
            'alamat' => 'Bekasi',
            'no_hp' => '0988776735',
            'id_peminjam' => '098'
        ];
        $testMet = "POST";

        $result = $testReg->register($testMet, $post);

        assertTrue($result);

        $testReg->delData("098");
    }
}