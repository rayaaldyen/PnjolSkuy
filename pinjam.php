<?php 
session_start();

	include("connection.php");
	include("functions.php");
    $obj=new pinjol();
	$user_data = $obj->check_login($con);
    $user_pinjam = $obj->check_pinjaman($con);
    $counter = 0;

    $id_peminjam = $user_pinjam['id_peminjam'];

    if($user_pinjam['sisaAngsuran'] != 0){
        echo "<script type='text/javascript'>alert('Mohon lunasi pinjaman Anda terlebih dahulu!')</script>";
        echo "<script>window.location= 'mainPage.php';</script>";
    }

    if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$nominal = $_POST['nominal'];
		$tenor = $_POST['tenor'];

        $obj->pinjam($con, $id_peminjam, $nominal, $tenor);
	}
?>

<html>
    <head>
        <title>pinjaman</title>
        <link rel="stylesheet" type="text/css" href="css/pinjam.css" />
    </head>
<body>
        <nav> 
        <a href="mainPage.php" class="logo">PinjolSkuy</a>
        </nav>
        <div id="box">
        <div class="text-container">
		<p>Aturan Peminjaman</p>
        <p>Pinjaman lebih dari 20.000.000 pilih tenor bulan dan hari</p>
        <p>Pinjaman kurang dari 20.000.000 pilih tenor hari</p></div>
		<form method="post">
			<div style="font-family:'Poppins';font-size: 20px;margin:5px;color: white; position:relative;">Masukkan Nominal Peminjaman:</div>
			<input id="text" type="text" name="nominal" placeholder="Nominal" required/><br><br>
            <label style="font-family:'Poppins';font-size: 20px;margin: 10px;color: white;" for="">Tenor:</label>
                 <select name="tenor" class="form-control">
                    <option value="">--Pilih Tenor--</option>
                    <option value="3 hari">3 Hari</option>
                    <option value="7 hari">7 Hari</option>
                    <option value="14 hari">14 Hari</option>
                    <option value="30 hari">30 Hari</option>
                    <option value="3 bulan">3 Bulan</option>
                    <option value="6 bulan">6 Bulan</option>
                    <option value="12 bulan">12 Bulan</option>     
                </select><br><br>
			<input id="button" type="submit" value="Pinjam"><br>
		</form>
	</div>
</body>
</html>