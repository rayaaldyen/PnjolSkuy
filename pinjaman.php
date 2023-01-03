<?php
class pinjaman{
    function pinjaman($nominal, $tenor){
	if(!empty($nominal) && !empty($tenor) && is_numeric($nominal))
		{
            if($nominal < 20000000 && substr($tenor, -4) == "hari" || $nominal >= 20000000 && substr($tenor, -5) == "bulan")
            {
                $angsuran = array();
                $sisaAngsuran = array_sum($angsuran);
                if(substr($tenor, -4) == "hari"){
                    $SP = $nominal;
                    $lama = (int)substr($tenor, 0, 2);
                    $AP = round($nominal / $lama);
                        // echo "Angsuran Pokok = Rp. $AP\n\n";
                        for ($x = 1; $x <= $lama; $x++) {
                            $Bunga = round($SP*0.005);
                            $TA = $AP + $Bunga;
                            $SP = $SP - $AP;
                            array_push($angsuran,$TA);
                            // echo "Angsuran hari ke- $x:\n";
                            // echo "Bunga = Rp. $Bunga\n";
                            // echo "Total angsuran = Rp. $TA\n";
                            // echo "Sisa angsuran pokok = Rp. $SP\n\n";
                          }
                    // echo array_sum($angsuran);
                    

                }else if(substr($tenor, -5) == "bulan"){
                    $SP = $nominal;
                    $lama = (int)substr($tenor, 0, 2);
                    $AP = round($nominal / $lama);
                        // echo "Angsuran Pokok = Rp. $AP\n\n";
                        for ($x = 1; $x <= $lama; $x++) {
                            $Bunga = round($SP*0.1);
                            $TA = $AP + $Bunga;
                            $SP = $SP - $AP;
                            array_push($angsuran,$TA);
                            // echo "Angsuran hari ke- $x:\n";
                            // echo "Bunga = Rp. $Bunga\n";
                            // echo "Total angsuran = Rp. $TA\n";
                            // echo "Sisa angsuran pokok = Rp. $SP\n\n";
                          }
                        //   echo array_sum($angsuran);
                          
                }
                return array_sum($angsuran);
            }
        }
    }
    function bayarPinjamUnder20jt($tenor, $nominal, $nominalStat, $sisaAngsuran, $idx, $pay){
        $AP = round ($nominalStat/ substr($tenor, 0, 2));
        $fill = array();
        $Bunga2 = round($nominal*0.005);
            $TA = $AP + $Bunga2;
        if($nominalStat < 20000000)
        {
            
    
            if(!empty($nominal) && is_numeric($nominal))
            { 
                if($sisaAngsuran>0 && $pay==$TA)
                {
                   
                    $AP2=$nominalStat/substr($tenor, 0, 2);
                    $bayar=$sisaAngsuran-$pay;
                    $bayar2=$nominal-$AP2;
                    $newIndex = $idx + 1;
                    array_push( $fill, $bayar );
        array_push( $fill, $bayar2 );
        array_push( $fill, $newIndex );
                    }

                }
                return $fill;
            }
            elseif($sisaAngsuran>0 && $pay<$TA){
                echo "<script type='text/javascript'>alert('Angsuran yang anda bayarkan terlalu sedikit')</script>";
            }
            elseif($sisaAngsuran>0 && $pay>$TA){
                echo "<script type='text/javascript'>alert('Angsuran yang anda bayarkan terlalu besar')</script>";
            }
            else{
                echo "<script type='text/javascript'>alert('Mohon masukkan data yang valid!')</script>";
            }
        }
        
         

function bayarPinjamAbove20jt($tenor, $nominal, $nominalStat, $sisaAngsuran, $idx,$pay){
    $AP = round ($nominalStat/substr($tenor, 0, 2));
    $fill = array();
    $Bunga2 = round($nominal*0.1);
        $TA = $AP + $Bunga2;
    if($nominalStat >= 20000000)
    {
        

        if(!empty($nominal) && is_numeric($nominal))
        { 
            if($sisaAngsuran>0 && $pay==$TA)
            {
                
                $AP2=$nominalStat/substr($tenor, 0, 2);
                $bayar=$sisaAngsuran-$pay;
                $bayar2=$nominal-$AP2;
                $newIndex = $idx + 1;
                array_push( $fill, $bayar );
                array_push( $fill, $bayar2 );
                array_push( $fill, $newIndex );
                }

            }
            return $fill;
        }
        elseif($sisaAngsuran>0 && $pay<$TA){
            echo "<script type='text/javascript'>alert('Angsuran yang anda bayarkan terlalu sedikit')</script>";
        }
        elseif($sisaAngsuran>0 && $pay>$TA){
            echo "<script type='text/javascript'>alert('Angsuran yang anda bayarkan terlalu besar')</script>";
        }

        else{
            echo "<script type='text/javascript'>alert('Mohon masukkan data yang valid!')</script>";
        }
    }

function tampil($nominal, $tenor){
    if(!empty($nominal) && !empty($tenor) && is_numeric($nominal))
    {
        if($nominal < 20000000 && substr($tenor, -4) == "hari" || $nominal >= 20000000 && substr($tenor, -5) == "bulan")
        {
            $angsuran = array();
            $tampil=array();
            // $sisaAngsuran = array_sum($angsuran);
            if(substr($tenor, -4) == "hari"){
                $SP = $nominal;
                $lama = (int)substr($tenor, 0, 2);
                $AP = round($nominal / $lama);
                    echo "<p>Angsuran Pokok = Rp. $AP\n\n<p>";
                    for ($x = 1; $x <= $lama; $x++) {
                        $Bunga = round($SP*0.005);
                        $TA = $AP + $Bunga;
                        $SP = $SP - $AP;
                        array_push($angsuran,$TA);
                        echo "<p>Angsuran hari ke- $x:\n</p>";
                        echo "<p>Bunga = Rp. $Bunga\n</p>";
                        echo "<p>Total angsuran = Rp. $TA\n</p>";
                        if($SP>0){
                            echo "<p>Sisa angsuran pokok = Rp. $SP\n\n</p><br>";
                        }elseif($SP==0 or $SP<0){
                        echo "<p>Sisa angsuran pokok = Rp. 0\n\n</p><br>";
                      }
                      elseif($SP<=10){
                        echo "<p>Sisa angsuran pokok = Rp. 0\n\n</p><br>";
                      }
                      array_push($tampil,$x);
                      array_push($tampil,$Bunga);
                      array_push($tampil,$TA);
                      array_push($tampil,$SP);
                      }
                      
                // echo array_sum($angsuran);

            }else if(substr($tenor, -5) == "bulan"){
                $SP = $nominal;
                $lama = (int)substr($tenor, 0, 2);
                $AP = round($nominal / $lama);
                echo "<p>Angsuran Pokok = Rp. $AP\n\n<p>";
                    for ($x = 1; $x <= $lama; $x++) {
                        $Bunga = round($SP*0.1);
                        $TA = $AP + $Bunga;
                        $SP = $SP - $AP;
                        array_push($angsuran,$TA);
                        echo "<p>Angsuran hari ke- $x:\n</p>";
                        echo "<p>Bunga = Rp. $Bunga\n</p>";
                        echo "<p>Total angsuran = Rp. $TA\n</p>";
                        if($SP>0){
                            echo "<p>Sisa angsuran pokok = Rp. $SP\n\n</p><br>";
                        }elseif($SP==0 or $SP<0){
                        echo "<p>Sisa angsuran pokok = Rp. 0\n\n</p><br>";
                      }elseif($SP<=10){
                        echo "<p>Sisa angsuran pokok = Rp. 0\n\n</p><br>";
                      }
                      array_push($tampil,$x);
                      array_push($tampil,$Bunga);
                      array_push($tampil,$TA);
                      array_push($tampil,$SP);
                    }
                    //   echo array_sum($angsuran);
                      
            }
            
        }
    }
    return $tampil;
}
    
     
}
    // $obj=new pinjaman();
    // $simulasiPinjam=24000;
    //     $simulasiTenor="3 hari";
    //     $hitungAngsuran=$obj->pinjam($simulasiPinjam,$simulasiTenor);
    //     echo $hitungAngsuran;
    // $obj2=new pinjaman();
    //     // $user_data = $obj->check_login($con);
    //     // $user_pinjam = $obj->pinjam($con);
    //     $nominal=24000000;
    //     $nominalStat=24000000;
    //     $tenor="3 bulan";
    //     $sisaAngsuran=28800000;
    //     $idx=1;
    //     $Angsur=$obj2->bayarPinjamAbove20jt($tenor, $nominal, $nominalStat, $sisaAngsuran, $idx);
    //     echo $Angsur;
    