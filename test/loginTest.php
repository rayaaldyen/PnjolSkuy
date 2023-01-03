<?php
include('login.php');
use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertTrue;

class loginTest extends TestCase{
    public function testLogin(){
        $testLogin = new Login();

        $testUname = "rayden";
        $testPwd = "raya2002";
        $testMet = "POST";

        $result = $testLogin->login($testUname, $testPwd, $testMet);

        assertTrue($result);
    }
    
}