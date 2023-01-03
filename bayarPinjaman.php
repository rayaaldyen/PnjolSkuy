<html>
    <head>
        <title>pinjaman</title>
        <link rel="stylesheet" type="text/css" href="css/bayarPinjaman.css" />
    </head>
<body>
        <nav> 
        <a href="mainPage.php" class="logo">PinjolSkuy</a>
        </nav>
        
    <br>
<div class="angsuran-bg">
<div class="angsuran">
    <?php  
    session_start();

	include("connection.php");
	include("functions.php");

    $obj=new pinjol();
	$user_data = $obj->check_login($con);
    $user_pinjam = $obj->check_pinjaman($con);

    $id_peminjam = $user_pinjam['id_peminjam'];
    $id_pinjaman = $user_pinjam['id_pinjaman'];

    if ($user_pinjam['sisaAngsuran'] == 0){
        echo "<script type='text/javascript'>alert('Anda belum memiliki pinjaman')</script>";
        echo "<script>window.location= 'mainPage.php';</script>";
    }

    if($user_pinjam['nominalStat'] < 20000000){
        echo "Pembayaran angsuran hari ke- ", $user_pinjam['indexTenor'];
    }elseif($user_pinjam['nominalStat'] >= 20000000){
        echo "Pembayaran angsuran bulan ke- ", $user_pinjam['indexTenor'];
    }
    
    $pinjam=$user_pinjam['nominal'];
    
    if($_SERVER['REQUEST_METHOD'] == "POST")
	{
        $nominalPay = $_POST['nominal'];
        
        // $obj->bayarPinjam($user_pinjam, $nominalBayar);
        include("pinjaman.php");
	if(!empty($user_pinjam['nominal']) && is_numeric($user_pinjam['nominal']))
		{ 
	
	$obj3=new pinjaman();
	
	$AP = round ($user_pinjam['nominalStat']/ substr($user_pinjam['tenor'], 0, 2));
	

		if(!empty($user_pinjam['nominal']) && $user_pinjam['nominal'])
		{ 
			
				if($user_pinjam['nominalStat'] < 20000000){
					$fill2=$obj3->bayarPinjamUnder20jt($user_pinjam['tenor'], $user_pinjam['nominal'], $user_pinjam['nominalStat'], $user_pinjam['sisaAngsuran'], $user_pinjam['indexTenor'],$nominalPay);

		
				$query3 = "update pinjaman set sisaAngsuran = '$fill2[0]' where id_peminjam = '$id_peminjam'";
				$query4 = "update pinjaman set nominal = '$fill2[1]' where id_peminjam = '$id_peminjam'";
				$query5 = "update pinjaman set indexTenor = '$fill2[2]' where id_peminjam = '$id_peminjam'";
				mysqli_query($con, $query3);
				mysqli_query($con, $query4);
				mysqli_query($con, $query5);
				header("Location: mainPage.php");
				die;
	} elseif($user_pinjam['nominalStat'] >= 20000000){
		$obj3=new pinjaman();
		$fill2=$obj3->bayarPinjamAbove20jt($user_pinjam['tenor'],$user_pinjam['nominal'], $user_pinjam['nominalStat'], $user_pinjam['sisaAngsuran'], $user_pinjam['indexTenor'],$nominalPay);
		
			
					$query3 = "update pinjaman set sisaAngsuran = '$fill2[0]' where id_peminjam = '$id_peminjam'";
					$query4 = "update pinjaman set nominal = '$fill2[1]' where id_peminjam = '$id_peminjam'";
					$query5 = "update pinjaman set indexTenor = '$fill2[2]' where id_peminjam = '$id_peminjam'";
					mysqli_query($con, $query3);
					mysqli_query($con, $query4);
					mysqli_query($con, $query5);
					header("Location: mainPage.php");
					die;
	}
			
	
		else{
			echo "<script type='text/javascript'>alert('Mohon masukkan data yang valid!')</script>";
		}}}
    }
?>
    </div>
</div>
<section>
        <div id="box">
		<form method="post">
			<div style="font-family:'Poppins';font-size: 18px;margin: 10px;color: white;">Masukkan Nominal Angsuran:</div>

			<input id="text" type="text" name="nominal" placeholder="Nominal" required/><br><br>
			<input id="button" type="submit" value="Bayar">
		</form>
        <a href="tampilAngsuran.php"><button href="tampilAngsuran.php" class="hire-btn">Detil Angsuran</button></a>
	</div>
        </section>
    
    
    
</body>
</html>