<?php
class pinjol
{
	function check_login($con)
{

	if(isset($_SESSION['user_id']))
	{

		$id = $_SESSION['user_id'];
		$query1 = "select * from users where id_peminjam = '$id' limit 1";

		$result1 = mysqli_query($con,$query1);

		if($result1 && mysqli_num_rows($result1) > 0)
		{

			$user_data = mysqli_fetch_assoc($result1);
			return $user_data;
		}
	}

	//redirect to login
	header("Location: login.php");
	die;

}

function check_pinjaman($con)
{
    if(isset($_SESSION['user_id']))
	{

		$id = $_SESSION['user_id'];
        $query2 = "select * from pinjaman where id_peminjam = '$id' limit 1";
		$query3 = "select nominalStat from pinjaman where id_peminjam = '$id' limit 1";

        $result2 = mysqli_query($con,$query2);
		$result3 = mysqli_query($con,$query3);

		if($result2 && mysqli_num_rows($result2) > 0)
		{

			$user_pinjam = mysqli_fetch_assoc($result2);
			return $user_pinjam;
		}

	}

	//redirect to login
	header("Location: login.php");
	die;
}

function pinjam($con, $id_peminjam, $nominal, $tenor){
	include("pinjaman.php");
	if(!empty($nominal) && !empty($tenor) && is_numeric($nominal))
		{
            if($nominal < 20000000 && substr($tenor, -4) == "hari" || $nominal >= 20000000 && substr($tenor, -5) == "bulan")
            {
				$obj2=new pinjaman();
		// 		$simulasiPinjam=$nominal;
        // $simulasiTenor=$tenor;
		$hitungAngsuran=$obj2->pinjaman($nominal,$tenor);
              
                // $temp = $hitungAngsuran;
                $indexTenor = 1;
                $query1 = "update pinjaman set nominal = '$nominal' where id_peminjam = '$id_peminjam'";
                $query2 = "update pinjaman set tenor = '$tenor' where id_peminjam = '$id_peminjam'";
                $query3 = "update pinjaman set sisaAngsuran = '$hitungAngsuran' where id_peminjam = '$id_peminjam'";
                $query4 = "update pinjaman set nominalStat = '$nominal' where id_peminjam = '$id_peminjam'";
                $query5 = "update pinjaman set indexTenor = '$indexTenor' where id_peminjam = '$id_peminjam'";
                mysqli_query($con, $query1);
                mysqli_query($con, $query2);
                mysqli_query($con, $query3);
                mysqli_query($con, $query4);
                mysqli_query($con, $query5);
                
                header("Location: tampilAngsuranHome.php");
                die;
            }else
            {
                echo "<script type='text/javascript'>alert('Mohon ikuti aturan tenor!')</script>";
            }
			
		}else
		{
			echo "<script type='text/javascript'>alert('Mohon masukkan data yang valid!')</script>";
		}
}

// function bayarPinjam( $user_pinjam, $nominalPay){
// 	include("pinjaman.php");
// 	if(!empty($user_pinjam['nominal']) && is_numeric($user_pinjam['nominal']))
// 		{ 
	
// 	$obj3=new pinjaman();
	
// 	$AP = round ($user_pinjam['nominalStat']/ substr($user_pinjam['tenor'], 0, 2));
// 	// // if($user_pinjam['nominalStat'] < 20000000)
// 	// // {
// 		// $Bunga2 = round($user_pinjam['nominal']*0.005);
// 		// $TA = $AP + $Bunga2;

// 		if(!empty($nominal) && is_numeric($nominal))
// 		{ 
			
// 				if($user_pinjam['nominalStat'] < 20000000){
// 					$fill2=$obj3->bayarPinjamUnder20jt($user_pinjam['tenor'], $nominalPay, $user_pinjam['nominalStat'], $user_pinjam['sisaAngsuran'], $user_pinjam['indexTenor']);
// 	// // 			$SP = $nominal;
// 	// // 			$AP2=$user_pinjam['nominalStat']/substr($user_pinjam['tenor'], 0, 2);
// 	// // 			$bayar=$user_pinjam['sisaAngsuran']-$SP;
// 	// // 			$bayar2=$user_pinjam['nominal']-$AP2;
// 	// // 			$newIndex = $user_pinjam['indexTenor'] + 1;
		
// 				$query3 = "update pinjaman set sisaAngsuran = '$fill2[0]' where id_peminjam = '$id_peminjam'";
// 				$query4 = "update pinjaman set nominal = '$fill2[1]' where id_peminjam = '$id_peminjam'";
// 				$query5 = "update pinjaman set indexTenor = '$fill2[2]' where id_peminjam = '$id_peminjam'";
// 				mysqli_query($con, $query3);
// 				mysqli_query($con, $query4);
// 				mysqli_query($con, $query5);
// 				header("Location: mainPage.php");
// 				die;
// 	} elseif($user_pinjam['nominalStat'] >= 20000000){
// 		$obj3=new pinjaman();
// 		$fill2=$obj3->bayarPinjamAbove20jt($user_pinjam['tenor'],$nominalPay, $user_pinjam['nominalStat'], $user_pinjam['sisaAngsuran'], $user_pinjam['indexTenor']);
		
			
// 					$query3 = "update pinjaman set sisaAngsuran = '$fill2[0]' where id_peminjam = '$id_peminjam'";
// 					$query4 = "update pinjaman set nominal = '$fill2[1]' where id_peminjam = '$id_peminjam'";
// 					$query5 = "update pinjaman set indexTenor = '$fill2[2]' where id_peminjam = '$id_peminjam'";
// 					mysqli_query($con, $query3);
// 					mysqli_query($con, $query4);
// 					mysqli_query($con, $query5);
// 					header("Location: mainPage.php");
// 					die;
// 	}
			
// 			// elseif($user_pinjam['sisaAngsuran']>0 && $nominalPay<$TA){
// 			// 	echo "<script type='text/javascript'>alert('Angsuran yang anda bayarkan terlalu sedikit')</script>";
// 			// }
// 			// elseif($user_pinjam['sisaAngsuran']>0 && $nominalPay>$TA){
// 			// 	echo "<script type='text/javascript'>alert('Angsuran yang anda bayarkan terlalu besar')</script>";
// 			// }
// 		else{
// 			echo "<script type='text/javascript'>alert('Mohon masukkan data yang valid!')</script>";
// 		}}}
// 	// }else if($user_pinjam['nominalStat'] >= 20000000)
// 	// {
// 	// 	$Bunga2 = round($user_pinjam['nominal']*0.1);
// 	// 	$TA = $AP + $Bunga2;

// 	// 	if(!empty($nominal) && is_numeric($nominal))
// 	// 	{ 
// 	// 		if($user_pinjam['sisaAngsuran']>0 && $nominal==$TA)
// 	// 		{
// 	// 			$SP = $nominal;
// 	// 			$AP2=$user_pinjam['nominalStat']/substr($user_pinjam['tenor'], 0, 2);
// 	// 			$bayar=$user_pinjam['sisaAngsuran']-$SP;
// 	// 			$bayar2=$user_pinjam['nominal']-$AP2;
// 	// 			$newIndex = $user_pinjam['indexTenor'] + 1;
		
// 	// 			$query3 = "update pinjaman set sisaAngsuran = '$bayar' where id_peminjam = '$id_peminjam'";
// 	// 			$query4 = "update pinjaman set nominal = '$bayar2' where id_peminjam = '$id_peminjam'";
// 	// 			$query5 = "update pinjaman set indexTenor = '$newIndex' where id_peminjam = '$id_peminjam'";
// 	// 			mysqli_query($con, $query3);
// 	// 			mysqli_query($con, $query4);
// 	// 			mysqli_query($con, $query5);
// 	// 			header("Location: mainPage.php");
// 	// 			die;
// 	// 		}
// 	// 		elseif($user_pinjam['sisaAngsuran']>0 && $nominal<$TA){
// 	// 			echo "<script type='text/javascript'>alert('Angsuran yang anda bayarkan terlalu sedikit')</script>";
// 	// 		}
// 	// 		elseif($user_pinjam['sisaAngsuran']>0 && $nominal>$TA){
// 	// 			echo "<script type='text/javascript'>alert('Angsuran yang anda bayarkan terlalu besar')</script>";
// 	// 		}
// 	// 	}else{
// 	// 		echo "<script type='text/javascript'>alert('Mohon masukkan data yang valid!')</script>";
// 	// 	}
// 	// }
// }



}